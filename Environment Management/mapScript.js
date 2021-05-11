// This example uses the autocomplete feature of the Google Places API.
// It allows the user to find all hotels in a given place, within a given
// country. It then displays markers for all the hotels returned,
// with on-click details for each hotel.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var count = 0;

let map;
let places;
let infoWindow;
let markers = [];
let autocomplete;
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
    panControl: true,
    zoomControl: true,
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true,
  });
  
  infoWindow = new google.maps.InfoWindow({
    content: document.getElementById("info-content"),
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
    marker.addListener("click", toggleBounce);
}

// When the user selects a city, get the place details for the city and
// zoom the map in on the city.
function onPlaceChanged() {
  
  const place = autocomplete.getPlace();

  if (place.geometry && place.geometry.location) {
    map.panTo(place.geometry.location);
    map.setZoom(12);

    // alert(place.geometry.location);

    clearResults();
    clearMarkers();

    var items = document.querySelectorAll(".wasteListItemContainer.active");
    var res="";
    items.forEach(i => res += i.textContent);
    // document.getElementById('listItems').innerHTML = res;
    
    if(res == "") {
      alert("Please Select Your Waste to Recycle !");
      document.getElementById("autocomplete").value = "";
      return 0;
    }
    
    search();
    displayTable();

  } else {
    document.getElementById("autocomplete").placeholder = "Enter a city";
  }
}

// Display List of Scrap Dealers
function displayTable() {
  
  var items = document.querySelectorAll(".wasteListItemContainer.active");
    document.getElementById("resultsTable").style = "display: block";
    document.getElementById("recyclingLocation").style = "display: block";

    var itemName = "";
    var itemQty = items.length;
    var automotive = "";
    var electronics = "";
    var glass = "";
    var metal = "";
    var paper = "";
    var plastic = "";
    var hazardous = "";
    var organicWaste = "";

    for(i=0; i<itemQty; i++) {
      
      itemName = items[i].innerHTML;
      itemName = itemName.trim();
      
      if(itemName == "Agricultural Used Motor Oil" || itemName == "Antifreeze" || itemName == "Automobile Parts" || itemName == "Automotive Bumpers" || itemName == "Brake Fluid" || itemName == "Car" || itemName == "Catalytic Converters" || itemName == "Gasoline and Unwanted Fuels" || itemName == "Lead Acid (Pb) Batteries" || itemName == "Miscellaneous Tools" || itemName == "Motors" || itemName == "Oil Filters" || itemName == "Radiators" || itemName == "Transmission Fluid" || itemName == "Used Motor Oil" || itemName == "Used Tires") {
        automotive += itemName + ", ";
      }

      if(itemName == "Cameras"  || itemName == "Computers / Laptops / Mobile Phones" || itemName == "DVD/CD Players" || itemName == "Electrical Home and Garden Tools" || itemName == "Electric Cooker / Oven / Microvave" || itemName == "Electronic Toys and Games" || itemName == "Energy-Saving Light Bulbs" || itemName == "Fridge and Freezers" || itemName == "Hairdryers and Electric Toothbrushes" || itemName == "Routers / Set Top Boxes" || itemName == "Table Lamps" || itemName == "Telephones / fax" || itemName == "Toasters, kettles and vacuums" || itemName == "Televisions" || itemName == "Washing Machines and Dryers" || itemName == "Hi-fi") {
        electronics += itemName + ", ";
      }

      if(itemName == "Pickle / Baby Food Jar" || itemName == "Perfume Bottles" || itemName == "Wine / Beer Bottles" || itemName == "Ketchup / Beverage Bottles" || itemName == "Condiment Jars and Bottles" || itemName == "Light Bulbs / Fluorescent Lighting" || itemName == "Drinking / Wine Glasses" || itemName == "Cups / Plates" || itemName == "Mirrors / Art Glass" || itemName == "Decorative Vases" || itemName == "Window Glass / Sliding Glass Doors" || itemName == "Eyeglasses") {
        glass += itemName + ", ";
      }

      if(itemName == "Aerosol Spray Cans" || itemName == "Aluminium / Tin / Steel Cans" || itemName == "Bike Parts" || itemName == "Clothes Hangers (Metal)" || itemName == "Ferrous Metals (Steel or Iron)" || itemName == "High-Temp Alloys" || itemName == "Jewelry" || itemName == "Keys" || itemName == "Large Household Appliances" || itemName == "Non-ferrous (Copper/Brass/Tin)" || itemName == "Office Furniture" || itemName == "Portable Metal Sewing Machine" || itemName == "Propane Tanks" || itemName == "Scrap Metal" || itemName == "Special Metals" || itemName == "Wire") {
        metal += itemName + ", ";
      }

      if(itemName == "Blueprints" || itemName == "Book Recycle" || itemName == "Brown Paper Bags" || itemName == "Cardboard" || itemName == "Catalogs" || itemName == "Computer Paper" || itemName == "Documents to Shred" || itemName == "Drink Boxes" || itemName == "Gift Boxes" || itemName == "Soiled Paper" || itemName == "Greeting Cards" || itemName == "Hot Cereeal Pouches" || itemName == "Magazines" || itemName == "Milk Cartons" || itemName == "Newspaper" || itemName == "Paper Cups" || itemName == "Paperboard" || itemName == "Window Envelopes" || itemName == "Shredded Paper" || itemName == "Unused Paper") {
        paper += itemName + ", ";
      }

      if(itemName == "Plastic Cups" || itemName == "Air Care Packaging" || itemName == "Athenos Packaging" || itemName == "Food Pouches" || itemName == "Bubble Wrap" || itemName == "CD/DVD/Blu-Ray/UHD Cases" || itemName == "Cereal Bags" || itemName == "Dairy Tubs" || itemName == "Laundry Pouches" || itemName == "Extruded Polystyrene" || itemName == "Fishing Line" || itemName == "Gift Cards" || itemName == "Glue Bottles and Glue Sticks" || itemName == "LEGOs" || itemName == "Lunch Kits" || itemName == "Medication Containers" || itemName == "Nespresso Capsules" || itemName == "Personal Care Packaging" || itemName == "Plant Trays, Pots and Tags" || itemName == "Plastic Bottle Caps" || itemName == "Rigid Plastics" || itemName == "Tooth Care Packaging" || itemName == "Water Filters" || itemName == "Yoga Mats") {
        plastic += itemName + ", ";
      }

      if(itemName == "Asbestos" || itemName == "Compact Fluorescent Lamp/Tubes" || itemName == "Degreasers" || itemName == "Dental Amalgam" || itemName == "Fertilizer" || itemName == "Fire Extinguishers" || itemName == "Fungicides" || itemName == "Glue and Adhesives" || itemName == "Herbicides / Pesticides / Insecticides"  || itemName == "Household Cleaners" || itemName == "Lead Paint Chips" || itemName == "Medical Waste" || itemName == "Mercury Containing Items" || itemName == "Needles / Medical Sharps" || itemName == "Solvents" || itemName == "Pool Chemicals") {
        hazardous += itemName + ", ";
      }

      if(itemName == "Brush" || itemName == "Compostable Plastic" || itemName == "Cut Flowers" || itemName == "Food Scraps" || itemName == "Grass Clippings" || itemName == "Hair" || itemName == "Hay" || itemName == "Leaves" || itemName == "Manure" || itemName == "Organic Waste" || itemName == "Spent Mushroom Substrate" || itemName == "Stumps" || itemName == "Tree Trimmings" || itemName == "Weeds" || itemName == "Wood Chips" || itemName == "Yard Waste") {
        organicWaste += itemName + ", ";
      }

    }

    automotive = automotive.slice(0, -2);
    electronics = electronics.slice(0, -2);
    glass = glass.slice(0, -2);
    metal = metal.slice(0, -2);
    paper = paper.slice(0, -2);
    plastic = plastic.slice(0, -2);
    hazardous = hazardous.slice(0, -2);
    organicWaste = organicWaste.slice(0, -2);
    
    // XMPHttpRequest using GET Method

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        alert(xmlhttp.responseText);
      }
    }
    
    if(count === 0) {
        xmlhttp.open("GET","wmScrapList.php?itemQty="+itemQty+"&automotive="+automotive+"&electronics="+electronics+"&glass="+glass+"&metal="+metal+"&paper="+paper+"&plastic="+plastic+"&hazardous="+hazardous+"&organicWaste="+organicWaste,true);
        xmlhttp.send();
    }
    else {
        xmlhttp.open("GET","wmScrapUpdate.php?itemQty="+itemQty+"&automotive="+automotive+"&electronics="+electronics+"&glass="+glass+"&metal="+metal+"&paper="+paper+"&plastic="+plastic+"&hazardous="+hazardous+"&organicWaste="+organicWaste,true);
        xmlhttp.send();
    }

}


function search() {

  const search = {
    bounds: map.getBounds(),
    keyword: "scrap dealer",
  };

  places.nearbySearch(search, (results, status, pagination) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
        
        count++;

      // Create a marker for each hotel found, and
      // assign a letter of the alphabetic to each marker icon.
      for (let i = 0; i < results.length; i++) {
        const markerLetter = String.fromCharCode("A".charCodeAt(0) + (i % 26));
        const markerIcon = MARKER_PATH + markerLetter + ".png";
        // Use marker animation to drop the icons incrementally on the map.
        markers[i] = new google.maps.Marker({
          position: results[i].geometry.location,
          animation: google.maps.Animation.DROP,
          icon: markerIcon,
        });
        // If the user clicks a hotel marker, show the details of that hotel
        // in an info window.
        markers[i].placeResult = results[i];
        google.maps.event.addListener(markers[i], "click", showInfoWindow);
        setTimeout(dropMarker(i), i * 100);
        addResult(results[i], i);
      }
    }
  });
}

function clearResults() {
  const results = document.getElementById("results");

  while (results.childNodes[0]) {
    results.removeChild(results.childNodes[0]);
  }
}

function clearMarkers() {
  for (let i = 0; i < markers.length; i++) {
    if (markers[i]) {
      markers[i].setMap(null);
    }
  }
  markers = [];
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

function addResult(result, i) {
  const results = document.getElementById("results");
  const markerLetter = String.fromCharCode("A".charCodeAt(0) + (i % 26));
  const markerIcon = MARKER_PATH + markerLetter + ".png";
  const tr = document.createElement("tr");
  tr.style.backgroundColor = i % 2 === 0 ? "#F0F0F0" : "#FFFFFF";

  tr.onclick = function () {
    google.maps.event.trigger(markers[i], "click");
  };
  const iconTd = document.createElement("td");
  const nameTd = document.createElement("td");
  const icon = document.createElement("img");
  icon.src = markerIcon;
  icon.setAttribute("class", "placeIcon");
  icon.setAttribute("className", "placeIcon");
  const name = document.createTextNode(result.name);
  iconTd.appendChild(icon);
  nameTd.appendChild(name);
  tr.appendChild(iconTd);
  tr.appendChild(nameTd);
  results.appendChild(tr);
}


// Get the place details for a scrap dealers. Show the information in an info window,
// anchored on the marker for the scrap dealers that the user selected.
function showInfoWindow() {
  const marker = this;
  places.getDetails(
    { placeId: marker.placeResult.place_id },
    (place, status) => {
      if (status !== google.maps.places.PlacesServiceStatus.OK) {
        return;
      }
      infoWindow.open(map, marker);
      buildIWContent(place);
    }
  );
}

// Load the place information into the HTML elements used by the info window.
function buildIWContent(place) {
  document.getElementById("iw-icon").innerHTML =
    '<img class="hotelIcon" ' + 'src="images/DBMS_logo_final.ico"/>';
  document.getElementById("iw-url").innerHTML =
    '<b><a href="' + place.url + '">' + place.name + "</a></b>";
  document.getElementById("iw-address").textContent = place.vicinity;

  if (place.formatted_phone_number) {
    document.getElementById("iw-phone-row").style.display = "";
    document.getElementById("iw-phone").textContent = place.formatted_phone_number;
    document.getElementById("dTelephone").style.color = "black";
    document.getElementById("dTelephone").value = place.formatted_phone_number;
  } else {
    document.getElementById("iw-phone-row").style.display = "none";
    document.getElementById("dTelephone").value = "Not Available";
    document.getElementById("dTelephone").style.color = "red";
  }

  // Assign a five-star rating to the dealer, using a black star ('&#10029;')
  // to indicate the rating the dealer has earned, and a white star ('&#10025;')
  // for the rating points not achieved.
  if (place.rating) {
    let ratingHtml = "";

    for (let i = 0; i < 5; i++) {
      if (place.rating < i + 0.5) {
        ratingHtml += "&#10025;";
      } else {
        ratingHtml += "&#10029;";
      }
      document.getElementById("iw-rating-row").style.display = "";
      document.getElementById("iw-rating").innerHTML = ratingHtml;
      document.getElementById("dRating").style.color = "black";
      document.getElementById("dRating").value = place.rating + " Stars";
    }
  } else {
    document.getElementById("iw-rating-row").style.display = "none";
    document.getElementById("dRating").value = "Not Available";
    document.getElementById("dRating").style.color = "red";
  }

  // The regexp isolates the first part of the URL (domain plus subdomain)
  // to give a short URL for displaying in the info window.
  if (place.website) {
    let fullUrl = place.website;
    let website = String(hostnameRegexp.exec(place.website));

    if (!website) {
      website = "http://" + place.website + "/";
      fullUrl = website;
    }
    document.getElementById("iw-website-row").style.display = "";
    document.getElementById("iw-website").textContent = website;
    document.getElementById("dWebsite").style.color = "black";
    document.getElementById("dWebsite").value = website;
  } else {
    document.getElementById("iw-website-row").style.display = "none";
    document.getElementById("dWebsite").value = "Not Available";
    document.getElementById("dWebsite").style.color = "red";
  }

  document.getElementById("dName").value = place.name;
  document.getElementById("dAddress").value = place.vicinity;

}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}