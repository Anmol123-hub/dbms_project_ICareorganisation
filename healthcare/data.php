<?php
session_start();
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
// $expiry=$_POST['expiry'];
// $curr_date=$_POST['curr_date'];
// $expiry= date('Y-m-d', strtotime($curr_date. ' + 27 days'));
$today = date("Y-m-d");
$q="DELETE FROM blood_donation WHERE expiry_date <= '$today'";

$re=mysqli_query($db_con,$sql);
?>