<?php
require_once('../../classes/session.php');
require_once('../../classes/User.php');
require_once('../../classes/Redirect.php');

$user_logout = new USER();


if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user_logout->doLogout();
    Redirect::to('../../index.php');
}
