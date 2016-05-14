<?php


class Manager {

    private $conn;

    public function __construct(){
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($manager_email,$manager_description){
        try{
            $stmt = $this->conn->prepare("INSERT INTO camss_manager(manager_email,manager_description) VALUES(:m_email,:m_description)");

            $stmt->bindparam(":m_email", $manager_email);
            $stmt->bindparam(":m_description", $manager_description);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

} 