<?php
session_start();
require_once '../../core/init.php';

$came_erros = '';

if(Input::exists()){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'user_name' => array(
            'required' => true
        ),
        'user_password' => array(
            'required' => true
        )

    ));

    if($validate->passed()){
        //user login
        $admin= new Admin();

        $user_name = Input::get('user_name');
        $user_password = MD5(Input::get('user_password'));
        $login = $admin->doLogin($user_name,$user_password);

        if($login){
            Redirect::to('dashboard.php');

        }else{
            $came_erros =  'no valid access !';
        }
    }
    else{
        foreach($validate->errors() as $error){
            $came_erros .=  $error . '<br>';
        }
    }
}

?>
<html>
<head>
    <title>CAMSS - Admin Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
</head>
<body>
<!-- Header -->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <h1 align="center">ADMIN LOGIN</h1>
    </div>
    <div class="col-lg-1"></div>

</div>

<!---   Body   --->
<hr>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="col-lg-5" align="center">
            <img src="../../assets/img/Login/Black_Lock.png" class="img-responsive" style="width: 50%;">
        </div>
        <div class="col-lg-5">
            <div class="error">
                <?php
                echo $came_erros;
                ?>
            </div>
            <form action="" method="post" name="login_form">

                <div class="form-group">
                    <label><h4>Email</h4></label>
                    <input type="text" class="form-control input-lg" name="user_name" id="email"   placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label><h4>Password</h4></label>
                    <input type="password" class="form-control input-lg" name="user_password" id="password" placeholder="Password">
                </div>


                <button type="submit" class="btn btn-default input-lg" >Login Now</button>
            </form>

            <hr>

        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
    <div class="row">
        <?php  include('../../includes/footer.php');  ?>
    </div>



</body>
</html>