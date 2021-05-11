<?php
$card = $_REQUEST['card'];
$holder = $_REQUEST['holder'];
$email = $_REQUEST['email'];
if(empty($card) || empty($holder)){
	echo "<script type ='text/javascript'>alert('Please Fill All The Details'); </script>";
}
else{
	mail($email,"Payment" ,"Payment Successful :) \nThank you for being a part of Our Organisation  \n Your Name-$holder \n Your Card No.- $card \n Please Login For More Information :)","From: icareorganisation1@gmail.com");
		echo "<script> window.location.href='loading.html' </script>";
}
?>