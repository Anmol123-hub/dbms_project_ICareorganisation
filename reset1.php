<?php
session_start();
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$email = $_SESSION["e"];
$a = "SELECT * FROM `user_table` WHERE `email` = '$email';";
$r = mysqli_query($q,$a);
while($row = mysqli_fetch_array($r)){
    $id = $row["user_id"];
    break;
}

if($pass1 == $pass2){
    $p1 = md5($pass1);
    $a1 = "UPDATE `user_table` SET `password` = '$p1' WHERE `user_id` = '$id';";
    $r1 = mysqli_query($q,$a1);
    if($r1){
        echo '<script>alert("Your Password is Successfully Updated :)"); window.location.href="index.html"</script>';
    }
}
else{
    echo '<script>alert("Your Password Not Matched Pls Try Again :)"); window.history.go(-1);</script>';
}

?>