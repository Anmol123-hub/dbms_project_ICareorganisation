<?php
session_start();
$center = $_POST["b"];
$_SESSION["center_name1"]=$center;
$location = $_POST["b1"];
$date = $_POST["date1"];
$_SESSION["date1"] = $date;
$time = $_POST["type"];
$_SESSION["time1"] = $time;
$i = $_SESSION["isbn"];
$m=0;
$o="";
$op = $_SESSION['email'];
	$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
	if ($_POST['s']=='sub'){ 
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}


    $id = "SELECT * FROM `user_table` WHERE `email` = '$op' ORDER BY  `user_id`;";
$re = mysqli_query($q,$id);
while($row = mysqli_fetch_array($re)){
	$op1=$row["user_id"];
	break;
	}
          $sql12 = "INSERT INTO `book_map`(`user_id`, `center_name`, `location`, `date`, `time`) VALUES ('$op1','$center','$location','$date','$time');";
	$re56 = mysqli_query($q,$sql12);
if($re56){
	header("Location: book_loading.html");
}
}
else if ($_POST['s']=='can'){
    $sql = "DELETE FROM `book_table` WHERE `isbn` = '$i'";
    $re = mysqli_query($q,$sql);
    if($re)
    echo "<script> alert('Successfully Canceled');window.location.href='donation-homepage.html'; </script>";
    
} 

?>
