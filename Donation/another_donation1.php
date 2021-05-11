<?php 
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Another Donation</title>
	  <link rel = "icon" href =  "DBMS_logo_final.png" type = "image/x-icon"> 
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=RocknRoll+One&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="another.css">
    <script type="text/javascript">
  function Div() {
        var s = document.getElementById("jh");
        var s1 = document.getElementById("jh1");
        if(s.value=='other'){
  s1.style.display='block';
  jh1.focus();
}
 else  
   s1.style.display='none';
}
function EnableDisableTextBox() {
        var chkYes = document.getElementById("yes");
         var yes1 = document.getElementById("yes1");
          var yes2 = document.getElementById("yes2");
           var yes3 = document.getElementById("yes3");
        var txtPassportNumber = document.getElementById("jh2");
        if(chkYes.checked == true){
          txtPassportNumber.disabled = chkYes.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
   else if(yes1.checked == true){
    txtPassportNumber.disabled = yes1.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
    else if(yes2.checked == true){
      txtPassportNumber.disabled = yes2.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
    else if(yes3.checked == true){
      txtPassportNumber.disabled = yes3.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
  }
  function kl() {
    // body...
    window.location.href="home.html";
  }
    </script>
</head>
<body>
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
                    <a class="nav-link" href=../"home.html#aboutus">About Us</a>
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
                    <a class="nav-link" href="../index.html" style="font-weight: bold; font-size: 20px;">Logout <span><i class="fas fa-sign-out-alt"></i></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- <div class="row"> -->
<!-- <div class="col-md-8"> -->
<nav class="n">
  <ul class="m">
   <a href="donation-homepage.html" style="text-decoration: none;"> <li class="j">
      <div class="home-icon">
        <div class="roof">
          <div class="roof-edge"></div>
        </div>
        <div class="front"></div>
      </div>
    </li>
  </a>
    <a href="another_donation1.php" style="text-decoration: none;"><li class="k">
      <div class="about-icon">
        <div class="head">
          <div class="eyes"></div>
          <div class="beard"></div>
        </div>
      </div>
    </li>
  </a>
   <a href="book_donation.php" style="text-decoration: none;"> <li class="l">
      <div class="work-icon">
        <div class="paper"></div>
      </div>
    </li>
  </a>
  </ul>
</nav>
<!-- </div> -->
<br>

<div class="row">
<div class="col-12">
  
 <div class="container12" align="center">

        <div class="title">Donate Now!</div>
        <form action="another_donation.php" method="post">
        <div class="inputs">
           
            <label style="color: black;">NAME</label>
            <input type="text" name="name" class="j1" placeholder="enter your name here" style="width: 250px;" required />
            
            <label style="color: black;width: 250px;margin-top: -74px; margin-left: 310px;">DONATION TYPE</label>
            <select id="jh" onchange="Div();" name="type" style="width: 250px;margin-top: 5px; margin-left: 310px;" required>
              <option value="">none</option>
              <optgroup label="Household Things">
              <option value="Blender">Blender</option>
              <option value="Microwave">Microwave</option>
              <option vslue="Bucket">Bucket</option>
              <option value="other">other</option></optgroup>
              <optgroup label="Clothes">
              <option value="Silk">Silk</option>
              <option value="Woolen">Woolen</option>
              <option value="Cotton">Cotton</option>
              <option value="other">other</option></optgroup>
              <optgroup label="Food">
              <option value="Veg">Veg</option>
              <option value="Non-Veg">Non-Veg</option>
              <option value="other">other</option></optgroup>
            </select>
            <input type="text" id="jh1" name="type1" class="j1" placeholder="Please Specify Your Donation" style="width: 250px;margin-top: 5px; margin-left: 310px;display: none;" />
            <label style="color: black; margin-top: 20px;">EMAIL</label>
            <input type="email" class="j1" title="You can not change your email address" name="email" style="width: 250px;" value="<?php echo $_SESSION['email'] ?>" disabled  />
            <label style="color: black;width: 250px;margin-top: -74px; margin-left: 310px;">YOUR CITY</label>
            <input type="text" class="j1" name="address" placeholder="enter your city" style="width: 250px;margin-top: 5px; margin-left: 310px;" required/>
            <label style="color: black; margin-top: 20px;">QUANTITY</label>
            <input type="radio" id="yes" name="one" value="KG" onclick="EnableDisableTextBox();" style="margin-top: 10px;"><i style="color: black;margin-left: 2px;" >KG</i>
            <input type="radio" id="yes1" name="one" value="POUND" style="margin-top: 10px; margin-left: 10px;" onclick="EnableDisableTextBox();"><i style="color: black;margin-left: 2px;">POUND</i>
            <input type="radio" id="yes2" name="one" value="TON" style="margin-top: 10px; margin-left: 9px;" onclick="EnableDisableTextBox();"><i style="color: black;margin-left: 2px;" >TON</i>
            <label></label>
            <input type="radio" id="yes3" name="one" value="No_Unit" style="margin-top: 10px;" onclick="EnableDisableTextBox();"><i style="color: black;margin-left: 2px;" >Can't Measure It </i>
            <input type="number" id="jh2" name="qty" class="j1" placeholder="Enter Quantity" style="width: 250px;margin-top: -40px; margin-left: 310px;" required disabled />
            <label style="color: black; margin-top: 20px;">REASON</label>
            <textarea class="j1" rows="14" name="reason" title="Enter The reason" placeholder="Enter Here"></textarea>
            <input class="b" type="submit" />
       
        </div>
         </form>
</div>
</div>
</div>

<div class="container">

<div class="row">

<!--   <div class="wrapper"> -->
  <div class="col-sm" >
        <div class="card">
            <img src="img/food.jpg" >
            <div class="descriptions">
                <h1>Food Donation :)</h1>
                <br>
                <p class="a" style="color: black;">
                    By redirecting unspoiled food from landfill to our neighbors in need, individuals can support their local communities and reduce environmental impact. Non-perishable and unspoiled perishable food can be donated. Donated food can also include leftovers from events and surplus food inventory.
                </p>
            </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card">
            <img src="img/cloth.jpg">
            <div class="descriptions">
                <h1>Cloth Donation :)</h1>
                <p class="a" style="color: black;">
                  <br>
                    A quick rule of thumb for clothing donations: If an item is in good condition (no stains, holes, or tears) and is clean, it’s probably perfect for clothing donation.Get the clothes to our donation center/charity 
                </p>
            </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card">
            <img src="img/house.jpg">
            <div class="descriptions">
                <h1>House Hold Thing Donation :)</h1>
                <p class="a" style="color: black;">
                  <br>
                   Household Goods provides good quality used household furnishings free of charge to individuals and families in need. To furnish 50 homes a week, Household Goods needs a steady stream of clean, usable dressers, tables, chairs, and other furniture,mattresses and bed frames and other household items.    </p>
              </div>
            </div>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>