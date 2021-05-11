<?php
session_start();
$email = $_SESSION["email"];
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$ot1 = $_POST['otp'];
$otp1 = trim($ot1);
$da = date("Y-m-d");
if(isset($_POST["Submit"])){
    $sql = "SELECT * FROM `pay` WHERE `email` = '$email' AND `date` = '$da'";
    $re = mysqli_query($q,$sql);
    while($row = mysqli_fetch_array($re)){
      $otp = $row["otp"];
      break;
    }
    $o = $otp;
    if($o == $otp1){
        echo '<script> alert("OTP VERIFIED!!"); window.location.href="loading.php"; </script>';
    }
    else{
        echo '<script> alert("OTP NOT VERIFIED!!"); window.history.go(-1); </script>';
    }
}
else if(isset($_POST["Cancel"])){
    $da = date("Y-m-d");
    $sql = "SELECT * FROM `pay` WHERE `email` = '$email' AND `date` = '$da';";
$re = mysqli_query($q,$sql);
while($row = mysqli_fetch_array($re)){
    $mon = $row["money"];
    break;
}
if($email==$_SESSION["email"] && $mon != $_SESSION["money"] ){
   $mon = $mon - $_SESSION['money'];
   $sql1 = "UPDATE `pay` SET `money` = '$mon' WHERE `email` = '$email' AND `date` = '$da'";
   $re2 = mysqli_query($q,$sql1);
   if($re2){
       echo "<script>alert('Your Transaction is Successfully Cancelled :)'); window.location.href='donation-homepage.html';</script>";
   }
}
else if($email == $_SESSION["email"] && $mon == $_SESSION["money"]) {
     $qu1 ="DELETE FROM `pay` WHERE `email` = '$email' AND `date` = '$da'"; 
	$re1 = mysqli_query($q,$qu1);
	if($re1){
	    
		echo "<script>alert('Your Transaction is Successfully Cancelled :)'); window.location.href='donation-homepage.html';</script>";
	}
}
else{
    	echo "<script>alert('Please Check Your Email And Then Try Again :)');window.history.go(-1);</script>";
}
}
?>