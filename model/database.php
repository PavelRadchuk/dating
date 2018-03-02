<?php
require '/home/pradchuk/config.php';
class database
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
            echo "connected to database!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function insertMember()
    {
        $sql= "INSERT INTO members(fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)
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
        echo "<p>Pet $id inserted successfully.</p>";

    }
}