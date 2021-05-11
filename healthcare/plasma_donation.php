<?php
session_start();
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$name=$_POST['name'];
$email1=$_POST['email'];
$phno=$_POST['phno'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$protien=$_POST['protien'];
$temp=$_POST['temp'];

$radio=$_POST['loc'];
$radio1=$_POST['lock'];
$bld_grp=$_POST['Blood_group'];
$curr_date=$_POST['curr_date'];
$today = date("Y-m-d");
$expiry= date('Y-m-d', strtotime($curr_date. ' + 181 days'));
$email = $_SESSION["email"];

$id = 0;
$a = "SELECT * FROM `user_table` WHERE `email` = '$email'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}
$sql="INSERT INTO `plasma_donation`(`name`, `email`, `phone`, `age`, `height`, `weight`, `protien_intake`, `temp`, `trans_disease`, `covid_sufferance`, `blood_group`,`user_id`,`donation_date`,`expiry_date`) VALUES ('$name','$email1','$phno','$age','$height','$weight','$protien','$temp','$radio','$radio1','$bld_grp','$id','$curr_date','$expiry');";
$re=mysqli_query($db_con,$sql);
if($re)
{
  echo "<script> alert('Your Data is Sucessfully Saved, Your expiry date $expiry'); window.location.href='map_plasma.html';</script>";
}

$b = "SELECT * FROM plasma_donation";
$a2 = mysqli_query($db_con,$b);
while($r1 = mysqli_fetch_array($a2)){
   $l=$r1['expiry_date'];

   if(($l)<=($today)){
    //  echo $l;
      $q="DELETE FROM plasma_donation WHERE expiry_date = '$l'";

 $re1=mysqli_query($db_con,$q);
}

      
   }
   
     $q = "SELECT * FROM plasma_map";
$a2 = mysqli_query($db_con,$q);
while($r1 = mysqli_fetch_array($a2)){
  $e=$r1['expiry_date'];

  if(($e)<=($today)){
    //  echo $l;
      $q1="DELETE FROM plasma_map WHERE expiry_date = '$e'";

 $re1=mysqli_query($db_con,$q1);
}

      
  } 

 ?>
