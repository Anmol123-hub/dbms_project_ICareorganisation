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
    $usr = $r["username"];
    break;
}

$flag = 0;

$file_pointer = '../../Environment Management/XML Data/' . $id . '. ' . $usr . '.xml';
if(file_exists($file_pointer))
    $flag = 1;
else
    $flag = 0;

$sqlCount = "SELECT COUNT(*) FROM `waste_mgmt` WHERE user_id = '$id';";
$re = mysqli_query($conn,$sqlCount);
$count = mysqli_fetch_assoc($re);
$count = $count['COUNT(*)'];

$query1 = mysqli_query($conn,"SELECT date_searched, item_qty FROM `waste_mgmt` WHERE `user_id` = '$id';");

$query2 = mysqli_query($conn,"select automotive, electronics, glass, metal, paper, plastic, hazardous, organic_waste from waste_details where w_id IN (select w_id from waste_mgmt where user_id = '$id');");

$query3 = mysqli_query($conn,"select automotive, electronics, glass, metal, paper, plastic, hazardous, organic_waste from waste_details where w_id IN (select w_id from waste_mgmt where user_id = '$id');");

$cat1 = 0; $cat2 = 0; $cat3 = 0; $cat4 = 0; $cat5 = 0; $cat6 = 0; $cat7 = 0; $cat8 = 0;

while($row = mysqli_fetch_array($query2)) {
    if($row['automotive'])
        $cat1 += count($array = explode(',', $row['automotive']));
    if($row['electronics'])
        $cat2 += count($array = explode(',', $row['electronics']));
    if($row['glass'])
        $cat3 += count($array = explode(',', $row['glass']));
    if($row['metal'])
        $cat4 += count($array = explode(',', $row['metal']));
    if($row['paper'])
        $cat5 += count($array = explode(',', $row['paper']));
    if($row['plastic'])
        $cat6 += count($array = explode(',', $row['plastic']));
    if($row['hazardous'])
        $cat7 += count($array = explode(',', $row['hazardous']));
    if($row['organic_waste'])
        $cat8 += count($array = explode(',', $row['organic_waste']));
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
                background: #3494E6;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #EC6EAD, #3494E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            
            @media only screen and (max-width: 1100px) {
                #scrollChart {
                    overflow-x: scroll!important;
                }
            }
            
            .box {
              font-size: 3vw;
              font-family: Arial Rounded Mt;
              width: 70%;
              color: white;
              padding: 15px;
              text-align: justify;
                background: #FC466B;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #3F5EFB, #FC466B);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #3F5EFB, #FC466B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
              margin-top: 80px!important;
              margin: 40px auto;
              border-radius: 50px 0px 50px 0px;
            }
            
            .btn {
                font-family: Arial Rounded Mt;
              display: inline-block;
              vertical-align: middle;
              font-size: 30px;
              font-weight: bold;
            }
            .btn,
            .btn:before,
            .btn:after {
              cursor: pointer;
              padding: 0.5em 2em;
              display: inline-block;
              background-color: rgba(127, 157, 181, 0.6);
              color: #fff;
              border-radius: 6px;
              position: relative;
              -webkit-transition: all 0.3s cubic-bezier(0.3, 0, 0.3, 1);
              transition: all 0.5s cubic-bezier(0.5, 0, 0.5, 1);
              box-shadow: 0 0 0 rgba(0,0,0,0);
            }
            
            .btn:before,
            .btn:after {
              position: absolute;
              content: attr(data-title);
              z-index: -1;
            }
            
            .btn:before {
              top: -0.1em;
              right: -0.1em;
              background-color: rgba(255, 0, 0, 0.5);
            }
            
            .btn:after {
              bottom: -0.1em;
              left: -0.1em;
              background-color: rgba(0, 0, 255, 0.5);
            }
            
            .btn:hover {
              background-color: rgba(127, 157, 181, 0.6);
              box-shadow: 0.05em 0.05em 0.1em rgba(0,0,0,0.5); 
              color: honeydew;
            }
            
            .btn:hover:before {
              top: 0;
              right: 0;
            }
            .btn:hover:after {
              bottom: 0;
              left: 0;
            }

            .styled-table {
                border-collapse: collapse;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 100%;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                border-radius: 3px;
            }
            
            .styled-table thead tr {
                background-color: #FC466B;
                color: #ffffff;
                text-align: left;
            }
            
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }
            
            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }
            
            .styled-table tbody tr:nth-of-type(even) {
                background: #d9a7c7;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #fffcdc, #d9a7c7);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #fffcdc, #d9a7c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            
            .styled-table tbody tr:nth-of-type(odd) {
                background: #FFEFBA;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #FFFFFF, #FFEFBA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            
            .styled-table tbody tr:last-of-type {
                border-bottom: 4px solid #FC466B;
            }
            
            .styled-table tbody td:nth-child(1) {
                font-weight: bold;
                color: #009879;
            }
            
            .styled-table tbody td:nth-child(n){
                font-weight: bold;
            }
            
            .tableHead {
                text-align:center; background: #667db6; 
                background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); 
                background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); 
                padding: 6px 0px 0.1px 0px; 
                margin-bottom: 9px;
                border-radius: 3px;
                font-family: Arial Rounded MT;
            }
            
            #table-wrapper {
              position:relative;
            }
            #table-scroll {
              height: 250px;
              overflow: auto;
            }
            #table-wrapper table {
              width: 100%;
            }
            #table-wrapper table thead th .text {
              position: absolute;
            }
            
            h4 {
                color: honeydew;
            }
        </style>
    </head>
    <body>

        <?php if($count == 0) {?>
        <div class="box">
            <p>
                <p style="text-align: center;">You have not recycled any waste.</p>
                <p style="text-align: center;">Visit our page to recycle your waste !</p>
            </p>
        </div>
        <center>
            <a href="../../Environment Management/wasteManagement.html" target="_blank">
                <div class="btn" data-title="RECYCLE">RECYCLE</div>
            </a>
        </center>
        <?} else {?>
        
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12" style="padding: 10px;">
                    <div class="tableHead"><h4><i class="fas fa-history"></i> RECYCLE HISTORY</h4></div>
                    <div id="table-scroll">
                        <table class="styled-table sortable">
                            <thead>
                                <tr>
                                    <th class="text">Date Recycled</th>
                                    <th class="text">Item Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                    				while($row = mysqli_fetch_array($query1)) {
                    			?>
                                <tr>
                                    <td><?php echo $row['date_searched']; ?></td>
                                    <td><?php echo $row['item_qty'] . ' items'; ?></td>
                                </tr>
                                <?php
                					}
                			    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="scrollChart" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12">
                    <div id="piechart_3d" style="width: 800px; height: 440px; margin:-45px 0px 0px -130px;"></div>
                </div>
                <script type="text/javascript">
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Waste Category', 'Waste Items'],
                      ['Automotive', <?php echo $cat1 ?>],
                      ['Electronics', <?php echo $cat2 ?>],
                      ['Glass', <?php echo $cat3 ?>],
                      ['Metal', <?php echo $cat4 ?>],
                      ['Paper', <?php echo $cat5 ?>],
                      ['Plastic', <?php echo $cat6 ?>],
                      ['Hazardous', <?php echo $cat7 ?>],
                      ['Organic Waste', <?php echo $cat8 ?>]
                    ]);
            
                    var options = {
                        backgroundColor: {
                            fillOpacity: 0,
                        },
                        legendTextStyle: { color: '#FFF', },
                        is3D: true,
                    };
            
                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                  }
                </script>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="margin-top: -25px; padding:10px;">
                    <center>
                        <div class="tableHead"><h4><i class="fas fa-recycle"></i> Waste Items Recycled</h4></div>
                    </center>

                    <div id="table-scroll">
                        <table class="styled-table sortable" style="width:148%;">
                            <thead>
                                <tr>
                                    <th class="text" style="">Automotive</th>
                                    <th class="text" style="">Electronics</th>
                                    <th class="text" style="">Glass</th>
                                    <th class="text" style="">Metal</th>
                                    <th class="text" style="">Paper</th>
                                    <th class="text" style="">Plastic</th>
                                    <th class="text" style="">Hazardous</th>
                                    <th class="text" style="">Organic Waste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_array($query3)) { ?>
                                <tr>
                                    <td style="color:#212529;"><?php echo $row['automotive']; ?></td>
                                    <td style=""><?php echo $row['electronics']; ?></td>
                                    <td style=""><?php echo $row['glass']; ?></td>
                                    <td style=""><?php echo $row['metal']; ?></td>
                                    <td style=""><?php echo $row['paper']; ?></td>
                                    <td style=""><?php echo $row['plastic']; ?></td>
                                    <td style=""><?php echo $row['hazardous']; ?></td>
                                    <td style=""><?php echo $row['organic_waste']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="margin-top: 45px; padding:10px;">
                    <center>
                        <div class="tableHead"><h4><i class="far fa-address-card"></i> Scrap Dealers You Contacted</h4></div>
                    </center>

                    <div id="table-scroll">
                        <table class="styled-table sortable" style="width:145%;">
                            <thead>
                                <tr>
                                    <th class="text" style="">Date Contacted</th>
                                    <th class="text" style="">Dealer Name</th>
                                    <th class="text" style="">Dealer Number</th>
                                    <th class="text" style="">Business Website</th>
                                    <th class="text" style="">Rating</th>
                                    <th class="text" style="">Business Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($flag == 1) { 
                                    $xmldata = simplexml_load_file($file_pointer);
                                    foreach($xmldata->children() as $empl) {
                                ?>
                                
                                <tr>
                                    <td style="color:#212529;"><?php echo $empl->date; ?></td>
                                    <td><?php echo $empl->name; ?></td>
                                    <td><?php echo $empl->telephone; ?></td>
                                    <td><?php echo $empl->website; ?></td>
                                    <td><?php echo $empl->rating; ?></td>
                                    <td><?php echo $empl->address; ?></td>
                                </tr>
                                
                                <?php 
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="margin-bottom: 50px; padding:10px;">
                    <div class="box" style="margin-top: 40px!important;">
                        <p>
                            <p style="text-align: center;">Visit our Waste Management page</p>
                            <p style="text-align: center;">to recycle more waste <i class="far fa-laugh"></i></p>
                        </p>
                    </div>
                    <center>
                        <a href="../../Environment Management/wasteManagement.html" target="_blank">
                            <div class="btn" data-title="VISIT NOW">VISIT NOW</div>
                        </a>
                    </center>
                </div>
            </div>
        </div>
        
        <?}?>        
    </body>
</html>