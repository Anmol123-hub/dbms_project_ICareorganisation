<?php
session_start();
$op = $_SESSION['email'];
$op1 = 0;
$op2 = 0;
$op3 = "";
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$money = $_SESSION["money"];
$id = "SELECT * FROM `user_table` WHERE `email` = '$op';";
$re = mysqli_query($q,$id);
 
while($row = mysqli_fetch_array($re)){
	$op1=$row["user_id"];
	break;
	}
	$idl = "SELECT * FROM `rewards_table` WHERE `user_id` = '$op1';";
	$re1 = mysqli_query($q,$idl);
	while($row = mysqli_fetch_array($re1)){
	$op2=$row["user_id"];
	break;
	}

	if($op1 == $op2){
	    $p = "SELECT * FROM `rewards_table` WHERE `user_id` = '$op1'";
	    $p1 = mysqli_query($q,$p);
	    	while($row = mysqli_fetch_array($p1)){
	$reward=$row["rewards_point"];
	break;
	}
		if($money >= 1000 && $money<4999){
		    $reward = $reward + 5;
	    $id1 = "UPDATE rewards_table SET rewards_point = '$reward' where user_id = '$op1';";
	    $re2 = mysqli_query($q,$id1);
	}
	else if($money >= 5000 && $money < 9999){
	       $reward = $reward + 10;
	    $id1 = "UPDATE rewards_table SET rewards_point = '$reward' where user_id = '$op1';";
	    $re2 = mysqli_query($q,$id1);
	}
		else if($money >= 10000 && $money < 99999){
		       $reward = $reward + 15;
	    $id1 = "UPDATE rewards_table SET rewards_point = '$reward' where user_id = '$op1';";
	    $re2 = mysqli_query($q,$id1);
	}
			else if($money >= 100000){
			       $reward = $reward + 20;
	    $id1 = "UPDATE rewards_table SET rewards_point = '$reward' where user_id = '$op1';";
	    $re2 = mysqli_query($q,$id1);
	}
	else if($money<1000){
	       $reward = $reward + 2;
	     $id1 = "UPDATE rewards_table SET rewards_point = '$reward' where user_id = '$op1';";
	    $re2 = mysqli_query($q,$id1);
	}
	}
	else{
	if($money >= 1000 && $money <4999){
	    $id1 = "INSERT INTO rewards_table VALUES('$op1','5');";
	    $re2 = mysqli_query($q,$id1);
	}
	else if($money >= 5000 && $money<9999){
	    $id1 = "INSERT INTO rewards_table VALUES('$op1','10');";
	    $re2 = mysqli_query($q,$id1);
	}
		else if($money >= 10000 && $money < 99999){
	    $id1 = "INSERT INTO rewards_table VALUES('$op1','15');";
	    $re2 = mysqli_query($q,$id1);
	}
			else if($money >= 100000){
	    $id1 = "INSERT INTO rewards_table VALUES('$op1','20');";
	    $re2 = mysqli_query($q,$id1);
	}
	else if($money<1000){
	     $id1 = "INSERT INTO rewards_table VALUES('$op1','2');";
	    $re2 = mysqli_query($q,$id1);
	}
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
  <title>Loading</title>
  <link rel="stylesheet" type="text/css" href="loading.css">
     <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
     <script>
         setTimeout(function(){
          alert("Payment Successful :)");
            window.location.href = 'print.php';
         },5000);
      </script>
</head>
<body>
  <img src="DBMS_logo_final.png" height="150" width="150" style="margin-left: auto;margin-right: auto;display: block;margin-top: 210px;">
<div class="sk-cube-grid" >
  <div class="sk-cube sk-cube1"></div>
  <div class="sk-cube sk-cube2"></div>
  <div class="sk-cube sk-cube3"></div>
  <div class="sk-cube sk-cube4"></div>
  <div class="sk-cube sk-cube5"></div>
  <div class="sk-cube sk-cube6"></div>
  <div class="sk-cube sk-cube7"></div>
  <div class="sk-cube sk-cube8"></div>
  <div class="sk-cube sk-cube9"></div>
</div>
</body>
</html>