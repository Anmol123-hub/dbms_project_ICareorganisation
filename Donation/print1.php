<?php
session_start();
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$email = $_SESSION["email"];
$random = $_SESSION["ran"];
$name = $_SESSION["name"];
$d = $_SESSION["d_type"];
$city = $_SESSION["address"];
$date = $_SESSION["date"];
$time = $_SESSION["time"];
$center1 = $_SESSION["center_name"];
$h = "From: icareorganisation1@gmail.com\r\n";
$h .= "MIME-Version: 1.0\r\n";
$h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<html>
<head>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<body bgcolor = 'cyan'>
<div align = 'center'>
<img src='https://lh3.googleusercontent.com/MWNmVxMAkPkXkbfmxrBYVPPuqxuWuEKcWby4jfRYQ_nqyZob_rK3WmBmriEuDAvlZlWeaXNTvX-UqT_i=w1000-no-tmp.jpg' height=150 width=150>
</div>
<div class='jumbotron'>
  <h1 class='display-4' align='center'>Icare Organisation</h1>
  <h2 align='center'> Our Care Earns Your Smile :)</h2>
  <hr class='my-4'>
 <h3 align='center'> Your Name -> <u><i><b>$name</b></i></u></h3>
 <h3 align='center'> Your Donation  -> <u><i><b>$d</b></i></u></h3>
 <h3 align='center'> Your City -> <u><i><b>$city</b></i></u></h3>
 <h3 align='center'> Your Date -> <u><i><b>$date</b></i></u></h3>
 <h3 align='center'> Your Time -> <u><i><b>$time</b></i></u></h3>
  <h3 align='center'> Your Ticket number -> <u><i><b>$random</b></i></u></h3>
 <h3 align='center'> Your Center Name -> <u><i><b>$center1</b></i></u></h3>
 <hr>
 <p align='right'> Thank You For Beign Part Of Our Organisation :) </p>
 <p align='right'> Join Us On <a href='https://www.facebook.com/icareorganisation123'>FACEBOOK</a></p>
 <p align='right'> Join Us On <a href='https://twitter.com/IcareOrganisat1'>TWITTER</a></p>
 <p align='right'> Join Us On <a href='https://www.instagram.com/icareorganisation1/'>INSTAGRAM</a></p>
</div>

</body>
</html>";
mail($email,"Registration" ,$message,$h);

?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Invoice </title>
       <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    #invoice{
    padding: 30px;
    
}

#customers {
  font-family: 'Fraunces', serif;
  border-collapse: collapse;
  font-size:20px;
  width: 100%;
}

#customers td, #customers th {
  border: 2px solid #000000;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #000000;}

#customers tr:hover {background-color: #262626;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.invoice {
    position: relative;
   background: linear-gradient(to bottom right, #ccccff 0%, #ffffff 100%);
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
body{
    background-image: linear-gradient(140deg, #EADEDB 0%, #BC70A4 50%, #BFD641 75%);
}
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
</style>
</head>
<!--Author      : @arboshiki-->
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
<br><br><br>
<div id="invoice">

    <!--<div class="toolbar hidden-print">-->
    <!--    <div class="text-right">-->
    <!--        <button id="printInvoice" onclick="window.print()" class="btn btn-info"><i class="fa fa-print"></i> Print</button>-->
           
    <!--    </div>-->
    <!--    <hr>-->
    <!--</div>-->
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                      
                            <img src="DBMS_logo_final.png" height=130 width=130 data-holder-rendered="true" />
                            <h3>Icare Organisation</h3>
                    </div>
                  
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $_SESSION["name"] ?></h2>
                        <div class="address"><?php echo $_SESSION["address"] ?></div>
                        <div class="email"><a href="mailto:john@example.com"><?php echo $_SESSION["email"] ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE</h1>
                        <div class="date">Date of Invoice: <?php echo date("d/m/Y") ?></div>
                 
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0" id="customers" align="center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">NAME</th>
                            <th class="text-center">DONATION TYPE</th>
                            <th class="text-center">QUANTITY TYPE</th>
                            <th class="text-center">QUANTITY</th>
                             <th class="text-center">DATE</th>
                              <th class="text-center">TIME</th>
                              <th class="text-center">TICKET NUMBER</th>
                            <th class="text-center">CENTER NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no"><?php echo $_SESSION["id"] ?></td>
                            <td class="text-center" ><h3>
                                <?php echo $_SESSION["name"] ?>
                            </td>
                            <td class="text-center"><?php echo $_SESSION["d_type"] ?></td>
                            <td class="text-center"><?php echo $_SESSION["q_type"] ?></td>
                            <td class="text-center"><?php echo $_SESSION["qty"] ?></td>
                            <td class="text-center"><?php echo $_SESSION["date"] ?></td>
                            <td class="text-center"><?php echo $_SESSION["time"] ?></td>
                            <td class="text-center"><?php echo $random ?></td>
                            <td class="text-center"><?php echo $_SESSION["center_name"] ?></td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
    <!--                   <div class="toolbar hidden-print">-->
    <!--    <div class="text-center">-->
    <!--        <button id="printInvoice" onclick="window.print()" class="btn btn-info"><i class="fa fa-print"></i> Print</button>-->
    <!--        <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Continue</button>-->
           
    <!--    </div>-->
        <hr>
    <!--</div>-->
    
                    </tfoot>
                </table>
                
               
            </main>
            <footer>
                 <div class="toolbar hidden-print">
        <div class="text-center">
            <button id="printInvoice" onclick="window.print()" class="btn btn-info"> Print <i class="fa fa-print"></i></button>
            <a href="donation-homepage.html" style="text-decoration:none;"><button id="printInvoice" class="btn btn-info"> Continue <i class="fas fa-arrow-circle-right"></i></button></a>
           <!--<form action="mail1.php" method="post">-->
           <!--     <button id="printInvoice" style="margin-top:-38px;margin-left:228px;" type="submit" class="btn btn-info"><i class="fa fa-print"></i> Email</button>-->
           <!--</form>-->
        </div>
        <hr>
    </div>
                Invoice was created on a computer and is valid without the signature and seal.
                <div class="thanks">Thank you!</div>
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</body>
</html>