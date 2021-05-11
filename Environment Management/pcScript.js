var flag = 0;
var co, no, no2, o3, so2, pm2_5, pm10, nh3, loc;

function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 20.5937, lng: 78.9629 },
      zoom: 4.2,
    });
    const input = document.getElementById("autocomplete");
    
    const options = {
      componentRestrictions: { country: "IN" },
      fields: ["formatted_address", "geometry", "name"],
      origin: map.getCenter(),
      strictBounds: false,
      types: ["establishment"],
    };
    
    const autocomplete = new google.maps.places.Autocomplete(
      input,
      options
    );
    
    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
    infowindow.setContent(infowindowContent);
    const marker = new google.maps.Marker({
      map,
      anchorPoint: new google.maps.Point(0, -29),
    });
    autocomplete.addListener("place_changed", () => {
      infowindow.close();
      marker.setVisible(false);
      const place = autocomplete.getPlace();

      if (!place.geometry || !place.geometry.location) {
        window.alert(
          "No details available for input: '" + place.name + "'"
        );
        return;
      } else {
        flag = 1;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(15);
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      infowindowContent.children["place-name"].textContent = place.name;
      infowindowContent.children["place-address"].textContent = place.formatted_address;
      infowindow.open(map, marker);

      var latitude = place.geometry.location.lat();
      var longitude = place.geometry.location.lng();


      // Use 'fetch' to get data (json format)

      var url = 'https://api.openweathermap.org/data/2.5/air_pollution?lat='+latitude+'&lon='+longitude+'&appid=947fd602a09a38d64a4913eb1d1d6f8a';

      // var co, no, no2, o3, so2, pm2_5, pm10, nh3, 
      
      loc = place.name;

      fetch(url)
      .then(response => response.json())
      .then(data => {
        co = data['list'][0]['components']['co'];
        no = data['list'][0]['components']['no'];
        no2 = data['list'][0]['components']['no2'];
        o3 = data['list'][0]['components']['o3'];
        so2 = data['list'][0]['components']['so2'];
        pm2_5 = data['list'][0]['components']['pm2_5'];
        pm10 = data['list'][0]['components']['pm10'];
        nh3 = data['list'][0]['components']['nh3'];

        document.getElementById("co").innerHTML = co;
        document.getElementById("no").innerHTML = no;
        document.getElementById("no2").innerHTML= no2;
        document.getElementById("o3").innerHTML = o3;
        document.getElementById("so2").innerHTML = so2;
        document.getElementById("pm2_5").innerHTML = pm2_5;
        document.getElementById("pm10").innerHTML = pm10;
        document.getElementById("nh3").innerHTML = nh3;

        // XMPHttpRequest using GET Method

        xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            alert(xmlhttp.responseText);
          }
        }
    
        // xmlHttp.open("GET","pcData.php?co="+co,true);
        xmlhttp.open("GET","pcData.php?arr[co]="+co+"&arr[no]="+no+"&arr[no2]="+no2+"&arr[o3]="+o3+"&arr[so2]="+so2+"&arr[pm2_5]="+pm2_5+"&arr[pm10]="+pm10+"&arr[nh3]="+nh3+"&arr[loc]="+loc,true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();

      })
      .catch(err => alert("Something Went Wrong! Please Try Again"));

    });
}

function clickHere() {
  if(flag === 0) {
    alert("Please search for a place");
    return;
  }
  else if(flag === 1) {
    document.getElementById("mailDataForm").style = "display: inline";
  }
}

function sendMail() {
  if(flag == 1) {
    var email = document.getElementById("typeMail").value;
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if(!email.match(mailformat)) {
      alert("Please enter valid email !");
    }
    else {

      // XMPHttpRequest using GET Method

      xmlhttp = new XMLHttpRequest();
        
      xmlhttp.onreadystatechange = function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          alert(xmlhttp.responseText);
        }
      }

      // xmlHttp.open("GET","pcData.php?co="+co,true);
      xmlhttp.open("GET","pcMail.php?arr[co]="+co+"&arr[no]="+no+"&arr[no2]="+no2+"&arr[o3]="+o3+"&arr[so2]="+so2+"&arr[pm2_5]="+pm2_5+"&arr[pm10]="+pm10+"&arr[nh3]="+nh3+"&arr[loc]="+loc+"&arr[email]="+email,true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      
    //   location.reload(true);
        document.getElementById("typeMail").value = "";
        document.getElementById("mailDataForm").style = "display: none";

    }

  }
  else {
    alert("Please search for a place");
    return;
  }
}


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}