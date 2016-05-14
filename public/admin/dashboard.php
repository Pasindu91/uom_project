
<?php

session_start();
require_once '../../core/init.php';

if(isset($_REQUEST['error'])){
    $came_erros = $_REQUEST['error'];
}
else{
    $came_erros = "";
}


if(!isset($_SESSION['admin_session']))
{
    Redirect::to('index.php');
}else{

    $admin = new Admin();
    $user_name= $_SESSION['admin_session'];

    $stmt = $admin->runQuery("SELECT * FROM camss_admin WHERE admin_uname=:user_name");
    $stmt->execute(array(":user_name"=>$user_name));

    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);



    $manager = new Manager();
    $manager_stmt = $manager->runQuery("SELECT * FROM camss_manager");
    $manager_stmt->execute();
    $result_manager = $manager_stmt->fetchAll();


}

?>

<html>




<head>
    <title>Admin Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link  rel="stylesheet"  href="../../assets/js/bootstrap.min.css" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>




</head>
<body>
<div>
    <?php include('../../includes/header.php'); ?>
</div>

<div align="center" style="color: red;" >
    <?php
    echo $came_erros;
    ?>

</div>
<hr>
<div class="row">

    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-2">
                <div>
                    <img src="../../assets/img/empty_user.png" class="img-responsive img-circle">

                </div>

                <h4 align="center" style="color: #4cae4c;"> <?php echo $userRow['admin_uname']?></h4>


                <div>
                    <p>
                        <a href="manager_dashboard.php" style="text-decoration: none;">
                        <button type="button" class="select_pm btn btn-default btn-lg btn-block">Project Manager</button>
                        </a>
                    </p>
                    <p>
                        <a href="leader_dashboard.php" style="text-decoration: none;">
                        <button type="button" class="select_tl btn btn-default btn-lg btn-block">Team Leader</button>
                        </a>
                    </p>
                    <p>
                        <a href="dashboard.php" style="text-decoration: none;">
                        <button type="button" class="select_ap btn btn-success btn-lg btn-block">Admin Profile</button>
                        </a>
                    </p>

                    <p>
                        <a href="admin_logout.php?logout=true">
                            <button type="submit" class="btn btn-danger btn-block">
                                Logout
                            </button>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <table class="table">
                            <thead>
                            <tr>
                                <th># Managers</th>
                                <th># Leaders</th>
                                <th>MySQL connections</th>

                            </tr>
                            </thead>
                            <tbody>
                                <td><h1 style="font-size: 50px; color: #449d44;">
                                    <?php

                                    $count = $admin->count_of_managers();
                                    print_r($count[0][0]);
                                    ?>
                                    </h1>
                                </td>
                                <td>
                                    <h1 style="font-size: 50px; color: #449d44;">
                                    <?php

                                    $count = $admin->count_of_leaders();
                                    print_r($count[0][0]);
                                    ?>
                                    </h1>
                                </td>
                            <td>
                                <h1 style="font-size: 50px; color: #843534;">
                                    <?php

                                    $count = $admin->showMySQLConfigs();
                                    print_r($count[0][1]);

                                    ?>
                                </h1>


                            </td>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-lg-2"></div>
                </div>


                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <!-- Admin Profile Management Start -->
                        <div class="admin">

                            <form role="form">

                                <input type="email" class="form-control" id="email" placeholder="Email">

                                <input type="password" class="form-control" id="pwd" placeholder="Password">

                                <input type="re_password" class="form-control" id="re_pwd" placeholder="Retype Password">

                                <button type="submit" class="btn btn-default">Update Profile</button>
                            </form>


                        </div>
                        <!-- Admin Profile Management End -->

                    </div>
                    <div class="col-lg-2"></div>
                </div>









            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>









<!-- Footer -->

<div class="row">
    <?php  include('../../includes/footer.php');  ?>
</div>
</body>

</html>
