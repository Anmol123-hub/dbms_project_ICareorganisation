<?php
session_start();
$name = $_POST['name'];
$_SESSION["name"] = $name;
$d_type = $_POST['type'];
$d_type1 = $_POST['type1'];
 $_SESSION["d_type"] = $d_type;
$address = $_POST['address'];
$_SESSION["address"] = $address;
$q_type= $_POST['one'];
$_SESSION["q_type"] = $q_type;
$qty = $_POST['qty'];
$_SESSION["qty"] = $qty;
$reason = $_POST['reason'];
$_SESSION["reason"] = $reason;
$rh = rand();
$_SESSION["ran"] = $rh;
$m=0;
$o="";

$op = $_SESSION['email'];
	$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}
if($d_type == "other"){
    $d_type = $d_type1;
    $_SESSION["d_type"] = $d_type;
}

    $id = "SELECT * FROM `user_table` WHERE `email` = '$op' ORDER BY  `user_id`;";
$re = mysqli_query($q,$id);
while($row = mysqli_fetch_array($re)){
	$op1=$row["user_id"];
   
	break;
	}
 $_SESSION["id"]= $op1;
	    $idl = "SELECT * FROM `other_donation`;";
$r = mysqli_query($q,$idl);
while($row = mysqli_fetch_array($r)){
    if($row["email"] == $op && $row["d_type"] == $d_type){
    	$o = $row["email"];
	$m=$row["qty"];
	$m1 = $row["d_type"];
	break;
	}
}

	if($op == $o && $d_type == $m1){
	    $mone = $qty;
	    $mone = $mone +$m;
	    $sql = "UPDATE `other_donation` SET `qty`='$mone' WHERE `d_type`= '$d_type';";
	$re9 = mysqli_query($q,$sql);

if($re9){
	header("Location: map_main.php");
}
	}
	else {
          $sql12 = "INSERT INTO `other_donation`(`name`, `d_type`, `email`, `city`, `q_type`, `qty`, `reason`,`ticket`, `user_id`) VALUES ('$name','$d_type','$op','$address','$q_type','$qty','$reason', '$rh','$op1');";
	$re56 = mysqli_query($q,$sql12);
if($re56){
	
	header("Location: map_main.php");
}
}

?>