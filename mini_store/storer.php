<?php
session_start();
$email = $_SESSION["email"];
$id = 0;
// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "mini_store_db"; /* Database name */

$host = "localhost"; /* Host name */
$user = "stteresa_icare"; /* User */
$password = "Aardproject@123"; /* Password */
$dbname = "stteresa_icareorganisation"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);

  $q  = "SELECT * FROM `user_table` WHERE  `email`='$email'";
    $ex  = mysqli_query($con, $q);
    while ($row = mysqli_fetch_array($ex)) {
        $id = $row["user_id"];
        break;
    }
    
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT rewards_point from rewards_table where user_id= '$id'";
$returnResult = mysqli_query($con, $sql);
$result = $returnResult->fetch_array()[0] ?? '';
echo $result;

?>