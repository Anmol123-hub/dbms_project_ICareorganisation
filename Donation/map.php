<?php
session_start();
$qq = $_SESSION["qty"];
$random = $_SESSION["ran"];
$d = $_SESSION["d_type"];
$op = $_SESSION['email'];
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
if ($_POST['s']=='sub'){ 
$center = $_POST["b"];
$_SESSION["center_name"]=$center;
$location = $_POST["b1"];
$date = $_POST["date1"];
$_SESSION["date"] = $date;
$time = $_POST["type"];
$_SESSION["time"] = $time;
$m=0;
$o="";

	
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}


    $id = "SELECT * FROM `user_table` WHERE `email` = '$op' ORDER BY  `user_id`;";
$re = mysqli_query($q,$id);
while($row = mysqli_fetch_array($re)){
	$op1=$row["user_id"];
	break;
	}
          $sql12 = "INSERT INTO `map_table`(`user_id`, `center_name`, `location`, `date`, `time`, `ticket`) VALUES ('$op1','$center','$location','$date','$time','$random');";
	$re56 = mysqli_query($q,$sql12);
if($re56){
	header("Location: loading1.php");
}
}
else if ($_POST['s']=='can'){
    $email = $_SESSION["email"];
   $id = "SELECT * FROM `other_donation` WHERE `email` = '$op' and `d_type` = '$d';";
$re = mysqli_query($q,$id);
    while($p = mysqli_fetch_array($re)){
        $s = $p["qty"];
    }
    $s1 =$s;
    if($s1==$qq){
    $sql = "DELETE FROM `other_donation` WHERE `email` = '$email' and `d_type` = '$d'";
    $re = mysqli_query($q,$sql);
    if($re)
    echo "<script> alert('Successfully Canceled');window.location.href='donation-homepage.html'; </script>";
}
else{
    $s1 = $s1 - $qq;
     $sql = "UPDATE `other_donation` SET `qty` = '$s1' WHERE `email` = '$email' and `d_type` = '$d'";
    $re = mysqli_query($q,$sql);
    if($re)
    echo "<script> alert('Successfully Canceled');window.location.href='donation-homepage.html'; </script>";
}
}
?>
