<?php
session_start();
$name = $_POST['name'];
$m=0;
$o="";
$da = date("Y-m-d");
$phone = $_POST['phone'];
$postal = $_POST['postal'];
$city = $_POST['city'];
$money = $_POST['money'];
$reason = $_POST['message'];
$op = $_SESSION['email'];
	$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}


    $id = "SELECT * FROM `user_table` WHERE `email` = '$op' ORDER BY  `user_id`;";
$re = mysqli_query($q,$id);
while($row = mysqli_fetch_array($re)){
	$op1=$row["user_id"];
    
	break;
	}
$da = date("Y-m-d");
	    $idl = "SELECT * FROM `pay` WHERE `email` = '$op' AND `date` = '$da'";
$r = mysqli_query($q,$idl);
while($row = mysqli_fetch_array($r)){
    	$o = $row["email"];
	$m=$row["money"];
	$da1 = $row["date"];
	break;
	}

	if($op == $o && $da1==$da ){
	    $mone = $money;
	    $mone = $mone +$m;
	    $sql = "UPDATE `pay` SET `money`='$mone' WHERE `email`= '$op' AND `date` = '$da';";
	$re9 = mysqli_query($q,$sql);
	$up1 = "UPDATE `pay` SET `name`='$name' WHERE `email`= '$op' AND `date` = '$da';";
	$upe1 =mysqli_query($q,$up1);
	$up2 = "UPDATE `pay` SET `pcode`='$postal' WHERE `email`= '$op' AND `date` = '$da';";
	$upe2 =mysqli_query($q,$up2);
	$up3 = "UPDATE `pay` SET `city`='$city' WHERE `email`= '$op' AND `date` = '$da';";
	$upe3 =mysqli_query($q,$up3);
	$up4 = "UPDATE `pay` SET `phone`='$phone' WHERE `email`= '$op' AND `date` = '$da';";
	$upe4 =mysqli_query($q,$up4);
	$up5 = "UPDATE `pay` SET `reason`='$reason' WHERE `email`= '$op'AND `date` = '$da';";
	$up5 =mysqli_query($q,$up5);
if($re9){
	$_SESSION['money'] = $money;

	header("Location: payment_portal.php");
}
	}
	else {
          $sql12 = "INSERT INTO `pay`(`name`, `email`, `money`, `pcode`, `city`, `phone`,`reason`,`date`,`user_id`) VALUES('$name','$op','$money','$postal','$city','$phone','$reason','$da','$op1');";
	$re56 = mysqli_query($q,$sql12);
if($re56){
	$_SESSION['money'] = $money;
	header("Location: payment_portal.php");
}
}

?>