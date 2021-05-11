<?php

session_start();
 $rate=$_POST['rate'];
       if($p=="null" || $p=="no rating")
      $rate="no rating";
   
$count=$_POST['count']; 
       if($count=="null" || $count=="none")
      $count="no country";
  
 $c=$_POST['city']; 
       if($c=="null" || $c=="none")
      $c="no city";

$b=$_POST['bld_bank']; 
       if($b=="null" || $b=="none")
      $b="no name";
   
 $ad=$_POST['address'];
       if($ad=="null" || $a=="none")
      $ad="no address";
       
      $p=$_POST['phno'];
       if($p=="null" || $p=="no phone nunber")
      $p="no phone number";
     
       $w=$_POST['website']; 
      if($w=="null" || $w=="none")
      $w="no website";
 $today = date("Y-m-d");      
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$email = $_SESSION["email"];
$id = 0;
$a = "SELECT * FROM `user_table` WHERE `email` = '$email'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}
    $check_id=0;
    $l=0;
    $querry = "SELECT * FROM `blood_donation`";
      $query_ex = mysqli_query($db_con, $querry);
    while($r = mysqli_fetch_array($query_ex))
    {
        $check_id = $r["blood_id"];
        if($l> $check_id )
    $check_id = $l;
     
   
    }
     $querry2 = "SELECT * FROM `blood_donation` where `blood_id`='$check_id';"; 
       $query_ex2 = mysqli_query($db_con, $querry2);
    while($r = mysqli_fetch_array($query_ex2))
    {
        $name=$r["name"];
        $email1=$r["email"];
        $user_number=$r["phone"];
        $don_date = $r["donation_date"];
        $age=$r["age"];
        $expiry=$r["expiry_date"];
     break;
   
    }
 
   $c1=0;
    $querry1 = "SELECT * FROM `blood_map`";
      $query_ex1 = mysqli_query($db_con, $querry1);
    while($r = mysqli_fetch_array($query_ex1))
    {
        $map_id = $r["map_id"];
     if($map_id==$check_id)
     {
        
         
         $sql1="UPDATE `blood_map` SET `name`='$name',`age`='$age' ,`email`='$email1',`user_number`='$user_number',`donation_date`='$don_date',`expiry_date`='$expiry',`country`='$count',`city`='$c',`blood_bank`='$b',`address`='$ad',`phone_number`='$p',`rating`='$rate',`website`='$w',`user_id`='$id',`map_id`='$check_id' WHERE `map_id` = '$check_id';";
     $re1=mysqli_query($db_con,$sql1);
     $c1=1;
     }
     if($re1)
     {
       echo "<script> alert('Your Data is Sucessfully Updated');</script>";  
     }
    }
    
    if($c1!=1)
    {
        
$sql="INSERT INTO `blood_map`(`name`,`age`,`email`,`user_number`,`donation_date`,`expiry_date`,`country`, `city`, `blood_bank`, `address`, `phone_number`,`rating`, `website`, `user_id`,`map_id`) VALUES ('$name','$age','$email1','$user_number','$don_date','$expiry','$count','$c','$b','$ad','$p','$rate','$w','$id','$check_id');";
$re=mysqli_query($db_con,$sql);
if($re)
{
   echo "<script> alert('Your Data is Sucessfully Saved');</script>";
}
}



//EXPIRY DELETE
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
  
  $q2 = "SELECT * FROM blood_donation";
$a3 = mysqli_query($db_con,$q2);
while($r1 = mysqli_fetch_array($a3)){
  $ex=$r1['expiry_date'];

  if(($ex)<=($today)){
    //  echo $l;
      $q3="DELETE FROM blood_donation WHERE expiry_date = '$ex'";

 $re2=mysqli_query($db_con,$q3);
}

      
  }
    

?>

<!DOCTYPE html>
<html>
  <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>Find Our Centers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
      <link rel="stylesheet" href="map.css">
      <script src="map.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--<script src="jquery-3.5.1.min.js"></script>-->
   <style>
/*  
  Side Navigation Menu V2, RWD
  ===================
  Author: https://github.com/pablorgarcia
 */

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 500px;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:1em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: black;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
    font-weight: bold;
    font-size: 3em;
  text-align: left;
  color: #185875;
}

.container td {
    font-weight: normal;
    font-size: 2em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
     -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
    padding-bottom: 2%;
    padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
    background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
    background-color: #2C3446;
}

.container th {
    background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
     -moz-box-shadow: 0 6px 6px -6px #0E1119;
          box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}

.button {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  /*margin: 20px 700px;*/
  text-align: center; 
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid red;
}

.button1:hover {
  background-color: yellow;
  color: red;
}
.aligned {
          display: flex;
          align-items: center;
      }

      span {
          padding: 10px;
      }




body, html {
    height: 100%;
    width:100%;
    text-align: center;
 
  margin:0;
  padding:0;
  position:relative;
    font-family: 'Open Sans', sans-serif;
  font-weight: 500px;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}
/*h1 {*/
/*  color:#4a4a4a;*/
/*  text-align:center;*/
/*}*/
/*img {*/
/*  margin: 0 auto;*/
/*  display:block;*/
/*}*/
/*PRELOADING------------ */
#overlayer {
  width:100%;
  height:1000%;  
  position:absolute;
  z-index:1;
  background:#f01f73;
  color:white;
}
.loader {
  display: inline-block;
  width: 100px;
  height: 100px;
  margin-left:-57px;
  position: absolute;
  z-index:3;
  border: 4px solid #Fff;
  top: 50%;
  animation: loader 2s infinite ease;
}

.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  
  25% {
    transform: rotate(180deg);
  }
  
  50% {
    transform: rotate(180deg);
  }
  
  75% {
    transform: rotate(360deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  0% {
    height: 0%;
  }
  
  25% {
    height: 0%;
  }
  
  50% {
    height: 100%;
  }
  
  75% {
    height: 100%;
  }
  
  100% {
    height: 0%;
  }
}
  </style>
  <script>
     $(window).load(function() {
	$(".loader").delay(5000).fadeOut("slow");
  $("#overlayer").delay(5000).fadeOut("slow");
}) 
  </script>
  </head>

 



  <body>
      
<div id="overlayer" style="font-size:40px;"><h1 style="color:white;"><b>Your booking is in progress.....</b></h1></div>      
<span class="loader">
  <span class="loader-inner"></span>
 
</span>


      <div class="aligned">
          <img src=
  "DBMS_logo_final.png"
              width="100" height="100" alt="">

          <span><h1 style="font-size:4em ;"><u><b>ICARE ORGANISATION DONATION BANK DATA</b></u></h1> </span>
      </div>
   
<br>
<br>
<br>
<br>
<table class="container">
  <thead>
    <tr>
      <th><h1>Title</h1></th>
      <th><h1>Donation Bank Information</h1></th>
     
    </tr>
  </thead>
  <tbody>
      <tr>
      <td><b>Name:</b></td>
      <td><b><?php 
      echo $name;?></b></td>
   </tr>
      <tr>
      <td><b>Age:</b></td>
      <td><b><?php 
      echo $age;?></b></td>
   </tr>
     <tr>
      <td><b>Email:</b></td>
      <td><b><?php 
      echo $email1;?></b></td>
   </tr>
     <tr>
      <td><b><?php 
      echo $name,"'s ";?>phone Number:</b></td>
      <td><b><?php 
      echo $user_number;?></b></td>
   </tr>
       <tr>
      <td><b>Donation Date:</b></td>
      <td><b><?php 
      echo $don_date;?></b></td>
   </tr>
       <tr>
      <td><b>Expiry Date:</b></td>
      <td><b><?php 
      echo $expiry;?></b></td>
   </tr>
       <tr>
      <td><b>Country Name:</b></td>
      <td><b><?php $count=$_POST['count']; 
       if($count=="null" || $count=="none")
      $count="no country";
      echo $count;?></b></td>
   
    </tr>
      <tr>
      <td><b>City Name:</b></td>
      <td><b><?php $c=$_POST['city']; 
       if($c=="null" || $c=="none")
      $c="no city";
      echo $c;?></b></td>
   
    </tr>
    <tr>
      <td><b>Donation Bank Name:</b></td>
      <td><b><?php $b=$_POST['bld_bank']; 
       if($b=="null" || $b=="none")
      $b="no name";
      echo $b;?></b></td>
   
    </tr>
    <tr>
       <td><b>Address:</b></td>
      <td><b><?php $a=$_POST['address'];
       if($a=="null" || $a=="none")
      $a="no address";
      echo $a;?></b></td>
    
    </tr>
    <tr>
      <td><b>Phone Number:</b></td>
      <td><b><?php $p=$_POST['phno'];
       if($p=="null" || $p=="no phone nunber")
      $p="no phone number";
      echo $p;?></b></td>
    
    </tr>
    <tr>
      <td><b>Rating:</b></td>
      <td><b><?php $rate=$_POST['rate'];
       if($p=="null" || $p=="no rating")
      $rate="no rating";
      echo $rate;?></b></td>
    
    </tr>
    <tr>
      <td><b>Website:</b></td>
      <td><b><?php 
      $w=$_POST['website']; 
      if($w=="null" || $w=="none")
      $w="no website";
      echo $w;?></b></td>
    
      
    </tr>
   
  </tbody>
</table>
<div align="center" style="margin-top:30px">
<button class="button button1" onclick="window.print()" >Download</button>
<a href="home_page.html"><button class="button button1"  >Continue To Home Page</button></a>
<button class="button button1" onclick="window.history.go(-1)" >Update Donation Center Details</button>
<form method="post" action="cancel_blood.php" style="margin-top:10px">
<input class="button button1" type="submit" value="cancel">
</form>
</div>



  </body>
</html>

