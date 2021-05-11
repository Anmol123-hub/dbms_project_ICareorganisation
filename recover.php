<?php
session_start();
$email = $_POST['email'];
$p=0;
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
 $query = "SELECT * FROM `user_table`";
 $re = mysqli_query($q,$query);
 while($row = mysqli_fetch_array($re)){
	if($row["email"] == $email){
		$p=1;
		break;
	}
 }
if($p==1){
  $_SESSION["e"] = $email;
 		mail($email, "Password reset link", "Click 'https://stteresakolkata.in/reset.php'  To Reset Your Password","From: icareorganisation1@gmail.com");
	echo '<script>alert("Reset Link is send to your mail :)"); window.location.href="index.html"</script>';
}
else if($p==0){
	 		echo '<script>alert("Your Email Not Matched Please Register With Us :)"); window.location.href="index.html";</script>';
}
?>