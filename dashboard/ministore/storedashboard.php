<?php
session_start();
$q = mysqli_connect("localhost","admin","Anmol12","stteresa_icareorganisation"); 
// $q = mysqli_connect("localhost", "root", "", "mini_store_db");
// $op = $_SESSION["email"];
$email = $_SESSION["email"];
$n = 0;
$id = 0;

$query  = "SELECT * FROM `user_table` WHERE  `email`='$email'";
    $ex  = mysqli_query($q, $query);
    while ($row = mysqli_fetch_array($ex)) {
        $id = $row["user_id"];
        break;
    }
   
$idl = "SELECT * FROM `orders` WHERE `user_id` = '$id'";
$r = mysqli_query($q, $idl);
while ($row = mysqli_fetch_array($r)) {
    $n = $n + 1;
    break;
}

if ($n == 0) {
    echo "<h1 align='center' style='margin-top:200px;'>You haven't placed any order</h1>";
    echo "<h2 align='center' >Please click here to place an order </h2>";
    echo "<br>";
    // echo "<center> <a href = '../../Donation/donation-homepage.html' style='text-decoration:none;' target='_blank' class='btnfos btnfos-1'>
    //   <svg>
    //     <rect x='0' y='0' fill='none' width='100%' height='100%'/>
    //   </svg>
    //  Order Now
    // </a> </center>";

    echo "<center> 
    <a href='../../mini_store/store.html' target='_top' style='text-decoration: none;'><button class='raise' style='border-color: white'; align='center'><span style='color: white';>Order now</span></button></a>
    </center>";
} else {
    $query1 = mysqli_query($q, "SELECT o_id,discount,o_date FROM `orders` WHERE `user_id` = $id");
    echo "<br>";

    echo "<h1 align='center' style='border: white 3px outset;'>  <i class='fas fa-shopping-cart'></i> &nbsp;Your Orders </h1>";
    echo "<br>";
    echo "<div class='table-wrapper' style='overflow-x:auto;'>
	<table align='center' id='orderTable' class='fl-table'>
		<thead>
			<tr data-toggle='tooltip' data-placement='left' title='Select an order to view its details'>
				<th>Order Id</th>
				<th>Discount</th>
				<th>Order Date</th>
			</tr>
		</thead>";

    while ($row1 = mysqli_fetch_array($query1)) {
        echo    "<tbody>";
        echo    "<tr>";
        echo "<td>" . $row1['o_id'] . "</td>";
        echo "<td>" . $row1['discount'] . "</td>";
        echo "<td>" . $row1['o_date'] . "</td>";
        echo    "</tr>";
        echo    "</tbody>";
    }
    echo "</table>
</div>";

    echo "<br>";

    // $currOid = $_POST['currOid'];

    // $query2 = mysqli_query($q, "SELECT p_name,o_qty,o_price FROM `orders_details` WHERE `o_id` = 45");
    // echo "<h1 align='center' >Your order details </h1>";
    // echo "<br>";
    // echo "<div class='container' style='overflow-x:auto;'>
    // 	<table align='center'>
    // 		<thead>
    // 			<tr>
    // 				<th>Product name </th>
    // 				<th>Quantity</th>
    // 				<th>Price</th>
    // 			</tr>
    // 		</thead>";

    // while ($row2 = mysqli_fetch_array($query2)) {
    //     echo    "<tbody>";
    //     echo    "<tr>";
    //     echo "<td>" . $row2['p_name'] . "</td>";
    //     echo "<td>" . $row2['o_qty'] . "</td>";
    //     echo "<td>" . $row2['o_price'] . "</td>";
    //     echo    "</tr>";
    //     echo    "</tbody>";
    // }
    // echo "</table>
    // </div>";

    echo "<div id=\"inject\">
    </div>";

    echo "<br>";
    echo "<center>
    <button  id='card-btn1' class='raise' data-toggle='modal' data-target='#changeCity'>
         <span >Cancel The Order</span>
      <div class='transition'></div>
    </button>
    </center>";
    // echo "<div id='myModal' class='modal'>

    //  <div class='modal-content'>
    //     <span class='close'>&times;</span>
    //     <img align='center' style='margin-left: 43%;' src='../../DBMS_logo_final.png' width=150 height=150> 
    //     <p align='center' style='color:black;'> Enter Your Order number </p>
    //     <form method='post' action='order_cancel.php'>
    //     <input style='margin-left: 35%; width: 30%;' type = 'number' name='ticket' placeholder='Enter The Order no' required class=\"form-control form-control-sm w-25\" />
    //     <br>
    //     <input style='margin-left: 43%;' type='submit' value='CANCEL BOOKING'  class=\"btn btn-outline-danger btn-sm \" >
    //     </form>
    //   </div>
    // </div>";


    echo "<div class='container-modal'>
    <div class='modal fade' id='changeCity' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <h4 class='modal-title' id='myModalLabel'>Order Cancellation</h4>
          </div>
          <div class='modal-body'>
            <form class='form-inline' method='post' action='order_cancel.php'>
               <div class='form-group' >
                 <div class='input-group'>
                   <input type='text' name='ticket' class='form-control form-control-sm' placeholder='Enter order no eg. 786'>
                 </div>
               </div>
               <button id='cityName' type='submit' class='btn btn-outline-danger btn-sm'>CANCEL ORDER</button>
             </form>
          </div>

        </div>
      </div>
    </div>

  </div><!-- /.container -->";

    // echo "<script>

    // var modal = document.getElementById('myModal');

    // var btn = document.getElementById('card-btn1');

    // var span = document.getElementsByClassName('close')[0];

    // btn.onclick = function() {
    //   modal.style.display = 'block';
    // }

    // span.onclick = function() {
    //   modal.style.display = 'none';
    // }

    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //     modal.style.display = 'none';
    //   }
    // }
    // </script>";

    //echo "<br><br><br><hr>";
}

?>
<html>

<head>
    <script src="./storeTable.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load Charts and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Product', 'Quanity ordered'],
                <?php
                //$q = mysqli_connect("localhost", "root", "", "mini_store_db");
                $q = mysqli_connect("localhost", "stteresa_icare", "Aardproject@123", "stteresa_icareorganisation");
                $cs1 = "select o_id from orders where user_id= '$id'";
                $orderIdfetcher = mysqli_query($q, $cs1);
                //$orderIdArray = array();
                while ($row = mysqli_fetch_array($orderIdfetcher)) {
                    $orderIdArray[] = $row["o_id"];
                }
                // print_r($orderIdArray);

                $my_in_value  =  "";
                foreach ($orderIdArray as $key => $value) {
                    if ($my_in_value == "") {
                        $my_in_value =  $value;
                    } else {
                        $my_in_value = $my_in_value . ", " . $value . " ";
                    }
                }

                $cs2 = "Select distinct p_name,sum(o_qty) from orders_details where o_id IN (" . $my_in_value . ") group by p_name";
                // $cs2 = "select * from orders_details";
                $pdeatilsFetcher = mysqli_query($q, $cs2);

                // while ($result = mysqli_fetch_assoc($pdeatilsFetcher)) {
                //     echo "['" . $result['p_name'] . "'," . $result['o_qty'] . "],";
                // }
                while ($result = mysqli_fetch_assoc($pdeatilsFetcher)) {
                    echo "['" . $result['p_name'] . "'," . $result['sum(o_qty)'] . "],";
                }
                ?>
            ]);

            var options = {
                backgroundColor: 'transparent',
                title: 'Your Order history',
                is3D: true,
                titleTextStyle: {
                    color: '#FFF'
                },
                legendTextStyle: {
                    color: '#FFF'
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
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

        body {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            background: rgba(71, 147, 227, 1);
            color: white;
        }

        .pie-chart-con {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
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


        .btn10 {
            padding: 15px 100px;
            margin: 10px 4px;
            color: #fff;
            font-family: sans-serif;
            text-transform: uppercase;
            text-align: center;
            position: relative;
            text-decoration: none;
            display: inline-block;
        }

        .btn10 {
            top: 40px;
            font-family: "proxima-nova", sans-serif;
            font-weight: 500;
            font-size: 13px;
            text-transform: uppercase !important;
            letter-spacing: 2px;
            color: #fff;
            cursor: hand;
            text-align: center;
            text-transform: capitalize;
            border: 1px solid #fff;
            border-radius: 50px;
            position: relative;
            overflow: hidden !important;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            background: transparent !important;
            z-index: 10;

        }


        .btn10:hover {
            border: 1px solid #071982;
            color: #80ffd3 !important;
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
            box-shadow: 2px 0px 14px rgba(0, 0, 0, .6);
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
            -webkit-transition: all .94s cubic-bezier(.2, .95, .57, .99);
            -moz-transition: all .4s cubic-bezier(.2, .95, .57, .99);
            -o-transition: all .4s cubic-bezier(.2, .95, .57, .99);
            transition: all .4s cubic-bezier(.2, .95, .57, .99);
            box-shadow: 2px 0px 14px rgba(0, 0, 0, .6);
        }

        .btn10:hover::before,
        .btn1O:hover::before {
            opacity: 1;
            width: 116%;
        }

        .btn10:hover::after,
        .btn1O:hover::after {
            opacity: 1;
            width: 120%;
        }

        .transition {
            position: absolute;
            top: -10%;
            left: 0%;
            width: 100%;
            height: 0%;
            background: #80ffd3;
            z-index: -1;
            /*     -ms-transform: skewX(-50deg); 
    -webkit-transform: skewX(-50deg); 
    transform: skewX(-50deg); */
        }

        html,
        body {
            height: 100%;
        }

        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            color: black;
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 17px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }

        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }


        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }

            .fl-table thead th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
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
            cursor: pointer;
        }

        tr:hover {
            background-color: lightblue;
            cursor: pointer;
        }

        .raise:hover,
        .raise:focus {
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
            transform: translateY(-0.25em);
        }

        button {
            color: var(--color);
            transition: 0.25s;
            background: none;
            border: 2px solid;
            font: inherit;
            line-height: 1;
            margin: 0.5em;
            padding: 1em 2em;
        }


        button:hover,
        button:focus {
            border-color: var(--hover);
            color: #fff;
        }

        .container-modal {
            margin-top: 15%;
        }

        /* Modal buttons */
        /* .btn {
            background-color: teal;
            border: solid 2px orange;
            color: orange;
        }

        .btn:hover,
        .btn:focus {
            background-color: orange;
            color: teal;
            border: none;
        }

        .location {
            font-size: 2em;
            margin-top: 10%;
        } */

        #myModalLabel {
            display: inline;
            width: 100%;
            text-align: center;
            color: #324960;
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

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);


            a.document.write('</body><div align="center"><button align="center" style="margin-top:20px;"onclick="window.print()"><span>Print</span></button></div></html>');
            a.document.close();
            // a.print();
        }

        document.getElementById('myButton').onclick = function() {
            window.location.href = '../../mini_store/store.html';
        };
    </script>
    </script>
</head>

<body>

    <!--Table and divs that hold the pie charts-->
    <center>
        <div class="container" style='overflow-x:auto;' id="print">
            <table <?php if ($n == 0) echo "style='display: none;'";
                    else echo " display:block;'"; ?>>
                <td>
                    <div class='pie-chart-con'>
                        <div <?php if ($n == 0) echo "style='display: none;'";
                                else echo "style='width: 800px; height:370px; display:block;color:white;'"; ?> id="piechart_3d"></div>
                    </div>
            </table>
            <!-- <div id="piechart_3d" style="width: 900px; height: 500px;"></div> -->
        </div>
    </center>

    <br>
    <center>
        <div <?php if ($n == 0) echo "style='display: none;'";
                else echo "style=' display:block'"; ?>><button class='raise' onclick="printDiv()">Export in PDF</button>
            <div class='transition'></div>
            </a>
        </div>
    </center>

</body>

</html>