<?php

    session_start();

    // if(isset($_GET["arr"]["co"]))
    //    print_r($_GET);

    $co = $_GET["arr"]["co"];
    $no = $_GET["arr"]["no"];
    $no2 = $_GET["arr"]["no2"];
    $o3 = $_GET["arr"]["o3"];
    $so2 = $_GET["arr"]["so2"];
    $pm2_5 = $_GET["arr"]["pm2_5"];
    $pm10 = $_GET["arr"]["pm10"];
    $nh3 = $_GET["arr"]["nh3"];
    $loc = $_GET["arr"]["loc"];
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

    $sql = "INSERT INTO pollution_check (user_id,user_location) VALUES ('$id','$loc')";

    if ($conn->query($sql) === TRUE) {
        //echo nl2br("Query 1 Done !\n");

        $sql1 = "INSERT INTO pollution_details VALUES ((SELECT p_id FROM pollution_check ORDER BY p_id DESC LIMIT 1), '$co', '$no', '$no2', '$o3', '$so2', '$pm2_5', '$pm10', '$nh3')";
        
        if ($conn->query($sql1) === TRUE) {
            echo "Search Successfull !";
        }
        else {
            echo "Error(Query2): " . $sql1 . "<br>" . $conn->error;
        }
    } 
    else {
        echo "Something Went Wrong. Please Login Again !";
    }

    $conn->close();

?>