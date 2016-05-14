<?php

require_once('dbconfig.php');

class USER{

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

    public function register($user_name,$user_password,$user_type_id,$joined_date){
        try{


            $stmt = $this->conn->prepare("INSERT INTO camss_user(user_name,user_password,user_type_id,joined_date) VALUES(:uname, :upass, :utype , :udate)");

            $stmt->bindparam(":uname", $user_name);
            $stmt->bindparam(":upass", $user_password);
            $stmt->bindparam(":utype", $user_type_id);
            $stmt->bindParam("udate", $joined_date );

            $stmt->execute();

            return $stmt;
        }
		catch(PDOException $e){
            echo $e->getMessage();
        }
	}


    public function doLogin($user_name,$user_password){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM camss_user WHERE user_name=:uname");
            $stmt->execute(array(':uname'=>$user_name));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {

                if($user_password === $userRow['user_password'])
                {
                    $_SESSION['user_session'] = $userRow['user_name'];
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
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }



    public function doLogout(){
        session_start();
        unset($_SESSION['user_session']);
        session_destroy();
        return true;
    }
}
?>