<?php
 $db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
     $check_id=0;
    $l=0;
    $querry = "SELECT * FROM `medical_donation`";
      $query_ex = mysqli_query($db_con, $querry);
    while($r = mysqli_fetch_array($query_ex))
    {
        $check_id = $r["donation_id"];
        if($l> $check_id )
    $check_id = $l;
     
   
    }


         $quer1 = "SELECT * FROM `other_map` where `map_id`='$check_id';"; 
      $quer_ex1 = mysqli_query($db_con, $quer1);
    while($r = mysqli_fetch_array($quer_ex1))
    {
            $qr1="DELETE FROM other_map WHERE `map_id`  = '$check_id'";

 $rr1=mysqli_query($db_con,$qr1);
     break;
   
    }
  $quer = "SELECT * FROM `medical_donation` where `donation_id`='$check_id';"; 
      $quer_ex2 = mysqli_query($db_con, $quer);
    while($r = mysqli_fetch_array($quer_ex2))
    {
            $qr="DELETE FROM medical_donation WHERE `donation_id`  = '$check_id'";

 $rr=mysqli_query($db_con,$qr);
     break;
   
    }
  
    if($rr1 && $rr)
    {
              echo "<script> alert('Your booking is sucessfully cancelled');window.location.href='home_page.html';</script>";  
    }


      

?>