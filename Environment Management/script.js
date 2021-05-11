// When the user scrolls the page, execute myFunction 
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}

// window.onload = function() {
//     document.body.style.zoom = "90%"
// }

if (jQuery('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = jQuery(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                jQuery('#back-to-top').addClass('show');
            } else {
                jQuery('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    jQuery(window).on('scroll', function () {
        backToTop();
    });
    jQuery('#back-to-top').on('click', function (e) {
        e.preventDefault();
       jQuery('html,body').animate({
            scrollTop: 0
        }, 700);
    }
)};

function module1() {
    location.href = "wasteManagement.html";
}

function module2() {
    location.href = "pollutionCheck.html";
}

function ReadMore1() {
    var dots = document.getElementById("dots1");
    var moreText = document.getElementById("more1");
    var btnText = document.getElementById("myBtn1");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read More"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = " Read Less"; 
      moreText.style.display = "inline";
    }
}

function ReadMore2() {
    var dots = document.getElementById("dots2");
    var moreText = document.getElementById("more2");
    var btnText = document.getElementById("myBtn2");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read More"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = " Read Less"; 
      moreText.style.display = "inline";
    }
}


