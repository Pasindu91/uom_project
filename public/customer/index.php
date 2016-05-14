
<?php

require_once '../../classes/Session.php';

require_once("../../classes/User.php");

$auth_user = new USER();

$user_name= $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM camss_customer WHERE customer_email=:user_email");
$stmt->execute(array(":user_email"=>$user_name));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>




<head>
    <title>CAMSS Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery-1.10.2.js"></script>
</head>
<body>
<div>
<?php include('../../includes/header.php'); ?>
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

                    <h4 align="center" style="color: #4cae4c;"> <?php echo $userRow['customer_fname']. " " . $userRow['customer_lname'] ?></h4>


                <div>
                    <p><button type="button" class="select_pm btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#add_manager">Request Project</button></p>
                    <p><button type="button" class="select_tl btn btn-default btn-lg btn-block">Current Projects</button></p>
                    <p><button type="button" class="select_ap btn btn-default btn-lg btn-block">Progress</button></p>
                    <p> <a href="../login/logout.php?logout=true"><button type="button" class="btn btn-danger btn-block">Logout</button></a></p>
                </div>
            </div>
            <div class="col-lg-8">

            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>

<div class="modal fade" id="add_manager" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Manager</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="Email address">Email address / Username</label>
                        <input type="email" class="form-control" id="manager_uname" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Re-Enter Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-Enter Password">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<div class="row">
<?php  include('../../includes/footer.php');  ?>
</div>
</body>

</html>
