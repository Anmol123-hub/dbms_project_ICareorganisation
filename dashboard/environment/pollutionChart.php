<?php 

session_start();
$email = $_SESSION["email"];

$pid = $_GET['p_id'];

$conn = mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");

if(!$conn){
	echo "Something Went Wrong! Please Check Your Internet Connection and Try Again :)";
}

$result = mysqli_query($conn,"SELECT * FROM pollution_details WHERE p_id = '$pid'");

while($row = mysqli_fetch_array($result)) {
    $com1 = $row['co'];
    $com2 = $row['no'];
    $com3 = $row['no2'];
    $com4 = $row['o3'];
    $com5 = $row['so2'];
    $com6 = $row['pm2_5'];
    $com7 = $row['pm10'];
    $com8 = $row['nh3'];
}

?>

<html>
    <head>
        <title>Waste Management (User Dashboard)</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <style>
        
            ::-webkit-scrollbar {width: 10px; height: 15px;} 
            ::-webkit-scrollbar-thumb {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);}
            
            body {
                background: transparent;
            }
            
        </style>
    </head>
    <body>
        <center>
            <div id="chart_div" style="width: 95%; height: 450px;"></div>
        </center>
        <script>
        
            google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawBasic);
        
            function drawBasic() {
             
            var data = google.visualization.arrayToDataTable([
                ['Air Quality Components', 'Air Quality Index', { role: 'style' }],
                  
                ['Carbon Monoxide', <?php echo $com1; ?>, 'stroke-color: #ff6c91; stroke-opacity: 0.6; stroke-width: 4; fill-color: #ff6c91; fill-opacity: 0.4'],
                ['Nitrogen Monoxide', <?php echo $com2; ?>, 'stroke-color: #de8c00; stroke-opacity: 0.6; stroke-width: 4; fill-color: #de8c00; fill-opacity: 0.4'],
                ['Nitrogen Dioxide', <?php echo $com3; ?>, 'stroke-color: #9da700; stroke-opacity: 0.6; stroke-width: 4; fill-color: #9da700; fill-opacity: 0.4'],
                ['Ozone', <?php echo $com4; ?>, 'stroke-color: #00ba38; stroke-opacity: 0.6; stroke-width: 4; fill-color: #00ba38; fill-opacity: 0.4'],
                ['Sulphur Dioxide', <?php echo $com5; ?>, 'stroke-color: #00c1a9; stroke-opacity: 0.6; stroke-width: 4; fill-color: #00c1a9; fill-opacity: 0.4'],
                ['Fine Particles Matter', <?php echo $com6; ?>, 'stroke-color: #00b4f0; stroke-opacity: 0.6; stroke-width: 4; fill-color: #00b4f0; fill-opacity: 0.4'],
                ['Coarse Particulate Matter', <?php echo $com7; ?>, 'stroke-color: #9f8cff; stroke-opacity: 0.6; stroke-width: 4; fill-color: #9f8cff; fill-opacity: 0.4'],
                ['Ammonia', <?php echo $com8; ?>, 'stroke-color: #f564e3; stroke-opacity: 0.6; stroke-width: 4; fill-color: #f564e3; fill-opacity: 0.4']
            ]);
        
            var options = {
                backgroundColor: {
                    fillOpacity: 0.9,
                },
                legendTextStyle: { color: 'black', },
                chartArea: {width: '50%'},
                hAxis: {
                  title: 'AQI (Air Quality Index)',
                  minValue: 0
                },
                vAxis: {
                  title: 'Air Quality Components'
                },
                bar: {
                    groupWidth: "70%"
                }
            };
        
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
              chart.draw(data, options);
            }
        
        </script>

    </body>
</html>