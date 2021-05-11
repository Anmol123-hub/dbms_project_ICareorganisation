<?php
session_start();
$random = rand();
$_SESSION["random1"] = $random;
$email = $_SESSION["email"];
$name = $_SESSION["name1"];
$i1 = $_SESSION["isbn"];
$d = $_SESSION["d_type1"];
$city = $_SESSION["address1"];
$date = $_SESSION["date1"];
$time = $_SESSION["time1"];
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$center1 = $_SESSION["center_name1"];
$t=mysqli_query($q,"SELECT * FROM `book_table` WHERE `email` = '$email'");
while($t1 = mysqli_fetch_array($t)){
    if($_SESSION["isbn"] == $t1["isbn"]){
    $i = $t1["isbn"];
    $t2 = $t1["ticket_no"];
    break;
    }
}
$result4 = mysqli_query($q,"SELECT MAX(`id`) AS `max` FROM `book_map`");
$row6 = mysqli_fetch_array($result4);
$max = $row6['max'];

    if($t2==0){
$sql = "UPDATE `book_table` SET `ticket_no` = '$random' WHERE `email` = '$email' and `isbn` = '$i1';";
$r = mysqli_query($q,$sql);
$sql1 = "UPDATE `book_map` SET `ticket`='$random' where `id` = '$max';";
$r1 = mysqli_query($q,$sql1);
}
else{
$sql = "UPDATE `book_table` SET `ticket_no` = '$t2' WHERE `email` = '$email' and `isbn` = '$i1';";
$r = mysqli_query($q,$sql);
$sql1 = "UPDATE `book_map` SET `ticket`='$t2' where `id` = '$max';";
$r1 = mysqli_query($q,$sql1);
$random=$t2;
}

$h = "From: icareorganisation1@gmail.com\r\n";
$h .= "MIME-Version: 1.0\r\n";
$h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<html>
<head>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<body bgcolor = 'cyan'>
<div align = 'center'>
<img src='https://lh3.googleusercontent.com/MWNmVxMAkPkXkbfmxrBYVPPuqxuWuEKcWby4jfRYQ_nqyZob_rK3WmBmriEuDAvlZlWeaXNTvX-UqT_i=w1000-no-tmp.jpg' height=150 width=150>
</div>
<div class='jumbotron'>
  <h1 class='display-4' align='center'>Icare Organisation</h1>
  <h2 align='center'> Our Care Earns Your Smile :)</h2>
  <hr class='my-4'>
 <h3 align='center'> Your Name -> <u><i><b>$name</b></i></u></h3>
 <h3 align='center'> Your Book Name  -> <u><i><b>$d</b></i></u></h3>
 <h3 align='center'> Your City -> <u><i><b>$city</b></i></u></h3>
 <h3 align='center'> Your Date -> <u><i><b>$date</b></i></u></h3>
 <h3 align='center'> Your Time -> <u><i><b>$time</b></i></u></h3>
 <h3 align='center'> Your Center Name -> <u><i><b>$center1</b></i></u></h3>
 <h3 align='center'> Your Ticket Number -> <u><i><b>$random</b></i></u></h3>
 <hr>
 <p align='right'> Thank You For Beign Part Of Our Organisation :) </p>
 <p align='right'> Join Us On <a href='https://www.facebook.com/icareorganisation123'>FACEBOOK</a></p>
 <p align='right'> Join Us On <a href='https://twitter.com/IcareOrganisat1'>TWITTER</a></p>
 <p align='right'> Join Us On <a href='https://www.instagram.com/icareorganisation1/'>INSTAGRAM</a></p>
</div>

</body>
</html>";
mail($email,"Registration" ,$message,$h);
$result = mysqli_query($q,"SELECT COUNT(`isbn`) AS `count` FROM `book_table` where `isbn` = '$i'");
$row1 = mysqli_fetch_array($result);
$count = $row1['count'];
?>
<html>
   <head>
      <title>Invoice</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon">
     <style>

     .navbar-custom {
    background-color: #150080;
    border-color: #425766;
    background-image: linear-gradient(360deg,#2300e6 0%,#100357 100%);
    font-size: 20px;
}
         .navbar-nav {
    padding-left: 20px;
    padding-right: 20px;
}

.navbar-nav .nav-item {
    padding-left: 5px;
    padding-right: 5px;
}

.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    border-bottom: 3px solid red;
    color: white;
}
     </style>
   </head>
   <body>
       <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="../home.html">
                <img src="DBMS_logo_final.png" height="60px" width="60px" alt="ICARE ORGANISATION"></img>
                <a href="../home.html" style="color: white; text-decoration: none;">ICare Organization</a>
            </a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
                    <a class="dropdown-item" href="donation-homepage.html">Donation</a>
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
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li>
                    <a class="nav-link" href="../index.html" style="font-weight: bold; font-size: 20px;">Logout <span><i class="fas fa-sign-out-alt"></i></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<br><br><br>
      <div class="container" style="margin-top:30px;">
         
         <div class="card">
              <img src="DBMS_logo_final.png" style="margin:auto auto;" height=150 width=150>
              <h2 align="center">Icare Organisation</h2>
            <div class="card-header">
               Invoice
               <strong><?php echo date("d/m/Y") ?></strong> 
               <span class="float-right"> <strong>Status:</strong> Completed</span>
            </div>
            <div class="card-body">
               <div class="row mb-4">
                  <div class="col-sm-6">
                     <h6 class="mb-3">From:</h6>
                     <div>
                        <strong>Icare Organisation</strong>
                     </div>
                     <div>Email: icareorganisation1@gmail.com</div>
                     <div>Phone: +91 9634452195</div>
                  </div>
                  <div class="col-sm-6">
                     <h6 class="mb-3">To:</h6>
                     <div>
                        <strong><?php echo $_SESSION["name1"] ?></strong>
                     </div>
                     <div><?php echo $_SESSION["address1"] ?></div>
                     <div>Email: <?php echo $_SESSION["email"] ?></div>
                  </div>
               </div>
               <div class="table-responsive-sm">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th class="center">ID</th>
                           <th>Name</th>
                           
                           <th class="right">Book Name</th>
                           <th class="center">Book ISBN</th>
                            <th class="right">Total Books</th>
                           <th class="right">Date</th>
                            <th class="right">Time</th>
                             <th class="right">Center Name</th>
                             <th class="right">Ticket Number</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="center"><?php echo $_SESSION["id1"] ?></td>
                           <td class="left strong"><?php echo $_SESSION["name1"] ?></td>
                           <td class="left"><?php echo $_SESSION["d_type1"] ?></td>
                           <td class="right"><?php echo $_SESSION["isbn"] ?></td>
                           <td class="right"><?php echo $count ?></td>
                           <td class="center"><?php echo $_SESSION["date1"] ?></td>
                           <td class="right"><?php echo $_SESSION["time1"] ?></td>
                           <td class="right"><?php echo $_SESSION["center_name1"] ?></td>
                           <td class="right"><?php echo $random ?></td>
                        </tr>
                        
                     </tbody>
                  </table>
               </div>
               <div class="row">
                  <div class="col-lg-4 col-sm-5">
                  </div>
                 
                     <table>
                        <tbody>
                           <tr>
                              <button onclick="window.print()" style="margin-top:20px;">Print <i class="fa fa-print"></i></button>
                              <a href="donation-homepage.html" style="margin-left:50px;"><button style="margin-top:20px;">Continue<i class="fas fa-arrow-circle-right"></i></button></a>
                           </tr>
                          
                        </tbody>
                     </table>
                  </div>
               
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

   </body>
</html>