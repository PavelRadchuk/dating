<?php
require '/home/pradchuk/config.php';
class database
{
    /**
     * Member constructor.
     * connecting to database
     */
    function __construct()
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "connected to database!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function message()
    {
        echo "complete testing";
    }
}