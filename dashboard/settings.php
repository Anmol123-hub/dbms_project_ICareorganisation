<?php

session_start();
$email = $_SESSION["email"];

$conn = mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 

if(!$conn){
	echo "Something Went Wrong! Please Check Your Internet Connection and Try Again :)";
}

$sqlemail = "SELECT * FROM user_table WHERE email = '$email';";
$re = mysqli_query($conn,$sqlemail);
while($r = mysqli_fetch_array($re)){
    $id = $r["user_id"];
    break;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings (User Dashboard)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="accountStyle.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
        body {
            background: #313348;  /* fallback for old browsers */
        }
        .wrap {
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        
        .button {
          min-width: 300px;
          min-height: 60px;
          font-family: 'Nunito', sans-serif;
          font-size: 22px;
          text-transform: uppercase;
          letter-spacing: 1.3px;
          font-weight: 700;
          color: #313133;
          background: #4FD1C5;
        background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
          border: none;
          border-radius: 1000px;
          box-shadow: 12px 12px 24px rgba(79,209,197,.64);
          transition: all 0.3s ease-in-out 0s;
          cursor: pointer;
          outline: none;
          position: relative;
          padding: 10px;
          zoom:0.8;
          }
        
        button::before {
        content: '';
          border-radius: 1000px;
          min-width: calc(300px + 12px);
          min-height: calc(60px + 12px);
          border: 6px solid #00FFCB;
          box-shadow: 0 0 60px rgba(0,255,203,.64);
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          opacity: 0;
          transition: all .3s ease-in-out 0s;
        }
        
        .button:hover, .button:focus {
          color: #313133;
          transform: translateY(-6px);
        }
        
        button:hover::before, button:focus::before {
          opacity: 1;
        }
        
        button::after {
          content: '';
          width: 30px; height: 30px;
          border-radius: 100%;
          border: 6px solid #00FFCB;
          position: absolute;
          z-index: -1;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          animation: ring 1.5s infinite;
        }
        
        button:hover::after, button:focus::after {
          animation: none;
          display: none;
        }
        
        @keyframes ring {
          0% {
            width: 30px;
            height: 30px;
            opacity: 1;
          }
          100% {
            width: 300px;
            height: 300px;
            opacity: 0;
          }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-12">
                <h3 style="font-family: Arial Rounded Mt; text-align:center; padding: 10px; padding-bottom:11px!important; background: linear-gradient(to right, #5c258d, #4389a2); color: aliceblue; border-radius: 5px;">Customize Your Account <i class="fa fa-cogs" aria-hidden="true"></i></h3>
            </div>
        </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-4 col-xs-12 col-4 wrap">
                      <button class="button" onclick="showLogin()">Profile Picture</button>
                    </div>
                    <div class="col-sm-4 col-xs-12 col-4 wrap">
                      <button class="button" onclick="showForgotPassword()">Change Password</button>
                    </div>
                    <div class="col-sm-4 col-xs-12 col-4 wrap">
                      <button class="button" onclick="showSubscribe()">Change Phone No</button>
                    </div>
                </div>
                
                <div class="wrapper" style="zoom:1.4;">
                  <div class="rec-prism">
                    <div class="face face-top">
                      <div class="content">
                        <h2>Change Phone No</h2>
                        <small>Enter your new phone number to update.</small>
                        <form method="post" enctype="multipart/form-data">
                          <div class="field-wrapper">
                            <input type="text" id="phoneId" name="phone" placeholder="Phone Number">
                            <label>Phone Number</label>
                          </div>
                          <div class="field-wrapper">
                            <input type="submit" name="phoneBtn">
                          </div>
                        </form>
                      </div>
                    </div>
                
                    <div class="face face-front">
                      <div class="content">
                        <h2>Upload Profile Picture</h2>
                        <small>Choose your new profile pic to upload.</small>
                        <form method="post" enctype="multipart/form-data">
                          <div class="field-wrapper">
                            <input type="file" name="image" id="image">
                          </div>
                          <div class="field-wrapper">
                            <img id="blah" src="../images/profile_pic.jpg" style="width:120px; height:100px;" alt="Profile Pic"/>
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        
                                        reader.onload = function (e) {
                                            $('#blah').attr('src', e.target.result);
                                        }
                                        
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                
                                $("#image").change(function(){
                                    readURL(this);
                                });
                            </script>
                          </div>
                          <div class="field-wrapper">
                            <input type="submit" name="upload" value="Upload">
                          </div>
                        </form>
                      </div>
                    </div>
                
                    <div class="face face-back">
                      <div class="content">
                        <h2>Change Your Password</h2>
                        <small>Enter your new password to update.</small>
                        <form method="post" enctype="multipart/form-data">
                          <div class="field-wrapper">
                            <input type="password" id="pass" name="pass" placeholder="Type your password">
                            <label>Type Password</label>
                          </div>
                          <div class="field-wrapper">
                            <input type="password" id="pass1" name="pass1" placeholder="Retype your password">
                            <label>Retype Password</label>
                          </div>
                          <div class="field-wrapper">
                            <input type="submit" value="Change" name="passBtn">
                          </div>
                        </form>
                      </div>
                    </div>
                
                    <div class="face face-right">
                      <div class="content">
                        <!-- icare logo -->
                        <div class="field-wrapper">
                            <img src="../DBMS_logo_final.png" style="width:100%; height:100%;">
                        </div>
                      </div>
                    </div>
                
                    <div class="face face-left">
                      <div class="content">
                        <!-- icare logo -->
                        <div class="field-wrapper">
                            <img src="../DBMS_logo_final.png" style="width:100%; height:100%;">
                        </div>
                      </div>
                    </div>
                
                    <div class="face face-bottom">
                      <div class="content">
                        <div class="thank-you-msg">
                          Thank you!
                        </div>
                      </div>
                    </div>
                
                  </div>
                </div>
              <script src="accountScript.js"></script>
        
        <?php 
        
        if(isset($_POST["passBtn"])){
            
            $ph = $_POST["pass"];
            $ph1 = $_POST["pass1"];
            
            if($ph=="" || $ph1=="")
            {
                echo "<script> alert('Please Enter a Password !'); </script>"; 
            }
            
            else if($ph==$ph1)
            {
                
                $password = md5($ph);
                
            	// Insert data into database 
            	$insert = $conn -> query("UPDATE user_table set password = '$password' where user_id = '$id'");
            	if($insert) { 
            		echo "<script>prism.style.transform = 'translateZ(-100px) rotateX( 90deg)';</script>";
            	} else {
            		echo "<script> alert('Something went wrong !.'); </script>"; 
            	}
            }
            else if($ph !== $ph1) {
                	echo "<script> alert('Please! Enter the Same Password.'); </script>"; 
            }
		}
        
        if(isset($_POST["phoneBtn"])){
            
            $ph = $_POST["phone"];
            
            if($ph == "") {
                	echo "<script> alert('Please Enter a Valid Phone Number !'); </script>";
            }
            else {
                
                if(preg_match('/^[0-9]{10}+$/', $ph)) {
                
                    $phoneNo = md5($ph); 
                    
        			// Insert data into database 
        			$insert = $conn -> query("UPDATE user_table set phone = '$phoneNo' where user_id = '$id'");
        			if($insert) { 
        				echo "<script>prism.style.transform = 'translateZ(-100px) rotateX( 90deg)';</script>";
        			} else {
            			echo "<script> alert('Something went wrong !.'); </script>"; 
        			}
                }
                else {
                    echo "<script> alert('Please Enter a Valid 10 digit Phone Number !'); </script>";
                }
            }
		}
        
        if(isset($_POST["upload"])){
            if(!empty($_FILES["image"]["name"])) {

				// Get file info 
				$fileName = basename($_FILES["image"]["name"]); 
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
 
				// Allow certain file formats 
				$allowTypes = array('jpg','png','jpeg','jfif','gif'); 
				if(in_array($fileType, $allowTypes)) { 
        			$image = $_FILES['image']['tmp_name']; 

    				$imgContent = addslashes(file_get_contents($image));

    				// Insert data into database 
    				$insert = $conn -> query("UPDATE user_table set profile_pic = '$imgContent' where user_id = '$id'");
    				if($insert) { 
        				echo "<script>prism.style.transform = 'translateZ(-100px) rotateX( 90deg)'; setTimeout(function(){ parent.location.reload(); }, 3000); </script>";
    				} else {
            			echo "<script> alert('Something went wrong !.'); </script>"; 
    				}  
				} else { 
        			echo "<script> alert('Sorry, only JPG, JPEG, PNG, JFIF, GIF files are allowed to upload.'); </script>";; 
				}
			} else {
				echo "<script> alert('Please select an image file to upload.'); </script>";
			}
        }
        
        ?>
    </div>
</body>
</html>