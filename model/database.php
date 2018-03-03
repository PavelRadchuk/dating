<?php
/* CREATE TABLE Members (
    member_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20),
    lname VARCHAR(20),
    age int(3),
    gender VARCHAR(8),
    phone varchar(10),
    email VARCHAR(25),
    state enum('Washington', 'Idaho', 'California', 'Oregon')
    seeking VARCHAR(8),
    bio TEXT,
    premium TINYINT,
    image Text,
    interests Text
) */
require '/home/pradchuk/config.php';
class Database
{
    protected $dbh;
    /**
     * connecting to database
     */
    function __construct()
    {
        try {
            $this->dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * inserts member into the database
     * @param $fname first name
     * @param $lname last name
     * @param $age age
     * @param $gender gender
     * @param $phone phone number
     * @param $email email
     * @param $state state
     * @param $seeking gender that is seeking
     * @param $bio bio
     * @param $interests list of interests
     * @return void
     */
    function insertMember($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $premium, $image, $interests)
    {
        $dbh = $this->dbh;
        // define the query
        $sql = "INSERT INTO Members(fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
          VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";
        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);
        // execute
        $statement->execute();
        $id = $dbh->lastInsertId();
    }
    function getMembers()
    {
        $dbh = $this->dbh;
        // Define the query
        $sql = "SELECT * FROM Members ORDER BY lname";
        // Prepare the statement
        $statement = $dbh->prepare($sql);
        // Execute the statement
        $statement->execute();
        // Process the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo "<tr><td>" . $row['member_id'] . "</td>";
            echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['seeking'] . "</td>";
            if ($row['premium'] == 1) {
                echo "<td><input id='checkBox' type='checkbox' checked></td>";
            } else {
                echo "<td><input id='checkBox' type='checkbox'></td>";
            }
            echo "<td>" . $row['interests'] . "</td></tr>";
        }
    }
}