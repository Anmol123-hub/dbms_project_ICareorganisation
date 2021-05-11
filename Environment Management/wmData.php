<?php

    session_start();

    $id=0;
    $usr = "";
    
    $servername = "localhost";
    $username = "stteresa_icare";
    $password = "Aardproject@123";
    $dbname = "stteresa_icareorganisation";
    $email = $_SESSION["email"];

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
        $usr = $r["username"];
        break;
    }
    
    $result = mysqli_query($conn,"SELECT MAX(w_id) as max FROM waste_mgmt");
    $row1 = mysqli_fetch_array($result);
    $maxVal = $row1['max'];
    
    if($id == 0) {
        
        $deleteRow = "DELETE FROM waste_mgmt where w_id = '$maxVal'";
        $deleteRow1 = "DELETE FROM waste_details where w_id = '$maxVal'";
        $conn->query($deleteRow);
        $conn->query($deleteRow1);
            
        $cookie_name = "id";
        $cookie_value = 0;
              
        // Set cookie
        setcookie($cookie_name, $cookie_value);
        
        echo "Something Went Wrong. Please Login Again !";
        
    }
    
    else {
    
        // checking whether file exists or not
        $file_pointer = 'XML Data/' . $id . '. ' . $usr . '.xml';
        date_default_timezone_set("Asia/Kolkata");
        
        if (file_exists($file_pointer)) 
        {
            $xml_file_name = $id . '. ' . $usr . '.xml';
            // echo nl2br("\n$xml_file_name already Exists \n");
            
            $xdoc = new DomDocument('1.0');
            $xdoc->preserveWhiteSpace = false;
            $xdoc->encoding = 'utf-8';
    	    $xdoc->formatOutput = true;
            $xdoc->Load($file_pointer);
            
            //get the root node of the document which is the bookstore tag.
            $wastemanagement = $xdoc->documentElement;
            
            //create a book node for the new book and append it
            $list=$xdoc->createElement('scrapdealer');
            $scrap_dealers=$wastemanagement->appendChild($list);
            
            $date = $xdoc->createElement('date');
            $dateNode=$scrap_dealers->appendChild($date);
            $datetextnode=$xdoc->createTextNode(date('d F Y, h:i:s A'));
            $dateNode->appendChild($datetextnode);
            
            $name = $xdoc->createElement('name');
            $nameNode=$scrap_dealers->appendChild($name);
            $nametextnode=$xdoc->createTextNode($_POST['dName']);
            $nameNode->appendChild($nametextnode);
            
            $telephone = $xdoc->createElement('telephone');
            $telephoneNode=$scrap_dealers->appendChild($telephone);
            $telephonetextnode=$xdoc->createTextNode($_POST['dTelephone']);
            $telephoneNode->appendChild($telephonetextnode);
            
            $website = $xdoc->createElement('website');
            $websiteNode=$scrap_dealers->appendChild($website);
            $websitetextnode=$xdoc->createTextNode($_POST['dWebsite']);
            $websiteNode->appendChild($websitetextnode);
            
            $rating = $xdoc->createElement('rating');
            $ratingNode=$scrap_dealers->appendChild($rating);
            $ratingtextnode=$xdoc->createTextNode($_POST['dRating']);
            $ratingNode->appendChild($ratingtextnode);
            
            $address = $xdoc->createElement('address');
            $addressNode=$scrap_dealers->appendChild($address);
            $addresstextnode=$xdoc->createTextNode($_POST['dAddress']);
            $addressNode->appendChild($addresstextnode);
    	    
    	    $savedcorrectly= $xdoc->save($file_pointer);
    	    
    	    echo "Submited Successfully !";
        }
        
        else 
        {
            $dom = new DOMDocument();
    	    $dom->encoding = 'utf-8';
    	    $dom->xmlVersion = '1.0';
    	    $dom->formatOutput = true;
            $xml_file_name = $id . '. ' . $usr . '.xml';
            
            $root = $dom->createElement('wastemanagement');
    
    		    $scrap_dealers = $dom->createElement('scrapdealer');
    	  
    	            $date = $dom->createElement('date',date('d F Y, h:i:s A'));
    	            $name = $dom->createElement('name',$_POST['dName']);
    	            $telephone = $dom->createElement('telephone',$_POST['dTelephone']);
    	            $rating = $dom->createElement('rating',$_POST['dRating']);
    	            $website = $dom->createElement('website',$_POST['dWebsite']);
    	            $address = $dom->createElement('address',$_POST['dAddress']);
    	            
    	            $scrap_dealers->appendChild($date);
    	            $scrap_dealers->appendChild($name);
    	            $scrap_dealers->appendChild($telephone);
    	            $scrap_dealers->appendChild($website);
    	            $scrap_dealers->appendChild($rating);
    	            $scrap_dealers->appendChild($address);
    	        
    	        $root->appendChild($scrap_dealers);
            
            $dom->appendChild($root);
            $dom->save($file_pointer);
            
            echo "Submited Successfully !";
           // echo "$xml_file_name has been successfully created";
        }
    
    }

?>