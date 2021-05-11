<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$message = $_REQUEST['message'];
if(empty($name) || empty($email) || empty($phone)){
	echo "<script type ='text/javascript'>alert('Please Fill All The Details'); </script>";
}
else{
	mail("icareorganisation1@gmail.com","Contact Message" , "$message","From: $name <$email> $phone");
echo "<script type ='text/javascript'>alert('Successfully mailed'); 
	window.history.go(-1);</script>";
}
?>