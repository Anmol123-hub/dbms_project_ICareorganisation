<?php
session_start();
$name = $_POST['name'];
$_SESSION["name1"] = $name;
$b_name = $_POST['bname'];
 $_SESSION["d_type1"] = $b_name;
$address = $_POST['address'];
$_SESSION["address1"] = $address;
$isbn = $_POST['isbn'];
$_SESSION["isbn"] = $isbn;
$reason = $_POST['reason'];
$_SESSION["reason"] = $reason;
$m=0;
$o="";

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
	try{
 $_SESSION["id1"]= $op1;

          $sql12 = "INSERT INTO `book_table`(`name`, `book_name`, `email`, `isbn`, `city`, `reason`, `user_id`) VALUES ('$name','$b_name','$op','$isbn','$address','$reason','$op1');";
	$re56 = mysqli_query($q,$sql12);
	
if($re56){
	
	header("Location: book_map.php");
}
}
	catch(Exception $exp){
	    echo "<script>alert('Message: $exp');</script>";
	}

?>