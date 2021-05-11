<!DOCTYPE html>
<html>
<head>
  <title>Loading</title>
  <link rel="stylesheet" type="text/css" href="loading.css">
     <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
     <script>
         setTimeout(function(){
             
          alert("Your slot is Successfully Booked Pls Come On Your Specified Date And Time To Our Center :)");
          document.getElementById("h").innerHTML = "Registration Successful :)";
             window.location.href = 'print1.php';
         },5500);
      </script>
      <style>
         body {
  background-color: #222;
}
a.effect-underline:after {
  content: '';
  position: absolute;
  left: 0;
  display: inline-block;
  height: 1em;
  width: 100%;
  border-bottom: 1px solid;
  margin-top: 10px;
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  transform: scale(0,1);
}

a.effect-underline:hover:after {
  opacity: 1;
  -webkit-transform: scale(1);
  transform: scale(1);
}
h2 a {
  color: #fff;
  
  text-decoration: none;
  display: inline-block;
  position: relative;
}
a.effect-shine:hover {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
}
@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}

#loading-wrapper {
  position: fixed;
  width: 100%;
  height: 100%;
  left: 0;
  top: 23%;
}

#loading-text {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  color: #999;
  width: 100px;
  height: 30px;
  margin: -7px 0 0 -45px;
  text-align: center;
  font-family: 'PT Sans Narrow', sans-serif;
  font-size: 20px;
}

#loading-content {
  display: block;
  position: relative;
  left: 50%;
  top: 50%;
  width: 170px;
  height: 170px;
  margin: -85px 0 0 -85px;
  border: 3px solid #F00;
}

#loading-content:after {
  content: "";
  position: absolute;
  border: 3px solid #0F0;
  left: 15px;
  right: 15px;
  top: 15px;
  bottom: 15px;
}

#loading-content:before {
  content: "";
  position: absolute;
  border: 3px solid #00F;
  left: 5px;
  right: 5px;
  top: 5px;
  bottom: 5px;
}

#loading-content {
  border: 3px solid transparent;
  border-top-color: #4D658D;
  border-bottom-color: #4D658D;
  border-radius: 50%;
  -webkit-animation: loader 2s linear infinite;
  -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
  animation: loader 2s linear infinite;
}

#loading-content:before {
  border: 3px solid transparent;
  border-top-color: #D4CC6A;
  border-bottom-color: #D4CC6A;
  border-radius: 50%;
  -webkit-animation: loader 3s linear infinite;
    -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
  animation: loader 3s linear infinite;
}

#loading-content:after {
  border: 3px solid transparent;
  border-top-color: #84417C;
  border-bottom-color: #84417C;
  border-radius: 50%;
  -webkit-animation: loader 1.5s linear infinite;
  animation: loader 1.5s linear infinite;
    -moz-animation: loader 2s linear infinite;
  -o-animation: loader 2s linear infinite;
}

@-webkit-keyframes loaders {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes loader {
  0% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

#content-wrapper {
  color: #FFF;
  position: fixed;
  left: 0;
  top: 20px;
  width: 100%;
  height: 100%;
}

#header
{
  width: 800px;
  margin: 0 auto;
  text-align: center;
  height: 100px;
  background-color: #666;
}

#content
{
  width: 800px;
  height: 1000px;
  margin: 0 auto;
  text-align: center;
  background-color: #888;
}
      </style>
</head>
<body>
  <img src="DBMS_logo_final.png" height="150" width="150" style="margin-left: auto;margin-right: auto;display: block;margin-top: 210px;">
  <h2 id="h" align="center" style="color:white;"><a class="effect-shine">We are registering your slot in our Icare Center</a></h2>
<div id="loading-wrapper">
  <div id="loading-text">LOADING</div>
  <div id="loading-content"></div>
</div>
</body>
</html>