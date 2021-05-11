<?php
session_start();
if(($_SESSION['email']=="akshit.kakani@science.christuniversity.in" && $_SESSION['pass']=="Akshit@123")||($_SESSION['email']=="anmolvarshney98@gmail.com" && $_SESSION['pass']=="Anmol@12")||($_SESSION['email']=="deepak.c767@gmail.com" && $_SESSION['pass']=="Deepak@123")||($_SESSION['email']=="ritwika362000@gmail.com" && $_SESSION['pass']=="Ritwika@123")){
    header("Location: dashboard/adminDashboard.php");
}
else{
     header("Location: dashboard/userDashboard.php");
}
?>
