<?php
session_start();
$email = $_SESSION["email"];
$random = rand();
$da = date("Y-m-d");
	$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");

$sql = "SELECT * FROM `pay` WHERE `email` = '$email' and `date` = '$da'";
$re = mysqli_query($q,$sql);
while($row = mysqli_fetch_array($re)){
    $otp = $row["otp"];
    break;
}
if($otp == ""){
    $a = "INSERT INTO `pay` (`otp`) VALUES ('$random');";
    $re1 = mysqli_query($q,$a);
    if($re1)
    echo '<script> alert("OTP Is Send To Your Email"); window.location.href="otp.php"; </script>';
}
else{
     $a = "UPDATE `pay` SET `otp` = '$random' WHERE `email` = '$email' and `date` = '$da';";
    $re1 = mysqli_query($q,$a);
     if($re1)
    echo '<script> alert("OTP Is Send To Your Email"); window.location.href="otp.php"; </script>';
}
$m = $_SESSION["money"];
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
 <h4 align='center'> Your OTP code is -> <u><i><b>$random</b></i></u>   And You are donating -> <u><i><b>₹$m</b></i></u> </h4>
 <hr>
 <p align='right'> Thank You For Beign Part Of Our Organisation :) </p>
 <p align='right'> Join Us On <a href='https://www.facebook.com/icareorganisation123'>FACEBOOK</a></p>
 <p align='right'> Join Us On <a href='https://twitter.com/IcareOrganisat1'>TWITTER</a></p>
 <p align='right'> Join Us On <a href='https://www.instagram.com/icareorganisation1/'>INSTAGRAM</a></p>
</div>

</body>
</html>";
mail($email,"OTP" ,$message,$h);
?>