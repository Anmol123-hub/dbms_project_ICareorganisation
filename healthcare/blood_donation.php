<?php

session_start();
$name=$_POST['name'];
$email1=$_POST['email'];
$phno=$_POST['phno'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$bot_bp=$_POST['bot_bp'];
$top_bp=$_POST['top_bp'];
$hem=$_POST['hem'];
$pulse=$_POST['pulse'];
$temp=$_POST['temp'];

$radio=$_POST['loc'];
$bld_grp=$_POST['Blood_group'];
$curr_date=$_POST['curr_date'];
$today = date("Y-m-d");
// $expiry=$_POST['expiry'];
$expiry= date('Y-m-d', strtotime($curr_date. ' + 27 days'));

$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$email = $_SESSION["email"];
$id = 0;
$a = "SELECT * FROM `user_table` WHERE `email` = '$email'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}

$sql="INSERT INTO `blood_donation`(`name`, `email`, `phone`, `age`, `height`, `weight`, `diastolic_BP`, `systolic_BP`, `haemoglobin`, `pulse_rate`, `body_temperature`, `trans_disaese`, `blood_group`,`user_id`,`donation_date`,`expiry_date`) VALUES ('$name','$email1','$phno','$age','$height','$weight','$bot_bp','$top_bp','$hem','$pulse','$temp','$radio','$bld_grp','$id','$curr_date','$expiry');";
$re=mysqli_query($db_con,$sql);

if($re)
{
  echo "<script> alert('Your Data is Sucessfully Saved, Your expiry date is $expiry');window.location.href='map.html'</script>";
}

$b = "SELECT * FROM blood_donation";
$a2 = mysqli_query($db_con,$b);
while($r1 = mysqli_fetch_array($a2)){
  $l=$r1['expiry_date'];

  if(($l)<=($today)){
    //  echo $l;
      $q="DELETE FROM blood_donation WHERE expiry_date = '$l'";

 $re1=mysqli_query($db_con,$q);
}

      
  }
   
  $q = "SELECT * FROM blood_map";
$a2 = mysqli_query($db_con,$q);
while($r1 = mysqli_fetch_array($a2)){
  $e=$r1['expiry_date'];

  if(($e)<=($today)){
    //  echo $l;
      $q1="DELETE FROM blood_map WHERE expiry_date = '$e'";

 $re1=mysqli_query($db_con,$q1);
}

      
  } 


?>
