<?php
cancel();
function cancel()
{
 $db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
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


         $quer1 = "SELECT * FROM `blood_map` where `map_id`='$check_id';"; 
      $quer_ex1 = mysqli_query($db_con, $quer1);
    while($r = mysqli_fetch_array($quer_ex1))
    {
            $qr1="DELETE FROM blood_map WHERE `map_id`  = '$check_id'";

 $rr1=mysqli_query($db_con,$qr1);
     break;
   
    }
  $quer = "SELECT * FROM `blood_donation` where `blood_id`='$check_id';"; 
      $quer_ex2 = mysqli_query($db_con, $quer);
    while($r = mysqli_fetch_array($quer_ex2))
    {
            $qr="DELETE FROM blood_donation WHERE `blood_id`  = '$check_id'";

 $rr=mysqli_query($db_con,$qr);
     break;
   
    }
  
    if($rr1 && $rr)
    {
              echo "<script> alert('Your booking is sucessfully cancelled');window.location.href='home_page.html';</script>";  
    }


}    

?>