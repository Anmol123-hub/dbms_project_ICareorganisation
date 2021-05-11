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

$sqlCount = "SELECT COUNT(*) FROM `pollution_check` WHERE user_id = '$id';";
$re = mysqli_query($conn,$sqlCount);
$count = mysqli_fetch_assoc($re);
$count = $count['COUNT(*)'];

$query1 = mysqli_query($conn,"SELECT date_searched, user_location, p_id FROM pollution_check WHERE user_id = '$id';");

// $query2 = mysqli_query($conn,"SELECT co, no, no2, o3, so2, pm2_5, pm10, nh3 FROM pollution_details WHERE p_id;");

?>

<html>
    <head>
        <title>Waste Management (User Dashboard)</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <script type="text/javascript">
            function showDiv(id,uid) {
                var myFrame = document.getElementById("Iframe");
                myFrame.src = "pollutionChart.php?p_id="+id;
            }
        </script>
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
            
            :root {
              --backgroundColor: rgba(246, 241, 209);
              --colorShadeA: rgb(106, 163, 137);
              --colorShadeB: rgb(121, 186, 156);
              --colorShadeC: rgb(150, 232, 195);
              --colorShadeD: rgb(187, 232, 211);
              --colorShadeE: rgb(205, 255, 232);
            }
            
            .big-button {
              position: relative;
              display: inline-block;
              cursor: pointer;
              outline: none;
              border: 0;
              vertical-align: middle;
              text-decoration: none;
              font-size: 0.9rem;
              font-family: Arial Rounded MT;
              color:var(--colorShadeA);
              font-weight: 700;
              text-transform: uppercase;
              font-family: inherit;
            }
            
            button.big-button {
               padding: 0.2em 1em;
               border: 2px solid var(--colorShadeA);
               border-radius: 1em;
               background: var(--colorShadeE);
               transform-style: preserve-3d;
               transition: all 125ms cubic-bezier(0, 0, 1, 1);
            }
            button.big-button::before {
              position: absolute;
              content: '';
              width: 100%;
              height: 100%;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background: var(--colorShadeC);
              border-radius: inherit;
              box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.25em 0 0 var(--colorShadeA);
              transform: translate3d(0, 0.25em, -1em);
              transition: all 125ms cubic-bezier(0, 0, 1, 1);
            }
            
            
            
            button.big-button:hover::before {
              transform: translate3d(0, 0.25em, -1em);
            }
            
            button.big-button:active {
                        transform: translate(0em, 0.25em);
            }
            
            button.big-button:active::before {
              transform: translate3d(0, 0, -1em);
              
                  box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.25em 0 0 var(--colorShadeB);
            
            }
        </style>
    </head>
    <body>

        <?php if($count == 0) {?>
        <div class="box">
            <p>
                <p style="text-align: center;">You have not seached for any location.</p>
                <p style="text-align: center;">Visit our page to find Air Pollution details !</p>
            </p>
        </div>
        <center>
            <a href="../../Environment Management/pollutionCheck.html" target="_blank">
                <div class="btn" data-title="VISIT NOW">VISIT NOW</div>
            </a>
        </center>
        <?} else {?>
        
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="padding: 10px;">
                    <center>
                        <div class="tableHead"><h4><i class="fas fa-history"></i> Location Search History</h4></div>
                    </center>

                    <div id="table-scroll">
                        <table class="styled-table sortable">
                            <thead>
                                <tr>
                                    <th class="text" style="padding-left:20px;">Sr. No.</th>
                                    <th class="text">Date/Time Searched</th>
                                    <th class="text">Location Searched</th>
                                    <th class="text" style="padding-left:35px;">View Chart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $srNo = 1;
                                    while($row = mysqli_fetch_array($query1)) { 
                                ?>
                                <tr>
                                    <td style="padding-left:30px;"><?php echo $srNo++; ?></td>
                                    <td><?php echo $row['date_searched']; ?></td>
                                    <td><?php echo $row['user_location']; ?></td>
                                    <td><button class="big-button" id="<?php echo $row['p_id']; ?>" onclick="showDiv(this.id,'<?php echo $id ?>')">Click Here</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="padding: 10px; margin-top: 15px;">
                    <center>
                        <div class="tableHead">
                            <h4>Air Quality Index Chart &nbsp<i class="fas fa-chart-bar"></i></h4>
                        </div>
                    </center>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" id="chartDisplay" style="padding: 10px;">
                    <iframe id="Iframe" frameborder="0" height="500px" width="100%"></iframe>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" style="margin-bottom: 50px; padding:10px;">
                    <div class="box" style="margin-top: 0px!important;">
                        <p>
                            <p style="text-align: center;">Visit our Pollution Check page to</p>
                            <p style="text-align: center;">check out real time Air Pollution data <i class="far fa-laugh"></i></p>
                        </p>
                    </div>
                    <center>
                        <a href="../../Environment Management/pollutionCheck.html" target="_blank">
                            <div class="btn" data-title="VISIT NOW">VISIT NOW</div>
                        </a>
                    </center>
                </div>
            </div>
        </div>
        
        <?}?>        
    </body>
</html>