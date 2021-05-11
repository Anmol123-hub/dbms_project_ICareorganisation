<?php
session_start();
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
$email = $_SESSION["email"];
$re = mysqli_query($q,"SELECT * FROM `user_table` WHERE `email` = '$email'");
while($row = mysqli_fetch_array($re)){
	$name = $row["username"];
	$id = $row["user_id"];
	break;
}
$_SESSION["n"] = $name;

if($id == 0) {
    echo "<script>alert('Please Login to Continue !'); window.location.href = '../index.html';</script>";
}

?>
<html>
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <meta charset="utf-8">
   <link rel = "icon" href = "DBMS_logo_final.ico" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>

<link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'><link rel="stylesheet" href="./style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="iframe.js"></script>

<style type="text/css">

#hand a:hover{
    cursor: pointer;
    color: white!important;
}

#moduleHover:hover {
    cursor: pointer;
}

.logoutBtn:hover {
    color: white!important;
}

#element1Out {
    display:inline-block;
    float: left;
} 
#element2Out {
    display:inline-block; 
    background-color:red;
    float: right;
} 

</style>

<script>
    window.onload = function() {
        document.body.style.zoom = "90%";
        changeLink();
      }
    function wasteManagt0(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "home.html";
    }
    function wasteManagt(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "environment/wasteMgmt.php";
    }
    function wasteManagt1(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "environment/pollutionChk.php";
    }
    function wasteManagt2(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "healthcare/bloodDonation.php";
    }
    function wasteManagt3(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "healthcare/generalCheckUp.php";
    }
    function wasteManagt4(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "donation/fundDonation.php";
    }
    function wasteManagt5(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "donation/otherDonation.php";
    }
    function wasteManagt6(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "ministore/storedashboard.php";
    }
    function wasteManagt7(){
        var myFrame = document.getElementById("Iframe");
        myFrame.src = "settings.php";
    }
</script>

</head>
<body>

<!-- partial:index.partial.html -->
<aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1" style="margin-top: 87px; z-index: 50;">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1" style="zoom:1.5; padding:5px;"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
      
    <?php
    $queryImg = mysqli_query($q, "SELECT profile_pic FROM user_table WHERE user_id = '$id'");
    $count = mysqli_fetch_assoc($queryImg);
    $count = $count['profile_pic'];
    if(!$count == "") {
    ?>
    
    <img class="rounded-pill img-fluid" width="65" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($count); ?>">
    
    <?php }
    else {
    ?>
    
    <img class="rounded-pill img-fluid" width="65" src="../images/profile_pic.jpg">
    
    <?php } ?>
    
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none" href="#"><?php echo $_SESSION["n"] ?></a>
      </h5>
      <p class="mt-1 mb-0">(User)</p>
    </div>
  </div>

  <div class="search position-relative text-center px-4 py-3 mt-2">
    <h5 class="fs-6 mb-0">
        <span id="moduleHover" class="text-decoration-none" style="color:0D6EFD" onclick="wasteManagt0()">Our Modules</span>
    </h5>
  </div>

  <ul class="categories list-unstyled">
    <li class="has-dropdown">
      <i class="uil-trees fa-fw"></i><a href="#"> Environment</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li id="hand"><a style="color: #9CA3AF" onclick="wasteManagt()">Waste Management</a></li>
        <li id="hand"><a onclick="wasteManagt1()" style="color: #9CA3AF">Pollution Check</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-hospital fa-fw"></i><a href="#"> Health Care</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li id="hand"><a onclick="wasteManagt2()" style="color: #9CA3AF" >Medical Donation</a></li>
        <li id="hand"><a onclick="wasteManagt3()" style="color: #9CA3AF" >Medical Diagnosis</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-money-stack fa-fw"></i><a href="#"> Donation</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li id="hand"><a onclick="wasteManagt4()" style="color: #9CA3AF" >Fund Donation</a></li>
        <li id="hand"><a onclick="wasteManagt5()" style="color: #9CA3AF" >Other Donation</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-shop"></i><a href="#"> E-Commerce</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li id="hand"><a onclick="wasteManagt6()" style="color: #9CA3AF" >Mini Store</a></li>
      </ul>
    </li>
    <li class="has-dropdown">
      <i class="uil-setting"></i><a href="#"> Settings</a>
      <ul class="sidebar-dropdown list-unstyled">
        <li id="hand"><a onclick="wasteManagt7()" style="color: #9CA3AF" >User Account</a></li>
      </ul>
    </li>
  </ul>
</aside>

<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="padding-left: 10px;">
            <a class="navbar-brand" href="../home.html">
                <img src="DBMS_logo_final.png" height="60px" width="60px" alt="ICARE ORGANISATION"></img>
                <a href="../home.html" style="color: white; text-decoration: none; width: 260px;">ICare Organization</a>
            </a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 container-fluid">
                <li class="nav-item">
                    <a class="nav-link" href="../home.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Our Modules
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../Environment Management/home.html">Environment</a>
                    <a class="dropdown-item" href="../healthcare/home_page.html">Health Care</a>
                    <a class="dropdown-item" href="../Donation/donation-homepage.html">Donation</a>
                    <a class="dropdown-item" href="../mini_store/store.html">Mini Store</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#team">Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#contactus">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../dashboardCheck.php">Dashboard</a>
                </li>
            </ul>

            <ul class=" navbar-nav ml-auto mt-2 mt-lg-0">
                <li>
                    <a class="nav-link container-fluid logoutBtn" href="../index.html" style="font-weight: bold; font-size: 20px; margin-right:50px;">Logout <i style="font-weight: bold; font-size: 25px; color: #FFFFFF8C;" class="uil-signout fa-fw"> </i></a>
                </li>
                <li>
                    <!--<i style="font-weight: bold; font-size: 25px; color: #FFFFFF8C; margin-top:15px!important;" class="uil-signout fa-fw"></i>-->
                </li>
            </ul>
        </div>
    </nav>
</header>


<section id="wrapper" style="margin-top: 85px;">

  <button class="navbar-toggler" style="margin: 20px 0px -10px 25px!important;">
    <i data-show="show-side-navigation1" class="uil-bars show-side-btn text-white" style="zoom:1.2;"></i>
  </button>

  <div class="p-4">
    <div class="welcome">
      <center>
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
        <p class="mb-0">Hello <?php echo $_SESSION["n"] ?>, welcome to ICare dashboard!</p>
      </div>
      </center>
    </div>
</div>

<div class="p-4">
    <iframe src="home.html" id="Iframe" frameborder="0" height="100%" width="100%"></iframe>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.jshttps://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script><script  src="./script.js"></script>

</body>
</html>
