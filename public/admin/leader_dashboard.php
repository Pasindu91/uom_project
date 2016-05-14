
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



    $leader = new TeamLeader();
    $leader_stmt = $leader->runQuery("SELECT * FROM camss_leader");
    $leader_stmt->execute();
    $result_leader = $leader_stmt->fetchAll();


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
                            <button type="button" class="select_tl btn btn-success btn-lg btn-block">Team Leader</button>
                        </a>
                    </p>
                    <p>
                        <a href="dashboard.php" style="text-decoration: none;">
                            <button type="button" class="select_ap btn btn-default btn-lg btn-block">Admin Profile</button>
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


                <!--  Team Leader Management start -->
                <div class="team_leader">

                    <div class="row">
                        <div class="col-lg-4">
                            <p><button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#add_leader">Add New Leader</button></p>
                        </div>
                        <div class="col-lg-8">
                            <p><input type="text" placeholder="search by email" class="form-control input-lg"></button></p>
                        </div>

                    </div>

                    <hr>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $c = 0;
                        foreach($v = $result_leader as $row){

                            ?>
                            <tr>
                                <td><?php  echo $result_leader[$c]['leader_id'];   ?></td>
                                <td><?php  echo $result_leader[$c]['leader_email'];   ?></td>
                                <td><?php  echo $result_leader[$c]['leader_description'];   ?></td>
                                <td>
                                    <a href="delete_staff_process.php?sid=<?php echo $result_leader[$c]['leader_id']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i></a>

                                    <a href="delete_staff_process.php?staff_id=<?php echo $result_leader[$c]['leader_id']; ?>">
                                        <i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $c++;

                        }
                        ?>

                        </tbody>
                    </table>


                </div>
                <!-- Team Leader Management End -->







            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>




<!-- ===================================================================================================================   -->




<!-- Add Leader model from start  -->
<div class="modal fade" id="add_leader" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Leader</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="add_leader.php">
                    <div class="form-group">
                        <label>Email address / Username</label>
                        <input type="email" class="form-control" name="leader_uname" id="leader_uname" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="leader_pass" id="leader_pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label >Re-Enter Password</label>
                        <input type="password" class="form-control" name="leader_re_pass" id="leader_re_pass" placeholder="Re-Enter Password">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control" name="leader_description" id="leader_description" placeholder="Description">
                    </div>
                    <button  type="submit" class="btn btn-block btn-success">Add</button>
                </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Leader model from end  -->


<!-- ===================================================================================================================   -->




<!-- Footer -->

<div class="row">
    <?php  include('../../includes/footer.php');  ?>
</div>
</body>

</html>
