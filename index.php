
<?php

if(isset($_GET['msg'])){
    $success_msg = $_GET['msg'];
    echo "<script type=\"text/javascript\">alert('$success_msg');</script>";
}
?>

<html>
<head>
    <title>CAMSS</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>

<body>

<!-- Header -->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-1"></div>
    <div class="col-lg-8">
        <h1 align="center" style="color: #4cae4c;">SENVA ENGINEERING</h1>
    </div>
    <div class="col-lg-1"><a href="public/login/index.php" >Login</a>|<a href="public/customer/register.php" >Register</a></div>
    <div class="col-lg-1"></div>
</div>


<!-- Body -->


<div class="row">

    <img src="assets/img/construction-wallpaper.jpg" class="img-responsive" style="width: 100%;">
</div>
<hr>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Who we are</h3></div>
            <div class="panel-body" >
                <img src="assets/img/who_we_are.png" class="img-responsive"">
                <p align="justify">
                    We are a team that will dedicated to provide an excellent service in
                    order to make the construction dreams true
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>How we work</h3></div>
            <div class="panel-body" >
                <img src="assets/img/How_we_work.png" class="img-responsive">
                <p align="justify">
                    We will provide a separate team for you.Monitor your project via a ONLINE SYSTEM. Join with us to grab a excellent service.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Where we are</h3></div>
            <div class="panel-body">
               <img src="assets/img/where_we_are.png" class="img-responsive" >
                <p align="justify">
                    552/5,<br>Welabadawatta,<br>Ranmuthugala<br>Kadawatha<br>
                    info@camss.lk

                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>What we do</h3></div>
            <div class="panel-body" >
                <p align="justify">
                    We provide consultant services on following categories.
                    <ul>
                    <li>Foundations</li>
                    <li>Business Buildings</li>
                    <li>Housing Constructions</li>
                    <li>Roofing Solutions</li>
                    <li>Pipe Solutions</li>
                    <li>Special Projects</li>
                    </ul>
                    click below to see the projects we have already completed
                </p>
                <hr>
                <input type="button" class="form-control" value="View Projects">
            </div>
        </div>
    </div>
    <div class="col-lg-1" ></div>
</div>
<hr>

<!-- Our Clients / Contact US-->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <h2>Our Clients</h2>
        <div class="row">
            <div class="col-lg-3"><img src="assets/img/Clients/AmazonKindle.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/Filehippo.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/MusicBrainz.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/PanoramaSticher.png" class="img-responsive" ></div>

        </div>
        <div class="row">
            <div class="col-lg-3"><img src="assets/img/Clients/RetinaDisplayMonitor.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/Vuze.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/WinRAR.png" class="img-responsive" ></div>
            <div class="col-lg-3"><img src="assets/img/Clients/WJoy.png" class="img-responsive" ></div>

        </div>
    </div>
    <!--   Contact Us -->
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <h2>Contact Us</h2>
        <div class="row">
            <form action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control " name="client_name" id="first_name" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control " name="client_email" id="email"   placeholder="Email" autocomplete="off" required="">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control " name="client_description" id="password" placeholder="What you need to know" required="">
                </div>


                <button type="submit" class="btn btn-default ">Inquire</button>
            </form>
        </div>
    </div>
    <div class="col-lg-1"></div>

</div>

<hr>
<!-- Footer-->
<div class="row">
   <?php  include('includes/footer.php'); ?>

</div>
</body>
</html>