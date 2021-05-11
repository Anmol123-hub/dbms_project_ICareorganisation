<?php 
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Donation</title>
	  <link rel = "icon" href =  "DBMS_logo_final.png" type = "image/x-icon"> 
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=RocknRoll+One&display=swap" rel="stylesheet">
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
*,*:before,*:after {
	box-sizing: border-box;
}

:after {
	content: "";
}

section {
  position: relative;
  left: 100px;
}


body {
  padding: 100px 0;
  color: white;
  max-width:640px;
	 font-family: 'RocknRoll One', sans-serif;
	font-size: 14px;
  line-height:1.4;
  background: url('https://wallpapercave.com/wp/wp37411.jpg');
 

}

.n {
  float: left;
	position: relative;
	margin-top: 20%;
  left: 0;
	background: transparent;
}
.module1{
      background: url('https://wallpapercave.com/wp/wp2951454.jpg');
      padding: 10px 70px;
      margin-left: 5px;
      color: #666666;
      height: 200px;
      width: 236%;
  }
.n .m {
	text-align: center;
}

.n .m li {
	position: relative;
  width: 70px;
  cursor: pointer;
	background: crimson;
	text-transform: uppercase;
	transition:all .4s ease-out;
}

.n .m li:after {
	position: absolute;
	background: white;
	color: crimson;
	top:0;
	left: 70px;
	width: 100px; height: 100%;
  opacity:.5;
  transform: perspective(400px) rotateY(90deg);
	transform-origin: 0 100%;
	transition:all .4s ease-out;
}

.n .m .j:after { 
	content: "Home";
	line-height: 88px;
}
.n .m .k:after { 
	content: "Other Donations";
	line-height: 25px;
	padding-top: 19px;
}
.n .m .l:after { 
	content: "Book Donation";
	line-height: 25px;
	padding-top: 19px;	
}

.n .m li:hover {
	transform: translateX(-70px);
}

.n .m li:hover:after {
  opacity: 1;
	transform: perspective(400px) rotateY(0deg) scale(1) ;
}


.n .m li > div {
	display: inline-block;
	padding: 25px 0;
	background: transparent;
}

.n .m li div { position: relative; }

.roof {
	width: 0;
	height: 0;
	top:2px;
	border-style: solid;
	border-width: 0 21px 15px 21px;
	border-color: transparent transparent #ffffff transparent;
}

.roof-edge {
	position: absolute;
	z-index: 20;
	left: -17px;
	top: 3px;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 17px 12px 17px;
	border-color: transparent transparent crimson transparent;
}
/*white triangle over red triangle*/
.roof-edge:after {
	position: absolute;
	left: -14.5px;
	top: 3px;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 14.5px 10px 14.5px;
	border-color: transparent transparent white transparent;
}

.front {
	position: relative;
	top: 3px;
	width: 28.5px;
	height: 20px;
	margin: 0 auto;
	background: white;
}
/*door*/
.front:after {
	position: absolute;
	background: crimson;
	width: 11px;
	height: 13px;
	bottom: 0;
	left:9px;
}

/*/// About me ////*/

.head {
	width: 32px;
	height: 35px;
	background: white;
	border-radius:8px;
}
/*mouth*/
.head:after {
	width: 4px;
	height: 10px;
	background: white;
	position: absolute;
	border-radius:4px 0 0 4px;
	top:21px;
	left: 14px;
	transform:rotate(270deg);
}

.eyes {
	width: 8px;
	height: 5px;
	border-radius: 50%;
	position: absolute;
	top: 10px;
	left: 5px;
	background: crimson;
}
/*right eye*/
.eyes:after {
	width: 8px;
	height: 5px;
	border-radius: 50%;
	position: absolute;
	top: 0;
	left: 14px;
	background: crimson;
}

.beard {
	width: 32px;
	height: 17px;
	background: crimson;
	border:2px solid white;
	position: absolute;
	bottom: 0;
	left: 0;
	border-radius:0 0 8px 8px;
}
/*nose*/
.beard:after {
	position: absolute;
	top:-2px;
	left: 11px;
	background: white;
	width:6px;
	height: 4px;
	border-left:1px solid crimson;
	border-right:1px solid crimson;
}

/*//work//*/

.paper {
	position: relative;
	height:32px;
	width: 29px;
	background: white;
	border:2px solid white;
}

/*window*/
.paper:after {
	position: absolute;
	top:1px;
	left: 0;
	width: 25px;
	height: 29px;
	background: white;
	border-top:4px solid crimson;
}
 .container12 {
        position: relative;
        width: 670px;
        margin-left: 80%;
        height: 650px;
        border-radius: 20px;
        padding: 40px;
        box-sizing: border-box;
        background: #ecf0f3;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        margin-top: 50px;
        }

      .title {
        margin-top: 10px;
        font-weight: 900;
        font-size: 1.8rem;
        color: #1DA1F2;
        letter-spacing: 1px;
        }

        .inputs {
        text-align: left;
        margin-top: 30px;
        }

        label, .j1, .b,select {
        display: block;
        width: 100%;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
        }

        label {
        margin-bottom: 4px;
        }

        label:nth-of-type(2) {
        margin-top: 12px;
        }

        .j1::placeholder {
        color: gray;
        }

        option {
        color: black;
        }

        .j1 {
        background: #ecf0f3;
        padding: 10px;
        padding-left: 20px;
        height: 50px;
        font-size: 14px;
        border-radius: 50px;
        box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
        }
        select {
        background: #ecf0f3;
        padding: 10px;
        padding-left: 20px;
        height: 50px;
        font-size: 14px;
        color: gray;	
        border-radius: 50px;
        box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
        }

        .b {
        margin-top: 20px;
        background: #1DA1F2;
        height: 40px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 900;
        float: center;
        box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
        transition: 0.5s;
        }

        .b:hover {
        box-shadow: none;
        }

        .wrapper{
    position: absolute;

    margin-left: 750px;

    transform: translate(-50%, -50%);
    width: 80%;	
    height:auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.container{
    margin-top: 10%;
    margin-left: 45%;
    width: 1140px;
}
.col-sm{

}
.card{
    flex: 1;
    flex-basis: 350px;
    flex-grow: 0;
    height: 390px;
    background: #fff;
    border: 2px solid #fff;
    box-shadow: 0px 4px 7px rgba(0,0,0,.5);
    cursor: pointer;
    transition: all .5s cubic-bezier(.8,.5,.2,1.4);
    overflow: hidden;
    position: relative;
}
.card img{
    width: 100%;
    height:100%;
    transition: all .5s cubic-bezier(.8,.5,.2,1.4);
}
.descriptions{
    position: absolute;
    top:0px;
    height: 100%;
    width: 100%;
    left:0px;
    background-color: rgba(255,255,255,.7);
      transition: all .7s ease-in-out;
    padding: 20px;
    box-sizing: border-box;
    clip-path: circle(0% at 100% 100%);
}
.card:hover .descriptions{
    left:0px;
    transition: all .7s ease-in-out;
    clip-path: circle(75%);
}
.card:hover{
    transition: all .5s cubic-bezier(.8,.5,.2,1.4);
    box-shadow: 0px 2px 3px rgba(0,0,0,.3);
    transform: scale(.97);
}
.card:hover img{
    transition: all .5s cubic-bezier(.8,.5,.2,1.4);
    transform: scale(1.6) rotate(20deg);
    filter: blur(3px);
}
.card h1{
    color: #ff3838;
    letter-spacing: 1px;
    margin: 0px;
}
.card .a{
    line-height: 24px;
    height: 70%;
}
.card button{
    width: fit-content;
    height: 40px;
    cursor: pointer;
    border-style: none;
    background-color: #ff3838;
    color:#fff;
    font-size: 15px;
    outline: none;
    box-shadow: 0px 2px 3px rgba(0,0,0,.4);
    transition: all .5s ease-in-out;
}
.card button:hover{
    transform: scale(.95) translateX(-5px);
    transition: all .5s ease-in-out;
}

.footer {
  text-align: center;
  padding: 20px;
  background-color: #bcbec4;
  color:#f71919;
  height: 210px;
  
  margin-top: 20px;
}
p.footer{
  color:#f71919;
}
ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network .l1 {
    display: inline;
    margin: 0 5px
}

.social-network .po.icoFacebook:hover {
    background-color: #3B5998
}

.social-network .po.icoTwitter:hover {
    background-color: #33ccff
}

.social-network .po.icoGoogle:hover {
    background-color: #BD3518
}

.social-network .po.icoFacebook:hover .lp,
.social-network .po.icoTwitter:hover .lp,
.social-network .po.icoGoogle:hover .lp {
    color: #fff
}

.po.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}
.headingAboutus{
margin-left:350px;
padding-top: 10px;

font-size: 30px;
font-weight: bold;

}
.social-circle .l1 .po {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle .l1 .lp {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle .l1 .po:hover .lp,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle .lp {
    color: #fff;
    transition: all 0.8s;
    transition: all 0.8s
}
.info p {
  text-align:center;
  color: #999;
  text-transform:none;
  font-weight:600;
  font-size:15px;
  margin-top:2px
}

.info .lp {
  color:#F6AA93;
}


</style>
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

        <div class="title">Donate Book Now!</div>
        <form action="book_donation1.php" method="post">
        <div class="inputs">
           
            <label style="color: black;">YOUR NAME</label>
            <input type="text" name="name" class="j1" placeholder="enter your name here" style="width: 250px;" required />
            
            <label style="color: black;width: 250px;margin-top: -74px; margin-left: 310px;">BOOK NAME</label>
            <input type="text" name="bname" class="j1" placeholder="enter your book name" style="width: 250px;margin-top: 5px; margin-left: 310px;" required />
              
            <label style="color: black; margin-top: 20px;">EMAIL</label>
            <input type="email" class="j1" title="You can not change your email address" name="email" style="width: 250px;" value="<?php echo $_SESSION['email'] ?>" disabled  />
            <label style="color: black;width: 250px;margin-top: -74px; margin-left: 310px;">BOOK ISBN No.</label>
            <input type="number" class="j1" name="isbn"  pattern="[0-9]{13}" title="Pls enter a 13-digit isbn number" placeholder="enter your 13-digit ISBN" style="width: 250px;margin-top: 5px; margin-left: 310px;" required />
            <label style="color: black; margin-top: 20px;">Pincode</label>
                <input type="number" id="postal" onchange="get_details();" class="j1" placeholder="Enter Your Pincode" style="width: 250px;" required />
                <label style="color: black;width: 250px;margin-top: -74px; margin-left: 310px;">Your City</label></label>
            <input type="text" class="j1" id="city" name="address" placeholder="enter your City" style="width: 250px;margin-top: 5px; margin-left: 310px;" required />
            
            <label style="color: black; margin-top: 20px;">REASON</label>
            <textarea class="j1" rows="14" name="reason" title="Enter The reason" placeholder="Enter Here"></textarea>
            <input class="b" type="submit" />
       
        </div>
         </form>
</div>
</div>
</div>
<script>
    function get_details(){
        var pincode = jQuery('#postal').val();
        if(pincode == ''){
            jQuery('#city').val('');
        }else{
            jQuery.ajax({
               url:'get.php',
               type:'post',
               data:'pincode='+pincode,
               success:function(data){
                   if(data == 'no'){
                     alert('Wrong pincode');
                     jQuery('#city').val('');
                   }
                   else{
                       var getData = $.parseJSON(data);
                    jQuery('#city').val(getData.city);
               }
               }
            });
        }
    }
</script>
<div class="container">

<div class="row">

<!--   <div class="wrapper"> -->
  <div class="col-sm" >
        <div class="card">
            <img src="https://media.istockphoto.com/vectors/cardboard-box-with-books-for-donations-charity-colorful-vector-vector-id1178491737?k=6&m=1178491737&s=612x612&w=0&h=gyIsd771Ir_iH0B6sOJv-OvBtgO-nZP9xByAHhhGexg=" >
            <div class="descriptions">
                <h1>Book Donation :)</h1>
                <br>
                <p class="a" style="color: black;">
                    Books are uniquely portable magic which carries your attached feelings forward.
We are committed to carrying your emotions with your books and making them grow older!
Your books can help someone in the same way it did for you.
                </p>
            </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card">
            <img src="https://www.booksforall.org.in/WhatsApp%20Image%202020-06-28%20at%2018.29.04-1.jpeg">
            <div class="descriptions">
                <h1>For Poor</h1>
                <p class="a" style="color: black;">
                  <br>
                    Let’s become a cause for the change & make a difference.
Let’s Educate Together & Rise Together! 
                </p>
            </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card">
            <img src="https://i.pinimg.com/originals/71/7f/58/717f58010b1cd90834bdee2b6a9f5726.jpg">
            <div class="descriptions">
                <h1>For Their Success :)</h1>
                <p class="a" style="color: black;">
                  <br>
                  Your Donation can bring thousand smiles and more success for the education to our economy.
                    </p>
              </div>
            </div>
        </div>
    </div>

</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>