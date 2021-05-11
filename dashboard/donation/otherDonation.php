<?php
session_start();
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
$op = $_SESSION["email"];
$n=0;
$m=0;
	$p9 = mysqli_query($q,"SELECT * FROM user_table WHERE email = '$op'");
 $idl = "SELECT * FROM `other_donation` WHERE `email` = '$op'";
$r = mysqli_query($q,$idl);
while($row = mysqli_fetch_array($r)){
        $n = $n + 1;
        break;
        	}
        	$idl1 = "SELECT * FROM `book_table` WHERE `email` = '$op'";
$r1 = mysqli_query($q,$idl1);
while($row = mysqli_fetch_array($r1)){
        $m = $m + 1;
        break;
        	}
        	if($n == 0 && $m==0){
	echo "<h1 align='center' style='margin-top:200px;'>You didn't donate any thing </h1>";
	echo "<h2 align='center' >Please click here to donate </h2>";
	echo "<br>";
	echo "<center> <a href = '../../Donation/donation-homepage.html' style='text-decoration:none;' target='_blank' class='btnfos btnfos-1'>
      <svg>
        <rect x='0' y='0' fill='none' width='100%' height='100%'/>
      </svg>
     Donate Now
    </a> </center>";
  
        }
     else if($m==0){
            	echo "<h1 align='center' >You didn't donate any book </h1>";
	echo "<h2 align='center' >Please click here to donate </h2>";
	echo "<br>";
	echo "<center> <a href = '../../Donation/donation-homepage.html' style='text-decoration:none;' target='_blank' class='btnfos btnfos-1'>
      <svg>
        <rect x='0' y='0' fill='none' width='100%' height='100%'/>
      </svg>
     Donate Now
    </a> </center>";
  echo "<hr>";
        }
        else if($n==0){
            	echo "<h1 align='center' >You didn't donate any food/clothes/household things </h1>";
	echo "<h2 align='center' >Please click here to donate </h2>";
	echo "<br>";
	echo "<center> <a href = '../../Donation/donation-homepage.html' style='text-decoration:none;' target='_blank' class='btnfos btnfos-1'>
      <svg>
        <rect x='0' y='0' fill='none' width='100%' height='100%'/>
      </svg>
     Donate Now
    </a> </center>";
  echo "<hr>";
        }
        if($m==1){
            	$l = mysqli_query($q,"SELECT * FROM `book_table` WHERE `email` = '$op'");
            echo "<br>";
         
echo "<h1 align='center' style='border: white 3px outset;'> <i class='fas fa-book'></i> Your Book donation data </h1>";
echo "<br>";
    echo "<div class='container' style='overflow-x:auto;'>
	<table align='center'>
		<thead>
			<tr>
				<th>Name </th>
				<th>Book Name</th>
				<th>Email</th>
				<th>ISBN</th>
				<th>City</th>
				<th>Reason</th>
			</tr>
		</thead>";

		while($row1 = mysqli_fetch_array($l))
{
	echo	"<tbody>";
	echo	"<tr>";
	echo "<td>" . $row1['name'] . "</td>";
echo "<td>" . $row1['book_name'] . "</td>";
echo "<td>" . $row1['email'] . "</td>";
echo "<td>" . $row1['isbn'] . "</td>";
echo "<td>" . $row1['city'] . "</td>";
echo "<td>" . $row1['reason'] . "</td>";
	echo	"</tr>";
	echo	"</tbody>";
}
	echo "</table>
</div>";

echo "<br>";

while($p10 = mysqli_fetch_array($p9)){
    $idf = $p10["user_id"];
    break;
}
//$l2 = mysqli_query($q,"SELECT * FROM book_table a NATURAL JOIN book_map b WHERE a.ticket_no = b.ticket  ");
$l2 = mysqli_query($q,"SELECT * FROM book_map WHERE ticket IN (SELECT ticket_no FROM book_table WHERE user_id = '$idf');");
echo "<h1 align='center' >Your center details </h1>";
echo "<br>";
    echo "<div class='container' style='overflow-x:auto;'>
	<table align='center'>
		<thead>
			<tr>
				<th>Center Name </th>
				<th>Location</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
		</thead>";

		while($row2 = mysqli_fetch_array($l2))
{
	echo	"<tbody>";
	echo	"<tr>";
	echo "<td>" . $row2['center_name'] . "</td>";
echo "<td>" . $row2['location'] . "</td>";
echo "<td>" . $row2['date'] . "</td>";
echo "<td>" . $row2['time'] . "</td>";
	echo	"</tr>";
	echo	"</tbody>";
}
	echo "</table>
</div>";
echo "<br>";
echo "<center>
<a  id='card-btn1' class='btn10'>
     <span >Cancel The Booking</span>
  <div class='transition'></div>
</a>
</center>";
echo "<div id='myModal' class='modal'>

 <div class='modal-content'>
    <span class='close'>&times;</span>
    <img align='center' style='margin-left: 43%;' src='../../DBMS_logo_final.png' width=150 height=150> 
    <p align='center' style='color:black;'> Enter Your Ticket Number For Verification </p>
    <form method='post' action='data_deletion.php'>
    <input style='margin-left: 35%; width: 30%;' type = 'number' name='ticket' placeholder='Enter The Ticket Number' required />
    <input type='submit' >
    </form>
  </div>
</div>";
echo "<script>

var modal = document.getElementById('myModal');

var btn = document.getElementById('card-btn1');

var span = document.getElementsByClassName('close')[0];

btn.onclick = function() {
  modal.style.display = 'block';
}

span.onclick = function() {
  modal.style.display = 'none';
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
</script>";

echo "<br><br><br><hr>";
        }
        if($n==1){
            	$lo = mysqli_query($q,"SELECT * FROM `other_donation` WHERE `email` = '$op'");
            echo "<br>";
echo "<h1 align='center' style='border: white 3px outset;'>  <i class='fas fa-hand-holding-heart'></i> Your Other donation data </h1>";
echo "<br>";
    echo "<div class='container' style='overflow-x:auto;'>
	<table align='center'>
		<thead>
			<tr>
				<th>Name </th>
				<th>Donation Type</th>
				<th>Email</th>
				<th>City</th>
				<th>Quatity</th>
				<th>Reason</th>
			</tr>
		</thead>";

		while($row12 = mysqli_fetch_array($lo))
{
	echo	"<tbody>";
	echo	"<tr>";
	echo "<td>" . $row12['name'] . "</td>";
echo "<td>" . $row12['d_type'] . "</td>";
echo "<td>" . $row12['email'] . "</td>";
echo "<td>" . $row12['city'] . "</td>";
echo "<td>" . $row12['qty'] . "</td>";
echo "<td>" . $row12['reason'] . "</td>";
	echo	"</tr>";
	echo	"</tbody>";
}
	echo "</table>
</div>";

echo "<br>";
	$p98 = mysqli_query($q,"SELECT * FROM user_table WHERE email = '$op'");
while($p11 = mysqli_fetch_array($p98)){
    $idf1 = $p11["user_id"];
    break;
}
//$l2 = mysqli_query($q,"SELECT * FROM book_table a NATURAL JOIN book_map b WHERE a.ticket_no = b.ticket  ");
$l3 = mysqli_query($q,"SELECT * FROM map_table WHERE ticket IN (SELECT ticket FROM other_donation WHERE user_id = '$idf1' );");
echo "<h1 align='center' >Your center details </h1>";
echo "<br>";
    echo "<div class='container' style='overflow-x:auto;'>
	<table align='center'>
		<thead>
			<tr>
				<th>Center Name </th>
				<th>Location</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
		</thead>";

		while($row3 = mysqli_fetch_array($l3))
{
	echo	"<tbody>";
	echo	"<tr>";
	echo "<td>" . $row3['center_name'] . "</td>";
echo "<td>" . $row3['location'] . "</td>";
echo "<td>" . $row3['date'] . "</td>";
echo "<td>" . $row3['time'] . "</td>";
	echo	"</tr>";
	echo	"</tbody>";
}
	echo "</table>
</div>";

echo "<center>
<a  id='card-btn2' class='btn10'>
     <span >Cancel The Booking</span>
  <div class='transition'></div>
</a>
</center>";
echo "<div id='myModal1' class='modal1'>

 <div class='modal-content1'>
    <span class='close1'>&times;</span>
    <img align='center' style='margin-left: 43%;' src='../../DBMS_logo_final.png' width=150 height=150> 
    <p align='center' style='color:black;'> Enter Your Ticket Number For Verification </p>
    <form method='post' action='data_deletion1.php'>
    <input style='margin-left: 35%; width: 30%;' type = 'number' name='ticket1' placeholder='Enter The Ticket Number' required />
    <input type='submit' >
    </form>
  </div>
</div>";

echo "<script>

var modal1 = document.getElementById('myModal1');

var btn1 = document.getElementById('card-btn2');

var span1 = document.getElementsByClassName('close1')[0];

btn1.onclick = function() {
  modal1.style.display = 'block';
}

span1.onclick = function() {
  modal1.style.display = 'none';
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = 'none';
  }
}
</script>";
echo "<br><br><br><hr>";
        }
?>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Donation');
        data.addColumn('number', 'Quantity');
        data.addRows([
          <?php 
          $sql = "SELECT * FROM `other_donation` WHERE `email` = '$op';";
          $f = mysqli_query($q,$sql);
          while($r = mysqli_fetch_array($f)){
              echo "['".$r['d_type']."',".$r['qty']."],";
          }
          ?>
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Other Donation',
                       width:400,
                       legend:'right',
        backgroundColor: {
        fillOpacity: 0,
      },
      titleTextStyle: { color: '#FFF' },
          legendTextStyle: { color: '#FFF' },
          is3D: true,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Book Name');
        data.addColumn('number', 'Quantity');
        data.addRows([
           <?php 
           
           $result = mysqli_query($q,"SELECT COUNT(`book_name`) AS `count` FROM `book_table` where `email` = '$op' ");
           $row1 = mysqli_fetch_array($result);
           $count = $row1['count'];
          $sql = "SELECT * FROM `book_table` WHERE `email` = '$op';";
          $f = mysqli_query($q,$sql);
          while($r = mysqli_fetch_array($f)){
              echo "['".$r['book_name']."',".$count."],";
          }
          ?>
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Book Donation',
                       width:500,
                       legend:'right',
     
        backgroundColor: {
        fillOpacity: 0,
      },
      titleTextStyle: { color: '#FFF' },
          legendTextStyle: { color: '#FFF' },
          
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.BarChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
* {
  -moz-box-sizing: inherit;
       box-sizing: inherit;
  -webkit-transition-property: all;
          transition-property: all;
  -webkit-transition-duration: .6s;
          transition-duration: .6s;
  -webkit-transition-timing-function: ease;
          transition-timing-function: ease;
}
    
    .btnfos {
  color: #fff;
  cursor: pointer;
  display: block;
  font-size: 16px;
  font-weight: 400;
  line-height: 45px;
  max-width: 160px;
  margin: 0 auto 2em;
  position: relative;
  text-transform: uppercase;
  vertical-align: middle;
  width: 100%;
}
@media (min-width: 400px) {
  .btnfos {
    display: inline-block;
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(even) {
    margin-right: 0;
  }
}
@media (min-width: 600px) {
  .btnfos:nth-of-type(even) {
    margin-right: 2.5em;
  }
  .btnfos:nth-of-type(5) {
    margin-right: 0;
  }
}

.btnfos-1 {
  background: #3498db;
  font-weight: 100;
}
.btnfos-1 svg {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 45px;
}
.btnfos-1 rect {
  fill: none;
  stroke: #fff;
  stroke-width: 1;
  stroke-dasharray: 422, 0;
}

.btnfos-1:hover {
  background: rgba(225, 51, 45, 0);
  letter-spacing: 1px;
  font-weight: 900;
}
.btnfos-1:hover rect {
  stroke-width: 5;
  stroke-dasharray: 15, 310;
  stroke-dashoffset: 48;
  -webkit-transition: all 1.35s cubic-bezier(0.19, 1, 0.22, 1);
          transition: all 1.35s cubic-bezier(0.19, 1, 0.22, 1);
}

    
    .btn10{
         padding: 15px 100px;
  margin:10px 4px;
  color: #fff;
  font-family: sans-serif;
  text-transform: uppercase;
  text-align: center;
  position: relative;
  text-decoration: none;
  display:inline-block;
    }
    .btn10{
    top: 40px;
    font-family: "proxima-nova", sans-serif;
    font-weight: 500;
    font-size: 13px;
    text-transform: uppercase!important;
    letter-spacing: 2px;
    color: #fff;
    cursor: hand;
    text-align: center;
    text-transform: capitalize;
    border: 1px solid #fff;
    border-radius:50px;
    position: relative;
    overflow: hidden!important;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    background: transparent!important;
    z-index:10;
    
}


.btn10:hover{
    border: 1px solid #071982;
    color: #80ffd3!important;
}
.btn10::before {
    content: '';
    width: 0%;
    height: 100%;
    display: block;
    background: #071982;
    position: absolute;
    -ms-transform: skewX(-20deg);
    -webkit-transform: skewX(-20deg); 
    transform: skewX(-20deg);   
    left: -10%;
    opacity: 1;
    top: 0;
    z-index: -12;
    -moz-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
  -o-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
  -webkit-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
  transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
     box-shadow:2px 0px 14px rgba(0,0,0,.6);
  } 

.btn10::after {
    content: '';
    width: 0%;
    height: 100%;
    display: block;
    background: #80ffd3;
    position: absolute;
  -ms-transform: skewX(-20deg);
    -webkit-transform: skewX(-20deg); 
    transform: skewX(-20deg);   
    left: -10%;
    opacity: 0;
    top: 0;
    z-index: -15;
    -webkit-transition: all .94s cubic-bezier(.2,.95,.57,.99);
    -moz-transition: all .4s cubic-bezier(.2,.95,.57,.99);
    -o-transition: all .4s cubic-bezier(.2,.95,.57,.99);
    transition: all .4s cubic-bezier(.2,.95,.57,.99);
    box-shadow: 2px 0px 14px rgba(0,0,0,.6);
}
.btn10:hover::before, .btn1O:hover::before{
  opacity:1;
  width: 116%;
}
.btn10:hover::after, .btn1O:hover::after{
  opacity:1;
  width: 120%;
}
.transition{
    position: absolute;
    top: -10%;
    left: 0%;
    width: 100%;
    height: 0%;
    background: #80ffd3;
    z-index:-1;
/*     -ms-transform: skewX(-50deg); 
    -webkit-transform: skewX(-50deg); 
    transform: skewX(-50deg); */
}
    
         html,
body {
  height: 100%;
}
            body{
                color:white;
        
   background: -webkit-linear-gradient(left, #49a09d, #5f2c82);
  background: linear-gradient(to right, #49a09d, #5f2c82);

  font-family: sans-serif;
  font-weight: 100;
}
table {
  width: 800px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
th,
td {
  padding: 15px;
  background-color: rgba(255, 255, 255, 0.2);
  color: #fff;
}
th {
  text-align: left;
}
thead th {
  background-color: #55608f;
}
tbody tr:hover {
  background-color: rgba(255, 255, 255, 0.3);
}
tbody td {
  position: relative;
}
tbody td:hover:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -9999px;
  bottom: -9999px;
  background-color: rgba(255, 255, 255, 0.2);
  z-index: -1;
}

button {
	border: none;
	background: #000;
	color: #fff;
	padding: 10px 50px;
	font-family: 'Red Hat Display', sans-serif;
	font-weight: 600;
	margin: 0 auto;
	display: block;
    cursor:pointer;
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
.modal1 {
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
.modal-content1 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close1 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    </style>
    <script>
    
 
        function printDiv() {
            var divContents = document.getElementById("print").innerHTML;
            var a = window.open('', '', 'height=100%, width=100%');
            a.document.write('<html>');
            // a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
           
var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);


 a.document.write('</body><div align="center"><button align="center" style="margin-top:20px;"onclick="window.print()"><span>Print</span></button></div></html>');
            a.document.close();
            // a.print();
        }

</script>
  </head>
  <body>
 
    <!--Table and divs that hold the pie charts-->
    <center>
      <div class="container" style='overflow-x:auto;' id="print">
        <table <?php if ($n == 0 && $m==0) echo "style='display: none;'"; else echo " display:block;'"; ?>>
        <td><div <?php if ($n == 0) echo "style='display: none;'"; else echo "style='width: 500px; display:block;color:white;'"; ?> id="Sarah_chart_div" ></div>
        <td><div <?php if ($m == 0) echo "style='display: none;'";  else echo "style='width: 500px; display:block;color:white;'"; ?> id="Anthony_chart_div" ></div>
        </table>
    </div>
    </center>
 
    <br>
    <center>
  <div <?php if ($n == 0 && $m==0) echo "style='display: none;'"; else echo "style=' display:block'"; ?>><a onclick="printDiv()" class='btn10'>
     <span >Export in PDF</span>
  <div class='transition'></div>
</a></div>
</center>
  </body>
</html>