<?php
require_once('dbconfig.php');

class Customer {

    private $conn;

    public function __construct(){
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function register($first_name,$last_name,$user_email){
        try{
            $stmt = $this->conn->prepare("INSERT INTO camss_customer(customer_fname,customer_lname,customer_email) VALUES(:fname, :lname, :cemail)");
            $stmt->bindparam(":fname", $first_name);
            $stmt->bindparam(":lname", $last_name);
            $stmt->bindparam(":cemail", $user_email);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

} 