<?php
session_start();
$op = $_SESSION["email"];
$q=mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
if(!$q){
	echo "Not connected Please Check Your Internet Connection Or Contact The Administrator at-icareorganisation1@gmail.com:)";
}
$l2 = "SELECT * FROM pay a INNER JOIN rewards_table b ON a.user_id=b.user_id WHERE a.email = '$op';";
$l3 = mysqli_query($q,$l2);
while($row1 = mysqli_fetch_array($l3)){
    $point= $row1["rewards_point"];
    break;
}
$n=0;
		$l = mysqli_query($q,"SELECT * FROM `pay` WHERE `email` = '$op'");
 $idl = "SELECT * FROM `pay` WHERE `email` = '$op'";
$r = mysqli_query($q,$idl);
while($row = mysqli_fetch_array($r)){
        $n = $n + 1;
        break;
        	}
  if($n == 0){
	echo "<h1 align='center' style='margin-top:200px;'>You didn't donate anything </h1>";
	echo "<h2 align='center' >Please click here to donate </h2>";
	echo "<br>";
	echo "<center> <a href = '../../Donation/donation-homepage.html' style='text-decoration:none;' target='_blank' class='btnfos btnfos-1'>
      <svg>
        <rect x='0' y='0' fill='none' width='100%' height='100%'/>
      </svg>
     Donate Now
    </a> </center>";
  
        }
  else{
     // 	$_SESSION["arr"] = $ar;
// 	for($i=0;$i<$n;$i++)
// 	echo $_SESSION["arr"][$i];
// 	$_SESSION["mon"] = $m;
// 	for($i=0;$i<$n;$i++)
// 	echo $_SESSION["mon"][$i];
echo "<br>";
echo "<h1 align='center' style='border: white 3px outset;'> <i class='fas fa-hand-holding-usd'></i> Your Fund Donation Data </h1>";
echo "<br>";
    echo "<div class='container' >
	<table align='center'>
		<thead>
			<tr>
				<th>Name </th>
				<th>Email</th>
				<th>Pin Code</th>
				<th>City</th>
				<th>Phone No.</th>
				<th>Money</th>
				<th>Date</th>
			</tr>
		</thead>";

		while($row1 = mysqli_fetch_array($l))
{

	echo	"<tbody>";
	echo	"<tr>";
	echo "<td>" . $row1['name'] . "</td>";
echo "<td>" . $row1['email'] . "</td>";
echo "<td>" . $row1['pcode'] . "</td>";
echo "<td>" . $row1['city'] . "</td>";
echo "<td>" . $row1['phone'] . "</td>";
echo "<td>" . $row1['money'] . "</td>";
echo "<td>" . $row1['date'] . "</td>";
	echo	"</tr>";
	echo	"</tbody>";
}
	echo "</table>
</div>";

	echo "<br>";
	echo "<h2 align='center' ><b><u><i>Your Reward Points-> $point </i></u></b></h2>";
		echo "<br>";
	echo "<h1 align='center' style='border: white 3px outset;'> <i class='fas fa-history'></i> Your Fund Donation History  </h1>";
  }
?>

<html>
    <head>
      
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <script src="//ajax.googleapis.com/ajax/libs/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
        html,
body {
  height: 100%;
}
            body{
                color:white;
        
  /*background: linear-gradient(100deg, #49a09d, #5f2c82);*/
  background: -webkit-linear-gradient(left, #49a09d, #5f2c82);
  background: linear-gradient(to right, #49a09d, #5f2c82);
background-size: cover;
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

.btn10{
         padding: 10px 50px;

  color: #fff;
  font-family: sans-serif;
  text-transform: uppercase;
  text-align: center;
  position: relative;
  text-decoration: none;
  display:inline-block;
    }
    .btn10{

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
        </style>
       
</head>
<body>
    <div class="container" style="width:900px;">
        <div id = "chart"></div>
    </div>
    <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['date', 'money'],
          <?php 
          $sql = "SELECT * FROM `pay` WHERE `email` = '$op';";
          $f = mysqli_query($q,$sql);
          while($r = mysqli_fetch_array($f)){
              echo "['".$r['date']."',".$r['money']."],";
          }
          ?>
          
        ]);

        var options = {
        legend:'right',
        backgroundColor: {
        fillOpacity: 0,
      },
          legendTextStyle: { color: '#FFF' },
         
         is3D: true, 
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      $('button').on('click', function(){
	$('table').toggleClass('threeDMode');
});
  </script>
  
  <form>
<center><div id="piechart" <?php if ($n == 0) echo "style='display: none;'"; else echo "style='width: 700px; height: 500px;display:block;color:white;'"; ?>></div></center>
    </form>
<center>
<div <?php if ($n == 0 ) echo "style='display: none;'"; else echo "style=' display:block'"; ?>><a onclick="window.print();" class='btn10'>
     <span >Export in PDF</span>
  <div class='transition'></div>
</a></div></center>
    </body>
</html>