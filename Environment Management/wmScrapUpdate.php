<?php

    session_start();
    date_default_timezone_set("Asia/Kolkata");

    $itemQty = $_GET["itemQty"];
    $date = date('d F Y, h:i:s A');
    $automotive = $_GET["automotive"];
    $electronics = $_GET["electronics"];
    $glass = $_GET["glass"];
    $metal = $_GET["metal"];
    $paper = $_GET["paper"];
    $plastic = $_GET["plastic"];
    $hazardous = $_GET["hazardous"];
    $organicWaste = $_GET["organicWaste"];
    $email = $_SESSION["email"];
    $id=0;
    
    $servername = "localhost";
    $username = "stteresa_icare";
    $password = "Aardproject@123";
    $dbname = "stteresa_icareorganisation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sqlemail = "SELECT * FROM user_table WHERE email = '$email';";
    $re = mysqli_query($conn,$sqlemail);
    while($r = mysqli_fetch_array($re)){
        $id = $r["user_id"];
        break;
    }
    
    $result = mysqli_query($conn,"SELECT MAX(w_id) as max FROM waste_mgmt");
    $row1 = mysqli_fetch_array($result);
    $maxVal = $row1['max'];
    
    $sql = "UPDATE waste_mgmt set date_searched = '$date', item_qty = '$itemQty' WHERE w_id = '$maxVal'";
    
    if ($conn->query($sql) === TRUE) {

        $sql1 = "UPDATE waste_details set automotive = '$automotive', electronics = '$electronics', glass = '$glass', metal = '$metal', paper = '$paper', plastic = '$plastic', hazardous = '$hazardous', organic_waste = '$organicWaste' where w_id = '$maxVal'";
        
        if ($conn->query($sql1) === TRUE) {
            echo "Search Successfull !";
        }
        else {
            echo "Error(Query1): " . $sql1 . "<br>" . $conn->error;
        }
    } 
    else {
        echo "Error(Query2): " . $sql . "<br>" . $conn->error;
    }
    

    $conn->close();

?>