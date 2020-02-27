<?php
require_once ("config-pet.php");//essential
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
//            echo $e->getMessage();
        }
    }

    function allPets()
    {
        //1. Define a query
        $sql = "SELECT * FROM pet";

        //2.Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3.Bind the parameters

        //4.Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function writePet($pet)
    {
//        var_dump($student);
        //1. Define a query
        $sql = "INSERT INTO pet (pet_name, pet_color,pet_type)
                    VALUES (:pet_name, :pet_color, :pet_type)";

        //2 prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3/ bind the parameters
        $statement->bindParam(':pet_name', $pet->getName());
        $statement->bindParam(':pet_color', $pet->getColor());
        $statement->bindParam(':pet_type', $pet->getType());

        //4. execute the statement
        $statement->execute();

        //get the key of the last inserted row
//        $id = $this->_dbh->lastInsertId();


    }



//    function writePet($id,$name,$type,$color)
//    {
//        $sql= "UPDATE pet  SET pet_name=?,pet_type=?,pet_color=? WHERE pet_id=?";
//        $statement = $this ->_dbh->prepare($sql);
//        $statement->execute($name,$type,$color,$id);
//        echo "<pre>";
//        var_dump($statement);
//
//    }
}