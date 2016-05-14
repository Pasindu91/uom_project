<?php

require_once('../../classes/Admin.php');
require_once('../../classes/Redirect.php');

$admin= new Admin();

if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $admin->doLogout();
    Redirect::to('index.php');
}