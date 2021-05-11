<?php
// $q = mysqli_connect("localhost", "root", "", "mini_store_db");
session_start();
$q = mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
$email = $_SESSION["email"];
$id = 0;

$query  = "SELECT * FROM `user_table` WHERE  `email`='$email'";
    $ex  = mysqli_query($q, $query);
    while ($row = mysqli_fetch_array($ex)) {
        $id = $row["user_id"];
        break;
    }

$currOid = $_POST['currOid'];

$query2 = mysqli_query($q, "SELECT p_name,o_qty,o_price FROM `orders_details` WHERE `o_id` = $currOid");
echo "<h1 align='center' >Your order details </h1>";
echo "<br>";
echo "<div class='table-wrapper' style='overflow-x:auto;'>
    <table align='center' class='fl-table'>
        <thead>
            <tr>
                <th>Product name </th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>";

while ($row2 = mysqli_fetch_array($query2)) {
    echo    "<tbody>";
    echo    "<tr>";
    echo "<td>" . $row2['p_name'] . "</td>";
    echo "<td>" . $row2['o_qty'] . "</td>";
    echo "<td>" . $row2['o_price'] . "</td>";
    echo    "</tr>";
    echo    "</tbody>";
}
echo "</table>
</div>";
