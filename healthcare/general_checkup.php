<?php
session_start();
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$name= $_POST['full_name'];
$email1=$_POST['email'];
$phno=$_POST['phno'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$bmi=$_POST['bmi'];
$symp=array();

// $symptoms = implode(',', $_POST['symptoms']);

        // Symptoms
        if(isset($_POST["symptoms"])) 
        {
            // Retrieving each selected option
            foreach ($_POST['symptoms'] as $symptoms) 
                // print "$symptoms<br/>";
                array_push($symp,$symptoms);
        }
    else{
        $symptoms="No symptoms";
        // print "$symptoms<br/>";
        array_push($symp,$symptoms);
    }
    
    //Diseases
      
           $disease=$_POST['disease'];
         $char='';
        $d_array=array();


         $words = explode(',', $disease);
   $characters = -1; 
   foreach($words as $word){
      $characters += strlen($word);
      if($characters >= $position){
         array_push($d_array,$word);
      } 
      
   }   
   
  

    //medicine
     
     $medicine=$_POST['medicine'];
     $med=array();
            $words = explode(',', $medicine);
   $characters = -1; 
   foreach($words as $word){
      $characters += strlen($word);
      if($characters >= $position){
         array_push($med,$word);
      } 
      
   }
   
   
   //major disease
        $major_dis=$_POST['major_dis'];
     $m_dis=array();
            $words = explode(',', $major_dis);
   $characters = -1; 
   foreach($words as $word){
      $characters += strlen($word);
      if($characters >= $position){
         array_push($m_dis,$word);
      } 
      
   }
   

   //symptoms matched
       $matched=$_POST['matched'];
     $match=array();
            $words = explode(',', $matched);
   $characters = -1; 
   foreach($words as $word){
      $characters += strlen($word);
      if($characters >= $position){
         array_push($match,$word);
      } 
      
   }
   
 
   //max symptoms
   $max=$_POST['max_matched'];

   
   //fetching user id
     $email = $_SESSION["email"];
$id = 0;
$a = "SELECT * FROM `user_table` WHERE `email` = '$email'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}

     if($bmi!="")
     {
         //insertion
        $sql="INSERT INTO `general_checkup`(`user_id`, `name`, `email`, `phone_number`, `age`, `height`, `weight`, `bmi`, `max_symptoms`) VALUES('$id','$name','$email1','$phno','$age','$height','$weight','$bmi','$max');";
$re=mysqli_query($db_con,$sql); 
    if($re)
    {
         echo "<script> alert('Your Data is Sucessfully Saved');</script>";
    }
    $check_id=0;
    $l=0;
    $querry = "SELECT * FROM `general_checkup` WHERE `email` = '$email1'";
    $query_ex = mysqli_query($db_con, $querry);
    while($r = mysqli_fetch_array($query_ex))
    {
        $check_id = $r["id"];
        if($l> $check_id )
    $check_id = $l;
     
   
    }
   //insert symptoms
    foreach($symp as $i)
    {
        $querry1="INSERT INTO `symptoms`(`id`, `symptoms_name`) VALUES('$check_id','$i');";
        $query_ex1=mysqli_query($db_con, $querry1);
        // if( $query_ex1)
        // echo "<script> alert('Your symptoms are saved');</script>";
    }
    //insert diseases
     foreach( $d_array as $key => $i)
    {
        if($d_array[$key]!="") //as we are extracting array from string the last element is "" or\0 this this condition needs to be checked
        {
        $querry2="INSERT INTO `disease`(`id`, `disease_name`, `symptoms_matched`) VALUES('$check_id','$i','$match[$key]');";
        $query_ex2=mysqli_query($db_con, $querry2);
        
        // if( $query_ex2)
        // echo "<script> alert('Your disease are saved');</script>";
        }
    }
    //insert major diseases
     foreach( $m_dis as $key => $i)
    {
        if($m_dis[$key]!="") //as we are extracting array from string the last element is "" or\0 this this condition needs to be checked
        {
        $querry3="INSERT INTO `prediction`(`id`, `disease_predicted`) VALUES('$check_id','$i');";
        $query_ex3=mysqli_query($db_con, $querry3);
        
        // if( $query_ex3)
        // echo "<script> alert('Your major disease are saved');</script>";
        }
    }
    
    //insertion of medicines
       foreach( $med as $key => $i)
    {
        if($med[$key]!="") //as we are extracting array from string the last element is "" or\0 this this condition needs to be checked
        {
        $querry4="INSERT INTO `medicines`(`id`, `medicine`) VALUES('$check_id','$i');";
        $query_ex4=mysqli_query($db_con, $querry4);
        
        // if( $query_ex4)
        //  echo "<script>window.location.href='home_page.html';</script>";
        }
    }
    
     }
     else
     {
          echo "<script> alert('You did not perform checkup yet');window.history.go(-1);</script>";
     }
     
        
        
   
        
    
    
?>

<html>
    <head>
        <link src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></link>
        <script src="https://d3js.org/d3.v5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineLite.min.js"></script>
        <style>
body {
  /*background: #fff;*/
  color: #333;
  font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
  font-size: 0.9em;
  padding: 40px;
    background-image: url("https://img.freepik.com/free-vector/stock-market-graph-forex-trading-chart-business-financial-concepts_87788-121.jpg?size=626&ext=jpg");
   background-repeat: no-repeat;
   -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
  
}

.wideBox {
  clear: both;
  text-align: center;
  margin-bottom: 50px;
  padding: 10px;
  background: #ebedf2;
  border: 1px solid #333;
  line-height: 80%;
}

#container {
  width: 900px;
  margin: 0 auto;
}

#chart, #chartData {
  border: 1px solid #333;
  background: #ebedf2 url("images/gradient.png") repeat-x 0 0;
}

#chart {
  display: block;
  /*margin: 0 0 100px 0;*/
  margin-left:-200px;
  height:90%;
  float: left;
  cursor: pointer;
     /*background: linear-gradient(to bottom, #000000 0%, #000066 100%);*/
     background:black;
     background-image:url("https://i.pinimg.com/736x/c4/33/36/c43336eb7f0805d52bf89ff40e752f13.jpg");
}

#chartData {
  width: 500px;
  /*margin: 10px 10px 70px 20px;*/
  margin-right:-150px;
  float: right;
  border-collapse: collapse;
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  background-position: 0 -100px;
   /*background: linear-gradient(to bottom, #000000 0%, #ccffff 100%);*/
   /*background:black;*/
    background-image:url("https://trevorkoch13.files.wordpress.com/2012/04/metalscratchestutorial.jpg");
}

#chartData th, #chartData td {
  padding: 0.5em;
  border: 1px dotted white;
  text-align: left;
  
}

#chartData th {
  border-bottom: 2px solid #333;
  text-transform: uppercase;
  color:#ffffff;
}

#chartData td {
  cursor: pointer;
}

#chartData td.highlight {
  /*background: #e8e8e8;*/
}

#chartData tr:hover td {
    background: linear-gradient(to bottom, #003366 0%, #006699 100%);
}

 .wrapper{
     display: block;
     margin: 50px auto 50px;
     max-width: 1170px;
}
 .box{
     border-radius: 5px;
     background: aliceblue;
}
 .box h1,.box h2,.box h3{
     text-align: center;
     font-size: 26px;
     color: #FFF;
     margin: 0 10px 0 10px;
     position: relative;
     top: -20px;
     border-radius: 5px;
     padding: 5px;
     font-family: cursive;
     box-shadow: 0 0 10px rgba(0,0,0,0.4);
}
 .wrapper > h1{
    text-align: center;
     font-family: cursive;
    margin-bottom: 2.5em;
     text-shadow: 0 0 5px #FFF, 0 0 10px #FFF, 0 0 15px #FFF, 0 0 20px #795548, 0 0 30px #795548, 0 0 40px #795548, 0 0 55px #795548, 0 0 75px #795548, -40px -40px 0px rgba(28,110,164,0);
}
 h1 span {
    color:#2196fd;
}
 h1 span:nth-child(2){
    color:#fd5263;
}
 h1 span:last-child{
    color:#7983f8;
}
 .flexbox .box{
     border: 1px solid #34c5e4;
}
 .flexbox .box:nth-child(2){
     border: 1px solid #f90;
}
 .flexbox .box:last-child{
     border: 1px solid #a7c;
}
 .box h1{
     background:linear-gradient(38deg,#ff6da2,#7983f8);
}
 .box h2{
     background:linear-gradient(38deg,#ffe74f,#fd5263);
}
 .box h3{
     background:linear-gradient(38deg,#2196fd,#04ffb4);
}
 .box p {
     text-align: center;
     padding: 10px 0;
     font-size: 18px;
     color: #a7c;
     margin: 0;
}
 .box .first {
     color:#a7c;
}
 .box .second{
     color:#f90;
}
 .box .third {
     color:#34c5e4;
}
 .box span {
     display: block;
     text-align: center;
     color: #a7c;
     font-size: 53px;
     margin-bottom: 5px;
}
 .flexbox {
     display: flex;
     flex-wrap: wrap;
     margin: 50px 15px;
     justify-content: center;
}
 .flexbox .box{
     width: 280px;
    /* height: 230px;
    */
     box-sizing: border-box;
     margin: 0 15px;
     margin-bottom: 5em;
     position: relative;
}
 .flexbox .box:after{
     pointer-events: none;
     position: absolute;
     z-index: -1;
     content: '';
     bottom: -10%;
     left: 5%;
     height: 20px;
     width: 90%;
     background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
     background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
}
 .contents{
     text-align: justify !important;
     padding: 15px 15px !important;
     font-size: 15px !important;
}
 .scrollbar{
     height: 200px;
     overflow-y: auto;
     scroll-behavior: smooth;
}
 #content-scroll::-webkit-scrollbar{
     width: 10px;
     background-color: #F5F5F5;
}
 #content-scroll::-webkit-scrollbar-thumb{
     border-radius: 10px;
     background-color: #FFF;
     background-image: -webkit-gradient(linear, 40% 0%, 75% 84%, from(#04ffb4), to(#2196fd), color-stop(.6,#2196fd));
}
 #content-scroll1::-webkit-scrollbar{
     width: 10px;
     background-color: #F5F5F5;
}
 #content-scroll1::-webkit-scrollbar-thumb{
     border-radius: 10px;
     background-color: #FFF;
     background-image: -webkit-gradient(linear, 40% 0%, 75% 84%, from(#fd5263), to(#ffe74f), color-stop(.6,#ffe74f));
}
 #content-scroll2::-webkit-scrollbar{
     width: 10px;
     background-color: #F5F5F5;
}
 #content-scroll2::-webkit-scrollbar-thumb{
     border-radius: 10px;
     background-color: #FFF;
     background-image: -webkit-gradient(linear, 40% 0%, 75% 84%, from(#ff6da2), to(#7983f8), color-stop(.6,#7983f8));
}

.button {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  /*margin: 20px 700px;*/
  text-align: center; 
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid red;
}

.button1:hover {
  background:linear-gradient(38deg,#2196fd,#04ffb4);
  color: white;
}
.aligned {
          display: flex;
          align-items: center;
          margin-left:200px;
          margin-top:-60px;
      }
.head{
       
  padding: 10px;
       
}

/*h1 {*/
/*  font-size:1em; */
/*  font-weight: 300;*/
/*  line-height:1em;*/
/*  text-align: center;*/
/*  color: black;*/
/*}*/
        </style>
    </head>
    <body>
          <div class="aligned" align="center">
          <img src=
  "DBMS_logo_final.png"
              width="100" height="100" alt="">

    
        <span class="head"><h1 align="center"style="font-size:4em ;"><b><u>BODY MASS INDEX STATISTICS</u></b></h1></span>
          </div>
<div id="container">
  <canvas id="chart" width="600" height="500"></canvas>

  <table id="chartData">

    <tr>
      <th>BMI (Body Mass Index) STATISTICS</th><th>NUMBER OF PEOPLE</th>
     </tr>

    <tr style="color: #66ff66">
      <td>Class 2 Obesity</td><td>232.03</td>
    </tr>

    <tr style="color: #00ffcc">
      <td>Class 3 Obesity</td><td>382.83</td>
    </tr>

    <tr style="color: #ffff00">
      <td>Under Weight</td><td>1413.105</td>
    </tr>

    <tr style="color: #ff9900">
      <td>Normal Weight</td><td>3572.93</td>
    </tr>

    <tr style="color: #ff0066">
      <td>Over Weight</td><td>1665.04</td>
    </tr>

    <!--<tr style="color: #5F91DC">-->
    <!--  <td>NanoWidget</td><td>128.11</td>-->
    <!--</tr>-->

    <tr style="color: #ff0000">
      <td>Class 1 Obesity</td><td>1004.509</td>
    </tr>
  </table>
</div>
<div class="wrapper">
    <script>
        function printDiv() {
            var divContents = document.getElementById("flexbox").innerHTML;
            var a = window.open('', '', 'height=500, width=1000');
            a.document.write('<html>');
            // a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
		<h1><span>BODY </span><span>MASS </span><span>INDEX</span></h1>
	
		<div class="flexbox" id="flexbox" style="margin-top:-50px">
			<div class="box" id="box">
				<h3><?php echo $name,"'s "; ?> BMI</h1>
					<div class="scrollbar"  id="content-scroll">
				<p class="third"><?php echo "BMI: ",$bmi,$height; ?></p>
				<span class="third">&#9786;</span>
				<!--<h1 id="weight"></h1>-->
				<p id="weight"></p>
				<p  class="third contents" id="bmi_des"></p>
			</div>
			<input type="button" value="Download" class="button button1" style="height:50px; width:278.5px" onclick="printDiv()"> 
			
			</div>
			  
			<script>
 var bmi=parseFloat("<?php echo $bmi;?>");

if(bmi<18.5)
{
 document.getElementById("weight").innerHTML="Under Weight (BMI<18.5)";
  document.getElementById("bmi_des").innerHTML="Being underweight is not good for you. It could cause: Nutritional deficiencies: if you're underweight, it's likely that you're not eating a healthy, balanced diet, which can lead to you lacking nutrients that your body needs to work properly. Calcium, for example, is important for the maintenance of strong and healthy bones. If you do not get enough calcium, you risk developing osteoporosis (fragile bone disease). If you do not get enough iron, you may develop anaemia, which can make you feel drained and tired.Weakened immune system: your immune system is not 100% when you're underweight, so you're more likely to catch a cold, flu or other infections.Fertility problems: women who are underweight can find that their periods stop.";
}
else if(bmi>=18.5 && bmi<=24.9)
{
     document.getElementById("weight").innerHTML="Normal Weight (BMI: 18.5 to 24.9)";
     document.getElementById("bmi_des").innerHTML="It is good to have Normal weight . Continue to follow healthy habbits and stay healthy."
}
else if(bmi>=25.0 && bmi<=29.9)
{
     document.getElementById("weight").innerHTML="Over Weight (BMI: 25.0 to 29.9)";
     document.getElementById("bmi_des").innerHTML="Being overweight or obese can have a serious impact on health. Carrying extra fat leads to serious health consequences such as cardiovascular disease (mainly heart disease and stroke), type 2 diabetes, musculoskeletal disorders like osteoarthritis, and some cancers (endometrial, breast and colon). These conditions cause premature death and substantial disability."
}
else if(bmi>=30.0 && bmi<=34.9)
{
     document.getElementById("weight").innerHTML="Class 1 Obesity (BMI: 30.0 to 34.9)";
     document.getElementById("bmi_des").innerHTML="People with obesity have a higher chance of developing these health problems:High blood glucose (sugar) or diabetes.High blood pressure (hypertension).High blood cholesterol and triglycerides (dyslipidemia, or high blood fats).Heart attacks due to coronary heart disease, heart failure, and stroke.Bone and joint problems, more weight puts pressure on the bones and joints. This can lead to osteoarthritis, a disease that causes joint pain and stiffness.Stopping breathing during sleep (sleep apnea). This can cause daytime fatigue or sleepiness, poor attention, and problems at work.Gallstones and liver problems.Some cancers.";
}
else if(bmi>=35.0 && bmi<=39.9)
{
   document.getElementById("weight").innerHTML="Class 2 Obesity (BMI: 35.0 to 39.9)"; 
   document.getElementById("bmi_des").innerHTML="While almost anyone can become morbidly obese, certain factors put a person more at risk than others. These include the following:Genetic factors: Some research indicates that people with a family history of obesity or morbid obesity are more likely to become morbidly obese themselves.Personal habits: The food a person chooses to eat and a person’s activity level affect whether or not they become overweight or obese.Mental factors: Stress and anxiety can both cause someone to put on weight, as they can lead the body to produce more of the stress hormone cortisol. Cortisol leads to fat storage and weight gain.Sleep habits: Lack of sleep can be another contributor to weight gain.Being female: Many women have trouble losing pregnancy weight and are prone to gaining weight during menopause.Certain medical problems: Some medical issues can cause obesity, including Cushing’s syndrome or Prader-Willi syndrome.Some medications: Antidepressants and beta-blockers are just a few of the drugs that may cause weight gain.Aging: As adults age, slowing metabolism and sedentary but busy lifestyles may make people more likely to gain weight.";
}
else if(bmi>=40)
{
   document.getElementById("weight").innerHTML="Class 3 Obesity (BMI>=40.0)"; 
    document.getElementById("bmi_des").innerHTML="Class III obesity is associated with substantially elevated rates of total mortality, with most of the excess deaths due to heart disease, cancer, and diabetes, and major reductions in life expectancy compared with normal weight.It is really important to take care of your health";
}
   
</script>
			
</div>		
<a href="home_page.html"><input type="button" value="Continue To Home page" align="center" class="button button1" style="height:50px; width:278.5px; margin-top:-110px; margin-left:745px"> </a>		
</div>

<script>

    // Run the code when the DOM is ready
$( pieChart );

function pieChart() {

  // Config settings
  var chartSizePercent = 55;                        // The chart radius relative to the canvas width/height (in percent)
  var sliceBorderWidth = 1;                         // Width (in pixels) of the border around each slice
  var sliceBorderStyle = "#fff";                    // Colour of the border around each slice
  var sliceGradientColour = "#ddd";                 // Colour to use for one end of the chart gradient
  var maxPullOutDistance = 25;                      // How far, in pixels, to pull slices out when clicked
  var pullOutFrameStep = 4;                         // How many pixels to move a slice with each animation frame
  var pullOutFrameInterval = 40;                    // How long (in ms) between each animation frame
  var pullOutLabelPadding = 65;                     // Padding between pulled-out slice and its label  
  var pullOutLabelFont = "bold 16px 'Trebuchet MS', Verdana, sans-serif";  // Pull-out slice label font
  var pullOutValueFont = "bold 12px 'Trebuchet MS', Verdana, sans-serif";  // Pull-out slice value font
  var pullOutValuePrefix = " ";                     // Pull-out slice value prefix
  var pullOutShadowColour = "rgba( 0, 0, 0, .5 )";  // Colour to use for the pull-out slice shadow
  var pullOutShadowOffsetX = 5;                     // X-offset (in pixels) of the pull-out slice shadow
  var pullOutShadowOffsetY = 5;                     // Y-offset (in pixels) of the pull-out slice shadow
  var pullOutShadowBlur = 5;                        // How much to blur the pull-out slice shadow
  var pullOutBorderWidth = 2;                       // Width (in pixels) of the pull-out slice border
  var pullOutBorderStyle = "#333";                  // Colour of the pull-out slice border
  var chartStartAngle = -.5 * Math.PI;              // Start the chart at 12 o'clock instead of 3 o'clock

  // Declare some variables for the chart
  var canvas;                       // The canvas element in the page
  var currentPullOutSlice = -1;     // The slice currently pulled out (-1 = no slice)
  var currentPullOutDistance = 0;   // How many pixels the pulled-out slice is currently pulled out in the animation
  var animationId = 0;              // Tracks the interval ID for the animation created by setInterval()
  var chartData = [];               // Chart data (labels, values, and angles)
  var chartColours = [];            // Chart colours (pulled from the HTML table)
  var totalValue = 0;               // Total of all the values in the chart
  var canvasWidth;                  // Width of the canvas, in pixels
  var canvasHeight;                 // Height of the canvas, in pixels
  var centreX;                      // X-coordinate of centre of the canvas/chart
  var centreY;                      // Y-coordinate of centre of the canvas/chart
  var chartRadius;                  // Radius of the pie chart, in pixels

  // Set things up and draw the chart
  init();


  /**
   * Set up the chart data and colours, as well as the chart and table click handlers,
   * and draw the initial pie chart
   */

  function init() {

    // Get the canvas element in the page
    canvas = document.getElementById('chart');

    // Exit if the browser isn't canvas-capable
    if ( typeof canvas.getContext === 'undefined' ) return;

    // Initialise some properties of the canvas and chart
    canvasWidth = canvas.width;
    canvasHeight = canvas.height;
    centreX = canvasWidth / 2;
    centreY = canvasHeight / 2;
    chartRadius = Math.min( canvasWidth, canvasHeight ) / 2 * ( chartSizePercent / 100 );

    // Grab the data from the table,
    // and assign click handlers to the table data cells
    
    var currentRow = -1;
    var currentCell = 0;

    $('#chartData td').each( function() {
      currentCell++;
      if ( currentCell % 2 != 0 ) {
        currentRow++;
        chartData[currentRow] = [];
        chartData[currentRow]['label'] = $(this).text();
      } else {
       var value = parseFloat($(this).text());
       totalValue += value;
       value = value.toFixed(2);
       chartData[currentRow]['value'] = value;
      }

      // Store the slice index in this cell, and attach a click handler to it
      $(this).data( 'slice', currentRow );
      $(this).click( handleTableClick );

      // Extract and store the cell colour
      if ( rgb = $(this).css('color').match( /rgb\((\d+), (\d+), (\d+)/) ) {
        chartColours[currentRow] = [ rgb[1], rgb[2], rgb[3] ];
      } else if ( hex = $(this).css('color').match(/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/) ) {
        chartColours[currentRow] = [ parseInt(hex[1],16) ,parseInt(hex[2],16), parseInt(hex[3], 16) ];
      } else {
        alert( "Error: Colour could not be determined! Please specify table colours using the format '#xxxxxx'" );
        return;
      }

    } );

    // Now compute and store the start and end angles of each slice in the chart data

    var currentPos = 0; // The current position of the slice in the pie (from 0 to 1)

    for ( var slice in chartData ) {
      chartData[slice]['startAngle'] = 2 * Math.PI * currentPos;
      chartData[slice]['endAngle'] = 2 * Math.PI * ( currentPos + ( chartData[slice]['value'] / totalValue ) );
      currentPos += chartData[slice]['value'] / totalValue;
    }

    // All ready! Now draw the pie chart, and add the click handler to it
    drawChart();
    $('#chart').click ( handleChartClick );
  }


  /**
   * Process mouse clicks in the chart area.
   *
   * If a slice was clicked, toggle it in or out.
   * If the user clicked outside the pie, push any slices back in.
   *
   * @param Event The click event
   */

  function handleChartClick ( clickEvent ) {

    // Get the mouse cursor position at the time of the click, relative to the canvas
    var mouseX = clickEvent.pageX - this.offsetLeft;
    var mouseY = clickEvent.pageY - this.offsetTop;

    // Was the click inside the pie chart?
    var xFromCentre = mouseX - centreX;
    var yFromCentre = mouseY - centreY;
    var distanceFromCentre = Math.sqrt( Math.pow( Math.abs( xFromCentre ), 2 ) + Math.pow( Math.abs( yFromCentre ), 2 ) );

    if ( distanceFromCentre <= chartRadius ) {

      // Yes, the click was inside the chart.
      // Find the slice that was clicked by comparing angles relative to the chart centre.

      var clickAngle = Math.atan2( yFromCentre, xFromCentre ) - chartStartAngle;
      if ( clickAngle < 0 ) clickAngle = 2 * Math.PI + clickAngle;
                  
      for ( var slice in chartData ) {
        if ( clickAngle >= chartData[slice]['startAngle'] && clickAngle <= chartData[slice]['endAngle'] ) {

          // Slice found. Pull it out or push it in, as required.
          toggleSlice ( slice );
          return;
        }
      }
    }

    // User must have clicked outside the pie. Push any pulled-out slice back in.
    pushIn();
  }


  /**
   * Process mouse clicks in the table area.
   *
   * Retrieve the slice number from the jQuery data stored in the
   * clicked table cell, then toggle the slice
   *
   * @param Event The click event
   */

  function handleTableClick ( clickEvent ) {
    var slice = $(this).data('slice');
    toggleSlice ( slice );
  }


  /**
   * Push a slice in or out.
   *
   * If it's already pulled out, push it in. Otherwise, pull it out.
   *
   * @param Number The slice index (between 0 and the number of slices - 1)
   */

  function toggleSlice ( slice ) {
    if ( slice == currentPullOutSlice ) {
      pushIn();
    } else {
      startPullOut ( slice );
    }
  }

 
  /**
   * Start pulling a slice out from the pie.
   *
   * @param Number The slice index (between 0 and the number of slices - 1)
   */

  function startPullOut ( slice ) {

    // Exit if we're already pulling out this slice
    if ( currentPullOutSlice == slice ) return;

    // Record the slice that we're pulling out, clear any previous animation, then start the animation
    currentPullOutSlice = slice;
    currentPullOutDistance = 0;
    clearInterval( animationId );
    animationId = setInterval( function() { animatePullOut( slice ); }, pullOutFrameInterval );

    // Highlight the corresponding row in the key table
    $('#chartData td').removeClass('highlight');
    var labelCell = $('#chartData td:eq(' + (slice*2) + ')');
    var valueCell = $('#chartData td:eq(' + (slice*2+1) + ')');
    labelCell.addClass('highlight');
    valueCell.addClass('highlight');
  }

 
  /**
   * Draw a frame of the pull-out animation.
   *
   * @param Number The index of the slice being pulled out
   */

  function animatePullOut ( slice ) {

    // Pull the slice out some more
    currentPullOutDistance += pullOutFrameStep;

    // If we've pulled it right out, stop animating
    if ( currentPullOutDistance >= maxPullOutDistance ) {
      clearInterval( animationId );
      return;
    }

    // Draw the frame
    drawChart();
  }

 
  /**
   * Push any pulled-out slice back in.
   *
   * Resets the animation variables and redraws the chart.
   * Also un-highlights all rows in the table.
   */

  function pushIn() {
    currentPullOutSlice = -1;
    currentPullOutDistance = 0;
    clearInterval( animationId );
    drawChart();
    $('#chartData td').removeClass('highlight');
  }
 
 
  /**
   * Draw the chart.
   *
   * Loop through each slice of the pie, and draw it.
   */

  function drawChart() {

    // Get a drawing context
    var context = canvas.getContext('2d');
        
    // Clear the canvas, ready for the new frame
    context.clearRect ( 0, 0, canvasWidth, canvasHeight );

    // Draw each slice of the chart, skipping the pull-out slice (if any)
    for ( var slice in chartData ) {
      if ( slice != currentPullOutSlice ) drawSlice( context, slice );
    }

    // If there's a pull-out slice in effect, draw it.
    // (We draw the pull-out slice last so its drop shadow doesn't get painted over.)
    if ( currentPullOutSlice != -1 ) drawSlice( context, currentPullOutSlice );
  }


  /**
   * Draw an individual slice in the chart.
   *
   * @param Context A canvas context to draw on  
   * @param Number The index of the slice to draw
   */

  function drawSlice ( context, slice ) {

    // Compute the adjusted start and end angles for the slice
    var startAngle = chartData[slice]['startAngle']  + chartStartAngle;
    var endAngle = chartData[slice]['endAngle']  + chartStartAngle;
      
    if ( slice == currentPullOutSlice ) {

      // We're pulling (or have pulled) this slice out.
      // Offset it from the pie centre, draw the text label,
      // and add a drop shadow.

      var midAngle = (startAngle + endAngle) / 2;
      var actualPullOutDistance = currentPullOutDistance * easeOut( currentPullOutDistance/maxPullOutDistance, .8 );
      startX = centreX + Math.cos(midAngle) * actualPullOutDistance;
      startY = centreY + Math.sin(midAngle) * actualPullOutDistance;
      context.fillStyle = 'rgb(' + chartColours[slice].join(',') + ')';
      context.textAlign = "center";
      context.font = pullOutLabelFont;
      context.fillText( chartData[slice]['label'], centreX + Math.cos(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ), centreY + Math.sin(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ) );
      context.font = pullOutValueFont;
      context.fillText( pullOutValuePrefix + chartData[slice]['value'] + " (" + ( parseInt( chartData[slice]['value'] / totalValue * 100 + .5 ) ) +  "%)", centreX + Math.cos(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ), centreY + Math.sin(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ) + 20 );
      context.shadowOffsetX = pullOutShadowOffsetX;
      context.shadowOffsetY = pullOutShadowOffsetY;
      context.shadowBlur = pullOutShadowBlur;

    } else {

      // This slice isn't pulled out, so draw it from the pie centre
      startX = centreX;
      startY = centreY;
    }

    // Set up the gradient fill for the slice
    var sliceGradient = context.createLinearGradient( 0, 0, canvasWidth*.75, canvasHeight*.75 );
    sliceGradient.addColorStop( 0, sliceGradientColour );
    sliceGradient.addColorStop( 1, 'rgb(' + chartColours[slice].join(',') + ')' );

    // Draw the slice
    context.beginPath();
    context.moveTo( startX, startY );
    context.arc( startX, startY, chartRadius, startAngle, endAngle, false );
    context.lineTo( startX, startY );
    context.closePath();
    context.fillStyle = sliceGradient;
    context.shadowColor = ( slice == currentPullOutSlice ) ? pullOutShadowColour : "rgba( 0, 0, 0, 0 )";
    context.fill();
    context.shadowColor = "rgba( 0, 0, 0, 0 )";

    // Style the slice border appropriately
    if ( slice == currentPullOutSlice ) {
      context.lineWidth = pullOutBorderWidth;
      context.strokeStyle = pullOutBorderStyle;
    } else {
      context.lineWidth = sliceBorderWidth;
      context.strokeStyle = sliceBorderStyle;
    }

    // Draw the slice border
    context.stroke();
  }


  /**
   * Easing function.
   *
   * A bit hacky but it seems to work! (Note to self: Re-read my school maths books sometime)
   *
   * @param Number The ratio of the current distance travelled to the maximum distance
   * @param Number The power (higher numbers = more gradual easing)
   * @return Number The new ratio
   */

  function easeOut( ratio, power ) {
    return ( Math.pow ( 1 - ratio, power ) + 1 );
  }

};
</script>
</body>

</html>