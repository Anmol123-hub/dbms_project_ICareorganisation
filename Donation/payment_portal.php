<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Payment</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=RocknRoll+One&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!--<link rel="stylesheet" href="portal.css">-->
     <style>
      
         .navbar-custom {
    background-color: #150080;
    border-color: #425766;
    background-image: linear-gradient(360deg,#2300e6 0%,#100357 100%);
    font-size: 20px;
}

.navbar-nav {
    padding-left: 20px;
    padding-right: 20px;
}

.navbar-nav .nav-item {
    padding-left: 5px;
    padding-right: 5px;
}

.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    border-bottom: 3px solid red;
    color: white;
}
#amount {
  font-size: 12px;
}

#amount strong {
  font-size: 14px;
}

#card-back {
  top: 45px;
  right: 0;
  z-index: -2;
}

#card-btn {
  background-color: rgba(251, 251, 251, 0.8);
  color: #ffb242;
  position: absolute;
  bottom: -75px;
  right: 0;
  width: 150px;
  border-radius: 8px;
  height: 42px;
  font-size: 12px;
  font-family: lato, 'helvetica-light', 'sans-serif';
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 400;
  outline: none;
  border: none;
  cursor: pointer;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(80,0,0); /* Fallback color */
  background-color: rgba(1,1,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
#card-btn1 {
  background-color: rgba(251, 251, 251, 0.8);
  color: #ffb242;
  position: absolute;
  bottom: -55px;
margin-left: 46%;
  width: 150px;
  border-radius: 8px;
  height: 42px;
  font-size: 12px;
  font-family: lato, 'helvetica-light', 'sans-serif';
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 400;
  outline: none;
  border: none;
  cursor: pointer;
}
#card-btn1:hover {
  background-color: rgba(251, 251, 251, 1);
}
#card-btn:hover {
  background-color: rgba(251, 251, 251, 1);
}

#card-cvc {
  width: 60px;
  margin-bottom: 0;
}

#card-front,
#card-back {
  position: absolute;
  background-color: #498ee4;
  width: 390px;
  height: 299px;
  border-radius: 6px;
  padding: 20px 30px 0;
  box-sizing: border-box;
  font-size: 10px;
  letter-spacing: 1px;
  font-weight: 300;
  color: white;
}

#card-image {
  float: right;
  height: 100%;
}

#card-image i {
  font-size: 40px;
}

#card-month {
  width: 45% !important;
}

#card-number,
#card-holder {
  width: 100%;
}

#card-stripe {
  width: 100%;
  height: 55px;
  background-color: #3d5266;
  position: absolute;
  right: 0;
}

#card-success {
  color: #00b349;
}

#card-token {
  display: none;
}

#card-year {
  width: 45%;
  float: right;
}

#cardholder-container {
  width: 60%;
  display: inline-block;
}

#cvc-container {
  position: absolute;
  width: 110px;
  right: -115px;
  bottom: -10px;
  padding-left: 20px;
  box-sizing: border-box;
}

#cvc-container label {
  width: 100%;
}

#cvc-container p {
  font-size: 6px;
  text-transform: uppercase;
  opacity: 0.6;
  letter-spacing: .5px;
}

#form-container {
  margin: auto;
  width: 500px;
  height: 290px;
  position: relative;
}

#form-errors {
  color: #eb0000;
}

#form-errors,
#card-success {
  background-color: white;
  width: 500px;
  margin: 0 auto 10px;
  height: 50px;
  border-radius: 8px;
  padding: 0 20px;
  font-weight: 400;
  box-sizing: border-box;
  line-height: 46px;
  letter-spacing: .5px;
  text-transform: none;
}

#form-errors p,
#card-success p {
  margin: 0 5px;
  display: inline-block;
}

#exp-container {
  margin-left: 10px;
  width: 32%;
  display: inline-block;
  float: right;
}

.hidden {
  display: none;
}

#image-container {
  width: 100%;
  position: relative;
  height: 55px;
  margin-bottom: 5px;
  line-height: 55px;
}

#image-container img {
  position: absolute;
  right: 0;
  top: 0;
}

input {
  border: none;
  outline: none;
  background-color: #5a9def;
  height: 30px;
  line-height: 30px;
  padding: 0 10px;
  margin: 0 0 25px;
  color: white;
  font-size: 10px;
  box-sizing: border-box;
  border-radius: 4px;
  font-family: lato, 'helvetica-light', 'sans-serif';
  letter-spacing: .7px;
}

input::-webkit-input-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif' letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}

input:-moz-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif' letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}
.m:hover{
    height: 160px;
    width: 160px;
}
input::-moz-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif' letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}

input:-ms-input-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif' letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}

@import url(https://fonts.googleapis.com/css?family=Lato:400, 700,300);
body {
  background-color: #ffb242;
  font-family: 'RocknRoll One', sans-serif;
  position: relative;
  text-transform: uppercase;
  padding: 20px 0;
}
input.invalid {
  border: solid 2px #eb0000;
  height: 34px;
}

label {
  display: block;
  margin: 0 auto 7px;
}

#shadow {
  position: absolute;
  right: 0;
  width: 284px;
  height: 214px;
  top: 36px;
  background-color: #000;
  z-index: -1;
  border-radius: 8px;
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
}
     </style>

</head>
 
<body>

<!-- Navbar -->
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="../home.html">
                <img src="DBMS_logo_final.png" height="60px" width="60px" alt="ICARE ORGANISATION"></img>
                <a href="../home.html" style="color: white; text-decoration: none;">ICare Organization</a>
            </a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../home.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Our Modules
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../Environment Management/home.html">Environment</a>
                    <a class="dropdown-item" href="../healthcare/home_page.html">Health Care</a>
                    <a class="dropdown-item" href="donation-homepage.html">Donation</a>
                    <a class="dropdown-item" href="../mini_store/store.html">Mini Store</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#team">Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html#contactus">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../dashboardCheck.php">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li>
                    <a class="nav-link" href="index.html" style="font-weight: bold; font-size: 20px;">Logout <span><i class="fas fa-sign-out-alt"></i></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<br><br><br><br><br>
<img  class="m" src="DBMS_logo_final.png" height="150" width="150" style=" display: block;
  margin-left: auto;
  margin-right: auto;">
<br><br>
<div id="card-success" class="hidden">
  <i class="fa fa-check"></i>
  <p>Payment Successful!</p>
</div>
<div id="form-errors" class="hidden">
  <i class="fa fa-exclamation-triangle"></i>
  <p id="card-error">Card error</p>
</div>
<div id="form-container">

  <div id="card-front">
    <div id="shadow"></div>
    <div id="image-container">
      <span id="amount">paying: <strong> <?php echo $_SESSION['money']; ?> </strong>To ICare Organisation</span>
    </div>
    <!--- end card image container --->
<form action="ot.php" method = "post">
    <label for="card-number">
        Card Number
      </label>
    <input type="text" id="card-number" placeholder="1234 5678 9101 1112" pattern="[0-9]{12}" title="Enter the 12-digit card number" name="card" required>
    <div id="cardholder-container">
      <label for="card-holder">Card Holder
      </label>
      <input type="text" id="card-holder" placeholder="e.g. John Doe" name="holder" required />
    </div>
    <div id="cardholder-container">
      <label for="card-holder">Email
      </label>
      <input type="email" id="card-holder" placeholder="anyone@gmail.com" name="email" required />
    </div>
    <!--- end card holder container --->
    <div id="exp-container">
      <label for="card-exp">
          Expiration
        </label>
      <input id="card-month" type="text" placeholder="MM" length="2" pattern="^(0?[1-9]|1[012])$" title = "Please Enter a valid month" required>
      <input id="card-year" type="text" placeholder="YY" length="2" pattern="[0-9]{2}" required>
    </div>
        <div id="cvc-container">
      <label for="card-cvc"> CVV</label>
      <input id="card-cvc" placeholder="XXX" title="Enter the 3 digit CVV number" type="password" pattern="[0-9]{3}" required>
      <p>Last 3 digits</p>
    </div>
    <!--- end CVC container --->
    <!--- end exp container --->
  </div>
  <!--- end card front --->
  <div id="card-back">
    <div id="card-stripe">
    </div>

  </div>
  <!--- end card back --->
  <input type="text" id="card-token" />
  <button type="submit" id="card-btn">Submit</button>

</div>
</form>
<button id="card-btn1">Cancel</button>
<div id="myModal" class="modal">

 <div class="modal-content">
    <span class="close">&times;</span>
    <img align="center" style="margin-left: 43%;" src="DBMS_logo_final.png" width=150 height=150> 
    <p align="center"> Enter Your Email For Verification </p>
    <form method="post" action="data-deletion.php">
    <input style="margin-left: 35%; width: 30%;" type = "email" name="email" placeholder="Enter The Email" required />
    <input type="submit" name="" >
    </form>
  </div>
</div>
<script >
  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("card-btn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>