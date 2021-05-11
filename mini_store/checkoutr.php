<?php
session_start();
$email = $_SESSION["email"];
$cart = json_decode($_POST['cart'], true);
$id = 0;
// print_r($cart);

$host = "localhost"; /* Host name */
$user = "stteresa_icare"; /* User */
$password = "Aardproject@123"; /* Password */
$dbname = "stteresa_icareorganisation"; /* Database name */
// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "mini_store_db"; /* Database name */

$adr = $_POST['adr'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$predeemed = $_POST['predeemed'];

if (json_last_error() == JSON_ERROR_NONE) {
    $con = mysqli_connect($host, $user, $password, $dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Success!";
    $q  = "SELECT * FROM `user_table` WHERE  `email`='$email'";
    $ex  = mysqli_query($con, $q);
    while ($row = mysqli_fetch_array($ex)) {
        $id = $row["user_id"];
        break;
    }
    $sql1 = "INSERT INTO orders(user_id) VALUES('$id')";
    // $sql1 = "INSERT INTO orders(user_id) VALUES('3')";
    mysqli_query($con, $sql1);
    $last_id = mysqli_insert_id($con);
    foreach ($cart as $mycart => $cartItem) {
        $p_name = $cartItem['productTitle'];
        $p_qty = $cartItem['quantity'];
        $p_price = $cartItem['price'] * $p_qty;

        $sql2 = "INSERT INTO orders_details(o_id,p_name,o_qty,o_price) VALUES('" . $last_id . "','" . $p_name . "','" . $p_qty . "', '" . $p_price . "')";
        mysqli_query($con, $sql2);

        $sql3 = "UPDATE products set p_qty = p_qty - $p_qty where p_name = '$p_name'";
        mysqli_query($con, $sql3);
    }
    $sql4 = "INSERT INTO del_address(o_id,dest_str,dest_city,dest_state,dest_zip) VALUES('" . $last_id . "','" . $adr . "','" . $city . "', '" . $state . "','" . $zip . "')";
    mysqli_query($con, $sql4);
    $sql5 = "UPDATE rewards_table SET rewards_point= rewards_point - $predeemed WHERE user_id= '$id'";
    mysqli_query($con, $sql5);
    $sql6 = "UPDATE orders SET discount= $predeemed WHERE o_id= '$last_id'";
    mysqli_query($con, $sql6);
} else {
    echo json_last_error_msg();
}
