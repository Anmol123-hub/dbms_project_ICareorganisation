<?php
session_start();
$email = $_POST ['email'];
$e = $_SESSION["email"];
$da = date("Y-m-d");
$q= mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$sql = "SELECT * FROM `pay` WHERE `email` = '$e' AND `date` = '$da';";
$re = mysqli_query($q,$sql);
while($row = mysqli_fetch_array($re)){
    $mon = $row["money"];
    $d = $row["date"];
    break;
}
if($email==$_SESSION["email"] && $mon != $_SESSION["money"]&& $d == $da ){
   $mon = $mon - $_SESSION['money'];
   $sql1 = "UPDATE `pay` SET `money` = '$mon' WHERE `email` = '$e' AND `date` = '$da'";
   $re2 = mysqli_query($q,$sql1);
   if($re2){
       echo "<script>alert('Your Transaction is Successfully Cancelled :)'); window.location.href='donation-homepage.html';</script>";
   }
}
else if($email == $_SESSION["email"] && $mon == $_SESSION["money"]&& $d == $da) {
     $qu1 ="DELETE FROM `pay` WHERE `email` = '$email' AND `date` = '$da'"; 
	$re1 = mysqli_query($q,$qu1);
	if($re1){
	    
		echo "<script>alert('Your Transaction is Successfully Cancelled :)'); window.location.href='donation-homepage.html';</script>";
	}
}
else{
    	echo "<script>alert('Please Check Your Email And Then Try Again :)');window.history.go(-1);</script>";
}

?>