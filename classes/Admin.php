<?php


require_once('dbconfig.php');


class Admin {

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

    public function doLogin($user_name,$user_password){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM camss_admin WHERE admin_uname=:uname");
            $stmt->execute(array(':uname'=>$user_name));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {

                if($user_password === $userRow['admin_pass'])
                {
                    $_SESSION['admin_session'] = $userRow['admin_uname'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function is_loggedin(){
        if(isset($_SESSION['admin_session']))
        {
            return true;
        }
    }

    public function doLogout(){
        session_start();
        unset($_SESSION['admin_session']);
        session_destroy();
        return true;
    }

    public function count_of_managers(){
        $stmt = $this->runQuery("SELECT count(manager_id) FROM camss_manager ");
        $stmt->execute();
        $result_leader = $stmt->fetchAll();
        return $result_leader;
    }

    public function count_of_leaders(){
        $stmt = $this->runQuery("SELECT count(leader_id) FROM camss_leader ");
        $stmt->execute();
        $result_leader = $stmt->fetchAll();
        return $result_leader;
    }

    public function showMySQLConfigs(){

        $stmt = $this->runQuery("SHOW STATUS WHERE variable_name = 'Connections' ");
        $stmt->execute();
        $result_leader = $stmt->fetchAll();
        return $result_leader;
    }
} 