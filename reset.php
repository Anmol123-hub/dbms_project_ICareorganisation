
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=RocknRoll+One&display=swap" rel="stylesheet">
       
    <link rel = "icon" href =  
"DBMS_logo_final.png" 
        type = "image/x-icon"> 
    <!-- jQuery -->


    <title>Reset</title>
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: 'RocknRoll One', sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}

.box {
    width: 500px;
    padding: 40px;
    padding-bottom: 20px;
    position: relative;
    /*top: 50%;*/
    left: 25%;
    background: #191919;
    text-align: center;
    transition: 0.25s;
    margin-top: 50px;
    margin-bottom: 40px;
}


@media only screen and (max-width: 1200px) {
  .box {
    zoom:1.5;
    margin: 40px 10px 40px -30px;
    left:0%;
  }
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}

ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network li {
    display: inline;
    margin: 0 5px
}

.social-network a.icoFacebook:hover {
    background-color: #3B5998
}

.social-network a.icoTwitter:hover {
    background-color: #33ccff
}

.social-network a.icoGoogle:hover {
    background-color: #BD3518
}

.social-network a.icoFacebook:hover i,
.social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i {
    color: #fff
}

a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}

.social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle li a:hover i,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle i {
    color: #fff;
    transition: all 0.8s;
    transition: all 0.8s
}


    </style>
        <script>
        function viewPswd() {
            var x = document.getElementById("password-field");
            var y = document.getElementById("password-field1");
            if (x.type === "password" || y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
            function UncheckAll(){ 
      var w = document.getElementsByTagName('input'); 
      for(var i = 0; i < w.length; i++){ 
        if(w[i].type=='checkbox'){ 
          w[i].checked = false; 
        }
      }
  } 
    </script>
  </head>
  <body onload = "UncheckAll();">


    <div class="container">
      <div class="col-md-12 col-lg-12">
              <form class="box" action = "reset1.php" method="post">
                  <center style="border:3px solid silver; padding:10px;">
                    <img src="DBMS_logo_final.png" height="30%" width="30%" />
                    <h5 class="text-muted">ICare Organisation</h5>
                  </center><br>
                  <h1>Password Reset</h1>
                  <p class="text-muted"> Please enter your Password </p> <input type="password" name="pass1" id="password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" placeholder="Password" required> 
                
                  <p></p>
                  <input type="password" name="pass2" id="password-field1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" placeholder="Password Again" required>
              <input type="checkbox" id="password-view" onclick="viewPswd()"> <label class="text-muted" for="password-view">&nbsp; View Password</label>
                  <p></p>
              <input type="submit" name="" value="Reset">
              </form>
              </div>
</div>

    </body>

</html>
