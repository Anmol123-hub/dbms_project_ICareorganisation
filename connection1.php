<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$pas = md5($password);
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
if(!$q){
	echo "Not connected";
}

$qu = "SELECT * FROM `user_table`";
$re = mysqli_query($q,$qu);
$p=0;
while($row = mysqli_fetch_array($re)){
	if($row["email"] == $email && $row["password"] == $pas){
		$p=1;
		break;
	}
}
if($p==1){
    $_SESSION['email']= $email;
    $_SESSION['pass'] = $password;
	echo "<script>alert('Successfully Loged In :)');window.location.href='home.html';</script>"; 
}
else if($p==0){
      echo "<script>alert('User Credentials Not Match Please Register Or Reset Your Password :)'); window.history.go(-1);</script>";   
}

?>