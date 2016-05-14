<?php

require_once '../../core/init.php';


$came_erros = "";

if(Input::exists()){

    $validate = new Validate();
    $validation = $validate->check($_POST,array(
        'first_name' => array(
            'required' => true,
            'min' => 2,
            'max' => 45
        ),
        'last_name' => array(
            'required' => true,
            'min' => 2,
            'max' => 45
        ),
        'user_name' => array(
            'required' => true,
            'min' => 2,
            'max' => 45,
            'unique' => 'camss_user'
        ),
        'user_password' => array(
            'required' => true,
            'min' => 6
        ),
        'password_again' => array(
            'required' => true,
            'matches' => 'user_password'
        )

    ));




    if($validate->passed()){

        $user = new USER();
        $customer = new Customer();


        try{
              $first_name = Input::get('first_name');
              $last_name = Input::get('last_name');
              $user_email = Input::get('user_name');
              $user_password = MD5(Input::get('user_password'));
              $user_type = 2;
              $user_joined_date = date('Y-m-d H:i:s');
              $user->register($user_email,$user_password,$user_type,$user_joined_date);
              $customer->register($first_name,$last_name,$user_email);

            Redirect::to('../../index.php');

        }
        catch(Exception $ex){
            $came_erros = $ex->getMessage();
        }

    }
    else{
        foreach ($validate->errors() as $error) {
             $came_erros .=  $error . '<br>';
        }

    }


}

?>
<html>
<head>
    <title>CAMSS - Register Here</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
</head>
</html>
<body>

<!-- Header -->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-8">
        <h1>CUSTOMER REGISTRATION</h1>
    </div>
    <div class="col-lg-2">
        <a href="../../index.php">
        <table align="right">
            <tr>
                <td><h1>CAMSS</h1></td>
                <td><img src="../../assets/img/home-icon.png" style="height: 50px;"></td>
            </tr>
        </table>
        </a>

    </div>
    <div class="col-lg-1"></div>

</div>

<hr>


<!-- body  -->
<div class="row">
    <div class="col-lg-1">

    </div>

    <div class="col-lg-2">
    <img class="img-responsive img-circle" src="img/register_now.png">
    </div>

    <div class="col-lg-5">
        <form action="" method="post" name="customer_reg_form">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control " name="first_name" id="first_name" value="<?php echo Input::get('first_name'); ?>" placeholder="First Name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control " name="last_name" id="last_name" value="<?php echo Input::get('last_name'); ?>" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label>Username (Email is the Username)</label>
                <input type="email" class="form-control " name="user_name" id="user_name"   placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control " name="user_password" id="user_password" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Retype Password</label>
                <input type="password" class="form-control " name="password_again" id="password_again" placeholder="Retype Password">
            </div>

            <button type="submit" class="btn btn-default ">Register</button>
        </form>
    </div>
    <div class="col-lg-3">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Attention to following Description</div>
                <div class="panel-body" style="color: red;" >
                    <?php
                    echo $came_erros;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1">

    </div>

</div>
<hr>
<!--  Footer -->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <p align="center">SENVA GROUP |  ©2016 </p>
    </div>
    <div class="col-lg-1"></div>

</div>

<hr>

</body>
