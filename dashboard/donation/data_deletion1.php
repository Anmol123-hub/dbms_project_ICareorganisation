<?php
session_start();
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
$ticket = $_POST["ticket1"];
$op = $_SESSION["email"];
$sql = mysqli_query($q,"SELECT * FROM `other_donation` WHERE email = '$op'");
while($r = mysqli_fetch_array($sql)){
    if($ticket == $r["ticket"]){
        $sql1= mysqli_query($q,"DELETE FROM `other_donation` WHERE `email` = '$op' AND `ticket` = '$ticket'");
        $sql2= mysqli_query($q,"DELETE FROM `map_table` WHERE `ticket` = '$ticket'");
    }
}
if($sql1 && $sql2){
    echo "<script>alert('Your booking is successfully canceled :)'); window.history.go(-1); </script>";
}
else{
    echo "<script>alert('Your ticket number not matched'); window.history.go(-1); </script>";
}
?>