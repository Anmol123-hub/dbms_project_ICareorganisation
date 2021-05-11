<?php
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$age=$_POST['age'];

$select=$_POST['med_select'];
$qty=$_POST['quantity'];
$other1=$_POST['other1'];

$brand1=$_POST['brand1'];
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$email1 = $_SESSION["email"];
$id = 0;
if($select=="other1")
{
    $select=$other1;
}
else if($select=="brand")
{
    $select=$brand1;
}
$a = "SELECT * FROM `user_table` WHERE `email` = '$email1'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}
$d1=strtolower($select);
$a2 = "SELECT * FROM `medical_donation` WHERE `email` = '$email';";
$a3 = mysqli_query($db_con,$a2);
$f=0;
while($r = mysqli_fetch_array($a3)){
    $d_type = $r["donation_type"];
    $qt = $r["quantity"];


$d=strtolower($d_type);


   
if($d == $d1 ){
     
    $qt = $qt + $qty;
    $a4 = "UPDATE `medical_donation` SET `quantity`= '$qt' where `email` = '$email' and `donation_type`='$d_type' ;";
    $a5 = mysqli_query($db_con,$a4);
    $f=1;
    echo "<script> alert('Your Data is Sucessfully Updated'); window.location.href='map_other.html';</script>";
    
}
}


if($f==0){
$sql="INSERT INTO `medical_donation`(`name`, `email`, `phone`, `age`, `donation_type`, `quantity`, `user_id`) VALUES ('$name','$email','$phno','$age','$select','$qty','$id');";
$re=mysqli_query($db_con,$sql);
if($re)
{
  echo "<script> alert('Your Data is Sucessfully Saved'); window.location.href='map_other.html';</script>";
}
}
?>