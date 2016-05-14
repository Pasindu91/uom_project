<?php

require_once 'DB.php';

class Test{

    private $_db,$_data;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function create($feilds){
        if(!$this->_db->insert('camss_customer',$feilds)){
            Throw new Exception("There is a problem when creating customer account");
        }
    }

    public function view(){
        $this->_db->get('camss_user',array('user_name','=','asitha@camss.lk'));
        $this->_data->first();
        echo $this->_data->user_id;
    }

}