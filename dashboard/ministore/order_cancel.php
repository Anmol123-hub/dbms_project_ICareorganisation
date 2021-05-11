<?php

$q = mysqli_connect("localhost", "stteresa_icare", "Aardproject@123", "stteresa_icareorganisation");
session_start();
$email = $_SESSION["email"];
$id = 0;

$query  = "SELECT * FROM `user_table` WHERE  `email`='$email'";
    $ex  = mysqli_query($q, $query);
    while ($row = mysqli_fetch_array($ex)) {
        $id = $row["user_id"];
        break;
    }
// $q = mysqli_connect("localhost", "root", "", "mini_store_db");
$orderId = $_POST["ticket"];

$sql1 = "";
$sql2 = "";
$sql3 = "";

$sqlmain = mysqli_query($q, "SELECT * FROM `orders` WHERE o_id = '$orderId'");

$product_data_array = array();
$details_fetcher = mysqli_query($q, "SELECT p_name,o_qty FROM `orders_details` WHERE o_id = '$orderId'");
while ($row = mysqli_fetch_assoc($details_fetcher)) {
    $product_data_array[$row['p_name']] = $row['o_qty'];
}



$discount = mysqli_fetch_assoc(mysqli_query($q, "SELECT discount FROM `orders` WHERE o_id = '$orderId'"))['discount'];

while ($r = mysqli_fetch_array($sqlmain)) {
    if ($orderId == $r["o_id"]) {
        $sql1 = "Delete from orders_details where o_id= $orderId";
        mysqli_query($q, $sql1);

        $sql2 = "Delete from del_address where o_id= $orderId";
        mysqli_query($q, $sql2);

        $sql3 = "Delete from orders where o_id= $orderId";
        mysqli_query($q, $sql3);

        foreach ($product_data_array as $p_name => $o_qty) {
            $sql4 = "UPDATE products set p_qty = p_qty + $o_qty where p_name = '$p_name'";
            mysqli_query($q, $sql4);
        }

        $sql5 = "UPDATE rewards_table SET rewards_point= rewards_point + $discount WHERE user_id=$id";
        mysqli_query($q, $sql5);
    }
}

if ($sql1 != "") {
    echo "<script>alert('Your order is successfully cancelled and your reward points(if any) have been refunded :)'); window.history.go(-1); </script>";
} else {
    echo "<script>alert('Order Id doest not match!'); window.history.go(-1); </script>";
}
