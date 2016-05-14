<?php

session_start();
require_once 'User.php';
require_once 'Redirect.php';
$session = new USER();

if(!$session->is_loggedin())
{
    // session no set redirects to login page
    Redirect::to('../login/index.php');
}else{

}