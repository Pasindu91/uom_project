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
            $user= new USER();

            $user_name = Input::get('user_name');
            $user_password = MD5(Input::get('user_password'));
            $login = $user->doLogin($user_name,$user_password);

            if($login){
               Redirect::to('../customer/index.php');

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
    <title>CAMSS - Login Here</title>
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
    <div class="col-lg-8">
        <h1>LOGIN HERE</h1>
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

<!---   Body   --->
<hr>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="col-lg-6">
            <img src="../../assets/img/Login/background.jpg" class="img-responsive" style="width: 80%;">
        </div>
        <div class="col-lg-6">
            <div class="error">
                <?php
                echo $came_erros;
                ?>
            </div>
            <form action="" method="post" name="login_form">

                <div class="form-group">
                    <label><h4>Email</h4></label>
                    <input type="email" class="form-control input-lg" name="user_name" id="email"   placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label><h4>Password</h4></label>
                    <input type="password" class="form-control input-lg" name="user_password" id="password" placeholder="Password">
                </div>


                <button type="submit" class="btn btn-default input-lg" >Login Now</button>
            </form>

            <hr>
            <h4>Still, Not a member  <a href="../../public/customer/register.php">Register with us</a> </h4>
        </div>
    </div>
    <div class="col-lg-1"></div>

</div>


</body>
</html>