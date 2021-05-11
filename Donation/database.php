<?php
session_start();
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$email = $_SESSION["email"];
$point="";
$da = date("Y-m-d");
$sql = "SELECT * FROM `pay` WHERE `email` = '$email' AND `otp` = '0'";
$re = mysqli_query($q,$sql);
while($row = mysqli_fetch_array($re)){
    $otp = $row["otp"];
    break;
}
$o = $otp;
$l = "SELECT * FROM pay a INNER JOIN rewards_table b ON a.user_id=b.user_id WHERE a.email = '$email';";
$l1 = mysqli_query($q,$l);
while($row = mysqli_fetch_array($l1)){
    $point= $row["rewards_point"];
    break;
}
$p = $point;
if($o == "0" || $p == ""){
     $sql1 = "DELETE FROM `pay` WHERE `otp` = '0';";
$re1 = mysqli_query($q,$sql1);

if($re1){
    header("Location: fund_donation.html");
}
}
else{
   header("Location: fund_donation.html");
}

?>