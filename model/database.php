<?php
class Database
{
    private $_dbh;

    function __construct()
    {
        try {
//creat a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo "Connected";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}