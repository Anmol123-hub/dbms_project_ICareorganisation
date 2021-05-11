<?php 
session_start();
$email = $_SESSION["email"];
$q=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$l = "SELECT * FROM pay a INNER JOIN rewards_table b ON a.user_id=b.user_id WHERE a.email = '$email';";
$l1 = mysqli_query($q,$l);
while($row = mysqli_fetch_array($l1)){
    $_SESSION["rewards"] = $row["rewards_point"];
    break;
}

 $sql = "SELECT * FROM `pay` where `email` = '$email' ;";
 $re = mysqli_query($q,$sql);
 
 while($row = mysqli_fetch_array($re)){
 	$_SESSION["name"] = $row["name"];
 	$_SESSION["email"] = $row["email"];
 
 	$_SESSION["pcode"] = $row["pcode"];
 	$_SESSION["city"] = $row["city"];
 	$_SESSION["phone"] = $row["phone"];
 	$_SESSION["reason"] = $row["reason"];
 	$_SESSION["id"] = $row["user_id"];
} 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
	<link rel = "icon" href =  "DBMS_logo_final.png" type = "image/x-icon">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
	<style type="text/css">

		body{margin-top:20px;
background:#eee;
}

.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #ddd;
}

.invoice .table tr.line {
	border-bottom: 1px solid #ccc;
}

.invoice .table td {
	border: none;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;
}


.grid {
    position: relative;
	width: 100%;
	background: #fff;
	color: #666666;
	border-radius: 2px;
	margin-bottom: 25px;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
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
	<script>
	    function pl(){
	        window.location.href="donation-homepage.html";
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
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
<br><br><br><br>
<div class="container">
<div class="row">
    				<!-- BEGIN INVOICE -->
					<div class="col-xs-12">
					  <div class="grid invoice">
							<div class="grid-body">
								<div class="invoice-title">
									<div class="row">
										<div class="col-xs-12">
											<img src="DBMS_logo_final.png" alt="" height="100">
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-xs-12">
											<h2>invoice<br>
											<span class="small">Icare Organisation</span></h2>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Billed To:</strong><br>
											<?php echo $_SESSION["name"] ?><br>
											<?php echo $_SESSION["city"] ?>, <?php echo $_SESSION["pcode"]?>
											<br>
											<abbr title="Phone">Phone:</abbr> <?php echo $_SESSION["phone"]; ?>
										</address>
									</div>
									
								</div>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Payment Method:</strong><br>
											By Card<br>
											<?php echo $_SESSION["email"] ?><br>
										</address>
									</div>
									<div class="col-xs-6 text-right">
										<address>
											<strong>Order Date:</strong><br>
											<?php echo date("d/m/Y") ?>
										</address>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>INVOICE SUMMARY</h3>
										<table class="table table-striped">
											<thead>
												<tr class="line">
												    <td><strong>ID</strong></td>
													<td><strong>Name</strong></td>
													<td class="text-center"><strong>EMAIL</strong></td>
													<td class="text-center"><strong>REASON</strong></td>
													<td class="text-right"><strong>PCODE</strong></td>
													<td class="text-right"><strong>CITY</strong></td>
													<td class="text-right"><strong>REWARD POINTS</strong></td>
													<td class="text-right"><strong>MONEY</strong></td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $_SESSION["id"] ?></td>
													<td><?php echo $_SESSION["name"] ?></td>
													<td class="text-center"><?php echo $_SESSION["email"] ?></td>
													<td class="text-center"><?php echo $_SESSION["reason"] ?></td>
													<td class="text-right"><?php echo $_SESSION["pcode"] ?></td>
														<td class="text-right"><?php echo $_SESSION["city"] ?></td>
															<td class="text-right"><?php echo $_SESSION["rewards"] ?></td>
														<td class="text-right">₹<?php echo $_SESSION["money"] ?></td>
												</tr>
											
											
												<tr>
													<td colspan="6"></td>
													<td class="text-right"><strong>Taxes</strong></td>
												
													<td class="text-right"><strong>N/A</strong></td>
												</tr>
												<tr>
													<td colspan="6">
													</td><td class="text-right"><strong>Total</strong></td>
													<td class="text-right"><strong>₹<?php echo $_SESSION["money"] ?></strong></td>
												</tr>
											</tbody>
										</table>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-12 text-right identity">
										<p>Icare Organisation<br><strong>Our Care Earns Your Smile :)</strong></p>
									</div>
								</div>
									<button onclick="window.print()">Print this page <i class="fa fa-print"></i></button> 
										<button onclick="pl()" class="text-right" style="margin-left:715px;" >Continue <i class="fas fa-arrow-circle-right"></i></button> 
							</div>
						</div>
					</div>
					<!-- END INVOICE -->
				</div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</body>
</html>

