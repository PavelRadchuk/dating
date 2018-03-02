<?php
/* CREATE TABLE Members (
    member_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(20),
    lname VARCHAR(20),
    age int(3),
    gender enum('male', 'female'),
    phone varchar(10),
    email VARCHAR(25),
    state enum('Washington', 'Idaho', 'California', 'Oregon')
    seeking enum('male','female'),
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
     * Member constructor.
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
     * @param $premium 1 if true, 0 if false
     * @param $image images if they exist
     * @param $interests list of interests
     * @return void
     */
    function insertMember($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $premium, $image, $interests)
    {
        $sql= "INSERT INTO Members(fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
        VALUES(:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";

        //Prepare the statement
        $statement = $this->dbh->prepare($sql);

        //Bind the parameters
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

        //Execute
        $statement->execute();
        $id = $this->dbh->lastInsertId();
        echo "<p>$id inserted successfully.</p>";

    }
}