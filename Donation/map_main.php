<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
       <link rel="preconnect" href="https://fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital@1&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Find Our Centers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
    .navbar-custom {
    background-color: #150080;
    border-color: #425766;
    background-image: linear-gradient(360deg,#2300e6 0%,#100357 100%);
    font-size: 20px;
}
#customers {
  font-family: 'Fraunces', serif;
  border-collapse: collapse;
  font-size:20px;
  width: 100%;
}

#customers td, #customers th {
  border: 2px solid #000000;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #000000;}

#customers tr:hover {background-color: #262626;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
body{
    background: #2c3e50;
    
}
.navbar-nav {
    padding-left: 20px;
    padding-right: 20px;
}

.navbar-nav .nav-item {
    padding-left: 5px;
    padding-right: 5px;
}
  
  #map {
  height: 400px;
  width: 100%!important;
  border: 2px solid;
}

table {
  font-size: 12px;
}

#controls {
  -webkit-box-flex: 1 1 140px;
  -ms-flex: 1 1 140px;
  flex: 1 1 140px;
}

#autocomplete {
    position: relative; 
    padding: 6px 2px 6px 0px; 
    border: 2px solid;
    font-size: 15px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 10px;
}

#locationSearchButton {
    color: black;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 0px 6px 0px;
    text-align: center;
    border: 2px solid;
    width: 100px;
    position: relative;
}

#country {
  width: 100%;
}

.placeIcon {
  width: 20px;
  height: 34px;
  margin: 4px;
}

.hotelIcon {
  width: 24px;
  height: 24px;
}

#resultsTable {
  border-collapse: collapse;
  width: 240px;
  border: 2px solid;
  position: relative;
  width: 100%!important;
  height: 400px;
  overflow: auto;
  cursor: pointer;
  padding: 0px;
  display: none;
  /* opacity: 0; */
}


.btn {
  box-sizing: border-box;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: transparent;
  border: 2px solid #e74c3c;
  border-radius: 0.6em;
  color: #e74c3c;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-self: center;
      -ms-flex-item-align: center;
          align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 1.2em 2.8em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
}
.btn:hover, .btn:focus {
  color: #fff;
  outline: 0;
}
.third {
  border-color: #3498db;
  color: #fff;
  box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0 #3498db;
  -webkit-transition: all 150ms ease-in-out;
  transition: all 150ms ease-in-out;
}
.third:hover {
  box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}
#rating {
  font-size: 13px;
  font-family: Arial Unicode MS;
}

 .footer {
  text-align: center;
  padding: 20px;
  background-color: #bcbec4;
  color:#f71919;
    height: 210px;
    margin-top: -10px;
}
p.footer{
    color:#f71919;
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
   background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
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
.headingAboutus{
margin-left:350px;
padding-top: 10px;

font-size: 30px;
font-weight: bold;

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

.container{
    color:white;
}
.iw_table_row {
  height: 18px;
}

.iw_attribute_name {
  font-weight: bold;
  text-align: right;
}

.iw_table_icon {
  text-align: right;
}
      
.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    border-bottom: 3px solid red;
    color: white;
}
    </style>
    <script>
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

  
    $('#txtDate').attr('min', maxDate);
});
  
let map;
let places;
let infoWindow;
let infoWindow1;
let infoWindow2;
let markers = [];
let autocomplete;
var c =0,c1=0,c2=0,m=0;

const countryRestrict = { country: "ind" };
const MARKER_PATH =
  "https://developers.google.com/maps/documentation/javascript/images/marker_green";
const hostnameRegexp = new RegExp("^https?://.+?/");
const countries = {
  ind: {
    center: { lat: 20.5937, lng: 78.9629 },
    zoom: 4.2,
  },
};

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: countries["ind"].zoom,
    center: countries["ind"].center,
   
  });
  const contentString1 =
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h3 id="firstHeading" class="firstHeading">Icare Center- 1</h3>' +
          '<h5 >Our Care Earns Your Smile :)</h5>'+
          '<div id="bodyContent">'+
          "<p><b>These centers can collect your items which you are donating :)</b> " +
          "</div>" +
          "</div>";
          const contentString2 =
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h3 id="firstHeading" class="firstHeading">Icare Center- 2</h3>' +
          '<h5 >Our Care Earns Your Smile :)</h5>'+
          '<div id="bodyContent">'+
          "<p><b>These centers can collect your items which you are donating :)</b> " +
          "</div>" +
          "</div>";
          const contentString3 =
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h3 id="firstHeading" class="firstHeading">Icare Center- 3</h3>' +
          '<h5 >Our Care Earns Your Smile :)</h5>'+
          '<div id="bodyContent">'+
          "<p><b>These centers can collect your items which you are donating :)</b> " +
          "</div>" +
          "</div>";
  infoWindow = new google.maps.InfoWindow({
          content: contentString1,
          maxWidth: 200,
        });
        infoWindow1 = new google.maps.InfoWindow({
          content: contentString2,
          maxWidth: 200,
        });
        infoWindow2 = new google.maps.InfoWindow({
          content: contentString3,
          maxWidth: 200,
        });
  // Create the autocomplete object and associate it with the UI input control.
  // Restrict the search to the default country, and to place type "cities".
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("autocomplete"),
    {
      types: ["(cities)"],
      componentRestrictions: countryRestrict,
    }
  );
  places = new google.maps.places.PlacesService(map);
  autocomplete.addListener("place_changed", onPlaceChanged);
  // Add a DOM event listener to react when the user selects a country.
 
}

// When the user selects a city, get the place details for the city and
// zoom the map in on the city.

function showInfoWindow() {
  const marker = this;
  
      infoWindow.open(map, marker);
     
   c=1;
   m=1;
   var x = document.getElementById("dis");

    x.style.display = "block";
    document.getElementById("center1").innerHTML = "Icare Organisation 1";
    document.getElementById("a").value = "Icare Organisation 1";
}  
function showInfoWindow1() {
  const marker = this;
  
      infoWindow1.open(map, marker);
      
   c1=1;
   m=1;
     var x = document.getElementById("dis");
    x.style.display = "block";
    document.getElementById("center1").innerHTML = "Icare Organisation 2";
   document.getElementById("a").value = "Icare Organisation 2";
} 
function showInfoWindow2() {
  const marker = this;
  
      infoWindow2.open(map, marker);
      
   c2=1;
   m=1;
     var x = document.getElementById("dis");
    x.style.display = "block";
    document.getElementById("center1").innerHTML = "Icare Organisation 3";
  
   document.getElementById("a").value = "Icare Organisation 3";
} 
 var v="";
 var lat,lng;
function onPlaceChanged() {
  
   const place = autocomplete.getPlace();
v = place;
  if (place.geometry && place.geometry.location) {
    map.panTo(place.geometry.location);
    map.setZoom(13);

    // alert(place.geometry.location);

     lat = place.geometry.location.lat();
     lng = place.geometry.location.lng();
    
     const icons = {
          icare: {
            icon: "logo.png",
          },
        };
    
    const features = [
          {
            position: new google.maps.LatLng(lat+0.004, lng+0.014),
            type: "icare",
          },
          {
            position: new google.maps.LatLng(lat-0.013, lng+0.008),
            type: "icare",
          },
          {
            position: new google.maps.LatLng(lat+0.012, lng-0.009),
            type: "icare",
          },
        ];
    
    // Create markers.
        for (let i = 0; i < features.length; i++) {
          markers[i] = new google.maps.Marker({
            position: features[i].position,
             animation: google.maps.Animation.DROP,
            icon: icons[features[i].type].icon,
            map: map,
          });
          
     
        }
        
          google.maps.event.addListener(markers[0], "click", showInfoWindow);
            google.maps.event.addListener(markers[1], "click", showInfoWindow1);
              google.maps.event.addListener(markers[2], "click", showInfoWindow2);
               getLocation();

  } else {
document.getElementById("autocomplete").placeholder = "Enter a city";
  }
}
function getLocation(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition(),showError);
    }
    
}

function showPosition(){
         
    var lat1=lat;
    var lon=lng;
    displayLocation(lat1,lon);
}

function showError(error){
    // switch(error.code){
    //     case error.PERMISSION_DENIED:
    //         x.innerHTML="User denied the request for Geolocation."
    //     break;
    //     case error.POSITION_UNAVAILABLE:
    //         x.innerHTML="Location information is unavailable."
    //     break;
    //     case error.TIMEOUT:
    //         x.innerHTML="The request to get user location timed out."
    //     break;
    //     case error.UNKNOWN_ERROR:
    //         x.innerHTML="An unknown error occurred."
    //     break;
    // }
}

function displayLocation(latitude,longitude){
    
   
    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                    var  value=add.split(",");

                    count=value.length;
                    country=value[count-1];
                    state=value[count-2];
                    city=value[count-3];
               
                  document.getElementById("a1").value = city;
                  
                }
                else  {
                     document.getElementById("a1").value = "address not found";
                }
            }
            else {
                 document.getElementById("a1").value = "Geocoder failed due to: " + status;
            }
        }
    );
}
   
// Set the country restriction based on user input.
// Also center and zoom the map on the given country.
function setAutocompleteCountry() {
    autocomplete.setComponentRestrictions({ country: country });
    map.setCenter(countries[country].center);
    map.setZoom(countries[country].zoom);

  clearResults();
  clearMarkers();
}

function dropMarker(i) {
  return function () {
    markers[i].setMap(map);
  };
}
function check(){
   var dt = document.forms["form1"]["date1"].value;
   if(v == ""){
       alert("Please Enter A City First");
       return false;
   }
   if((c==1&&c1==1&&c2==1)||(m==0)){
       alert("Please Select Any One Center");
       c=0;c1=0;c2=0;
       
       return false;
   }
   if((c==1&&c1==1)||(c==1&&c2==1)||(c1==1&&c2==1)){
       alert("Please Select Any One Center");
       c=0;c1=0;c2=0;
       
       return false;
   }
   if(dt == ""){
       alert("Pls select your date and time");
       return false;
   }
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
<br>
<br><br>
<br>
    <div class="hotel-search" align="center">
      <div id="findhotels" style="color:white;">Find Our Centers Here:</div>

      <div id="locationField">
      <input id="autocomplete" value="<?php echo $_SESSION['address'] ?>" type="text" style="width:500px;" />
      </div>

    </div>
    <br>
    <form name="form1" action="map.php" method="post" onsubmit="return(check())">
    <div id="map"></div>
    <br>
    <input type="hidden" id = "a" name="b" >
     <input type="hidden" id = "a1" name="b1" >
     <div class="container" style="display:none;" id="dis">
         <h2 align="center">Please Choose Date and Time </h2>
     <table border="1" align="center" id="customers">
          <tr>
            <th> Center Name </th>
            <th> Date </th>
            <th> Delivery Time </th>
          </tr>
          <tr>
            <td><p id="center1"></p></td>
            <td> <input type="date" name="date1" id="txtDate" ></td>
           
            <td>
              <select name="type" class="pl1" required>
                <option label="10:00 AM" >10:00 AM</option>
                <option label="12:00 PM">12:00 PM</option>
                <option label="9:00 AM">9:00 AM</option>
                <option label="2:00 PM">2:00 PM</option>
                <option label="11:00 AM">11:00 AM</option>
              </select>
            </td>
          </tr>
          
        </table>
        </div>
        <br>
        
   <button style="margin:auto auto;" type="submit" name="s" value="sub" class="btn third" >Submit</button>
   <button style="margin:auto auto;margin-top:10px;" type="submit" name="s" value="can" class="btn third" >Cancel</button>

   </form>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB1ujwvkFEo87xhHyHhHP52iJ6zMlbB_w&callback=initMap&libraries=places&v=weekly"
      async
    ></script>
    <br><br>
    <footer class="footer">
  <h2>Keep In Touch</h2>
  <hr style="background-color: white;">
  <div class="col-md-12">
    <ul class="social-network social-circle">
      <li><a href="https://www.facebook.com/icareorganisation123" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="https://twitter.com/IcareOrganisat1" target="_blank" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
			<li><a href="https://www.instagram.com/icareorganisation1/" target="_blank" class="icoGoogle" title="Instagram"><i class="fab fa-instagram"></i></a></li>
    </ul>
  </div>
  <br>
  <h5><a style="color: blue;">Copyright ICare © 2019-2022. All Rights Reserved.</a></h5>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>