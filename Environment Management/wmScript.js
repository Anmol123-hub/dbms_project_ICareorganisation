window.onload = function() {
    selectCategory();
}

var catList = ["cat1List", "cat2List", "cat3List", "cat4List", "cat5List", "cat6List", "cat7List", "cat8List"];
var visibleCatList = null;

function cat(catnList) {
    var selectedDiv = "";

    if(visibleCatList === catnList) {
        visibleCatList = null;
        selectCategory();
      } else {
        visibleCatList = catnList;
        selectCategory();
      }
    hideNonVisibleDivs();

}

function selectCategory() {
  var x = document.getElementsByClassName('wasteCategory');
    for (var i = 0; i < x.length; i++) {
        x[i].addEventListener("click", function() {    
            var selectedEl = document.querySelector(".selected");
            
            if(selectedEl) {
                selectedEl.classList.remove("selected");
            }
            this.classList.add("selected");
        
        }, false);
    }
}

function hideNonVisibleDivs() {
    var i, divId, div;
    for(i = 0; i < catList.length; i++) {
      divId = catList[i];
      div = document.getElementById(divId);
      if(visibleCatList === divId) {
        div.style.display = "grid";
      } else {
        div.style.display = "none";
      }
    }
}

function choose(x) {
    
  x.classList.toggle("active");
    
    if(x.parentNode.id == "cat1List") {
      var selectCount = document.getElementById('badge1');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat2List") {
      var selectCount = document.getElementById('badge2');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat3List") {
      var selectCount = document.getElementById('badge3');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat4List") {
      var selectCount = document.getElementById('badge4');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat5List") {
      var selectCount = document.getElementById('badge5');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat6List") {
      var selectCount = document.getElementById('badge6');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat7List") {
      var selectCount = document.getElementById('badge7');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

    else if(x.parentNode.id == "cat8List") {
      var selectCount = document.getElementById('badge8');
      if(x.classList.contains("active")) {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = ++number;
      }
      else {
        var number = selectCount.innerHTML;
        selectCount.innerHTML = --number;
      }
    }

}

// OnClick of Button
function myFunction() {
	var items = document.querySelectorAll(".wasteListItemContainer.active");
    var res="";
    items.forEach(i => res += i.textContent);
    document.getElementById('listItems').innerHTML = res;
    alert(res);
}

// OnClick of Submit Button
function ajaxpost() {
    
    var data = new FormData();
    data.append("dName", document.getElementById("dName").value);
    data.append("dTelephone", document.getElementById("dTelephone").value);
    data.append("dRating", document.getElementById("dRating").value);
    data.append("dWebsite", document.getElementById("dWebsite").value);
    data.append("dAddress", document.getElementById("dAddress").value);
    
    // AJAX Post Request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "wmData.php");
    // What to do when server responds
    xhr.onreadystatechange = function()
    {
      if (xhr.readyState==4 && xhr.status==200)
      {
        alert(xhr.responseText);
      }
    }
    
    xhr.send(data);
    
    setTimeout(function(){
        
    var cname = "id";
    var id = getCookie(cname);
    
    if(id == 0) {
        location.reload();
    }
        
    }, 3000);
    
    return false;
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