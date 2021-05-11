<?php

    $co = $_GET["arr"]["co"];
    $no = $_GET["arr"]["no"];
    $no2 = $_GET["arr"]["no2"];
    $o3 = $_GET["arr"]["o3"];
    $so2 = $_GET["arr"]["so2"];
    $pm2_5 = $_GET["arr"]["pm2_5"];
    $pm10 = $_GET["arr"]["pm10"];
    $nh3 = $_GET["arr"]["nh3"];
    $loc = $_GET["arr"]["loc"];
    $email = $_GET["arr"]["email"];

    $to = $email;
    $subject = 'Air Pollution Details';
    $from = 'icareorganisation1@gmail.com';
    
    // Content-type header
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Email header
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    // Compose HTML email message
    $message = "<html><body style='padding: 10px;'>";
    $message .= "<h3>Location Searched: <span style='color:orangered'>" . $loc . "</span></h3>";
    $message .= "<table id='customers' style='font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 400px; border: 2px solid black'><caption><h3>Air Pollution Details</h3></caption><tr style='background-color: orangered;'><th style='border: 2px solid black; padding: 10px; text-align: left; color: white;'>Component</th><th style='border: 2px solid black; padding: 10px; text-align: left; color: white;'>AQI</th>";
    $message .= "</tr><tr style='background-color: #f2f2f2;'><td style='border: 1px solid #ddd; padding: 8px;'>Carbon Monoxide</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $co . "</td>";
    $message .= "</tr><tr><td style='border: 1px solid #ddd; padding: 8px;'>Nitrogen Monoxide</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $no . "</td>";
    $message .= "</tr><tr style='background-color: #f2f2f2;'><td style='border: 1px solid #ddd; padding: 8px;'>Nitrogen Dioxide</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $no2 . "</td>";
    $message .= "</tr><tr><td style='border: 1px solid #ddd; padding: 8px;'>Ozone</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $o3 . "</td>";
    $message .= "</tr><tr style='background-color: #f2f2f2;'><td style='border: 1px solid #ddd; padding: 8px;'>Sulphur Dioxide</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $so2 . "</td>";
    $message .= "</tr><tr><td style='border: 1px solid #ddd; padding: 8px;'>Fine Particles Matter</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $pm2_5 . "</td>";
    $message .= "</tr><tr style='background-color: #f2f2f2;'><td style='border: 1px solid #ddd; padding: 8px;'>Coarse Particulate Matter</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>$pm10</td>";
    $message .= "</tr><tr><td style='border: 1px solid #ddd; padding: 8px;'>Ammonia</td>";
    $message .= "<td style='border-left: 2px solid black!important; border: 1px solid #ddd; padding: 8px;'>" . $nh3 . "</td>";
    $message .= "</tr></table></body></html>";

    // Sending email
    if(mail($to, $subject, $message, $headers)){
        echo "All the details has been sent to your mail!";
    } else{
        echo "Something went wrong. Please try again !";
    }

?>