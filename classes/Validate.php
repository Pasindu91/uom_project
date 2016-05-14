<?php

class Validate{

    private $_passed = false,
            $_errors = array(),
            $conn = null;

    public function __construct(){
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                $value = trim($source[$item]);

                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                }else if(!empty($value)){
                    switch($rule){
                        case 'min':
                        if(strlen($value) < $rule_value){
                            $this->addError("{$item} must be minimum of {$rule_value} characters.");
                        }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be maximum of {$rule_value} characters.");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match with {$item}");
                            }
                        break;
                        case 'unique':
                            $user = new USER();
                            $stmt = $user->runQuery("SELECT * FROM camss_user WHERE user_name=:uname");
                            $stmt->execute(array(':uname'=>$value));
                            $row=$stmt->fetch(PDO::FETCH_ASSOC);

                            if($stmt->rowCount() ==1){
                                $this->addError("{$item} already exists.");
                            }
                        break;
                    }
                }
            }
        }

        if(empty($this->_errors)){
            $this->_passed = true;
        }

    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }


}