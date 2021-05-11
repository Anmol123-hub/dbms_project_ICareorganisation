<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$pas = md5($password);
$phone = $_POST['phone'];
$ph = md5($phone);
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}
$qu = "SELECT * FROM `user_table`";
$re = mysqli_query($q,$qu);
$p=0;
while($row = mysqli_fetch_array($re)){
	if($row["email"] == $email){
		$p=1;
		break;
	}
}
if($p==0){
	if($password == $password1){
$sql = "INSERT INTO `user_table`(`username`, `email`, `password`,`phone`) VALUES ('$username','$email','$pas','$ph');";
if(mysqli_query($q,$sql)){
    echo '<script>alert("Succcessfully Register :)");window.location.href="index.html";</script>';
}
}
else{
	echo '<script>alert("Please Enter The Matching Password");window.history.go(-1);</script>';
}
}
else if($p==1){
      echo "<script>alert('You Are Already Register :)');window.location.href='index.html';</script>";   
}
?>