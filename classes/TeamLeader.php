<?php
/**
 * Created by PhpStorm.
 * User: Asitha
 * Date: 08/05/16
 * Time: 08:36
 */

class TeamLeader {

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

    public function register($leader_email,$leader_description){
        try{
            $stmt = $this->conn->prepare("INSERT INTO camss_leader(leader_email,leader_description) VALUES(:l_email, :l_description)");

            $stmt->bindparam(":l_email", $leader_email);
            $stmt->bindparam(":l_description", $leader_description);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

} 