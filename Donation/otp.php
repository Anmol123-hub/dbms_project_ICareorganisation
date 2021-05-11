
<html >
<head>
  <meta charset="UTF-8">
  <title>Otp Veritication </title>
       <link rel = "icon" href = "DBMS_logo_final.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300);
$lbl-color: #ccc;
$lbl-noFocus: #ccc;
$top: #000;
$btn-color: #ccc;
/*basic reset*/
* {margin: 0; padding: 0;}
 
html {
  height: 100%;
  /*Image only BG fallback*/
  background: #fff;
}
body {
  font-family: 'Open Sans', sans-serif;
}
/*form styles*/
#msform {
  width: 500px;
  margin: 0px auto;
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  min-height: 315px;
  border-radius: 10px;
  box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
}
#msform fieldset {
  background: #fff;
  border: 0 none;
  border-radius: 10px;
  /*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);*/
  padding: 20px 30px;
  font-family: 'Open Sans', sans-serif;
  box-sizing: border-box;
  width: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  //box-shadow: 0px 10px 15px rgba(0,0,0,0.2);
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
  display: none;
  font-family: 'Open Sans', sans-serif;
 
}
/*inputs*/
#msform input, #msform textarea {
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
  color: #000;
  font-size: 13px;
  background: #fff;
}
/*buttons*/
#msform .action-button {
  width: 100px;
  background: #2FC877;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 40px;
  cursor: pointer;
  padding: 10px 20px;
  margin: 10px 5px;
}
 
#msform .previous {
  width: 100px;
  background:#545153;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 40px;
  cursor: pointer;
  padding: 10px 20px;
  margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
  background:#52BA7E;
}
 
#msform .previous:hover, #msform .previous:focus {
  background:#353334;
}
/*headings*/
.h2 {
  font-family: 'Open Sans', sans-serif;
  font-weight: 800;
  font-size: 30px;
  color: #2C3E50;
  margin: 25px 0;
}
 
.h3 {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
  font-style: italic;
  font-size: 15px;
  color: #666;
  margin-bottom: 20px;
}
 
.h1 {
  margin: 40px 0;
  font-weight:800;
  font-size:48px;
  font-family: 'Open Sans', sans-serif;
  color: #2FC877;
}
 
/*logo*/
 
.powered {
  padding-top:20px;
  margin-bottom: 10px;
  clear:both;
  font-family: 'Open Sans', sans-serif;
  font-weight: 700;
  font-style:italic;
  font-size:10px;
  color:#292929;
}
.logo {
  margin: 0 2px;
  width:40px;
  height:auto;
 
}
 
 
label {
 
 
  transition-property: top, opacity;
  transition-duration:  0.2s;
          // browsers (se8/9) that do not support placeholder
  // text on input will see labels on page load
  position: absolute;
  top: .5em;
  font-size: .75em;
  font-weight: bold;
  color: $lbl-color;
  padding-left: 1.333333em;
  opacity: 1;
 
  &.valid {
 
    // I'm using this class for server side validation in
    // PHP, but I am also using it as a hook for styling
 
    opacity: 1;
    top: $top;
    color: $lbl-noFocus !important;
 
  }
  &.hasValue { top: $top; opacity: 1; }
  &.noFocus { color: $lbl-noFocus !important; }
  &.hasFocus { color: $lbl-color !important; }
 
}
input, textarea, button {
 
  width: 100%;
  padding: 1.5em 1em .5em;
  border: none;
  font-size: 1em;
  border-radius: 2px;
  background: #f5f5f5;
  resize: none;
}
 
input {
  margin-bottom: .5em;
}
 
button {
  padding: 1em;
  width: 50%;
  opacity: 1;
  color: lighten($btn-color, 50%);
  text-shadow: 0px 1px 0px darken($btn-color, 50%);
  transition: background-color 0.9em;
}
 
 
 
 
 
 
 
body,
.bgImage {
  margin: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
}
 
.bgImage {
  position: absolute;
  background-image: url(https://image.freepik.com/free-photo/abstract-blur-hotel-interior_74190-4973.jpg);
  background-size: cover;
  background-position: top;
  -webkit-filter: grayscale(70%); /* Safari 6.0 - 9.0 */
  filter: grayscale(70%);
  z-index: -1;
}
 
.blobCont {
  position: absolute;
  width: 100vw;
  height: 100vh;
}
 
@for $i from 1 through 18 {
  $a: #{$i*90};
  $b: #{$i*90+360};
 
  .blob:nth-child(#{$i}) {
    animation: move#{$i} 20s infinite linear;
  }
 
  @keyframes move#{$i} {
    from {
      transform: rotate(#{$a}deg) translate(200px, 0.1px) rotate(-#{$a}deg);
    }
    to {
      transform: rotate(#{$b}deg) translate(200px, 0.1px) rotate(-#{$b}deg);
    }
  }
}
</style>
 <script>
     var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
 
$(".next").click(function(){
 if(animating) return false;
 animating = true;
 
 current_fs = $(this).parent();
 next_fs = $(this).parent().next();
 
 //activate next step on progressbar using the index of next_fs
 
 
 //show the next fieldset
 next_fs.show();
 //hide the current fieldset with style
 current_fs.animate({opacity: 0}, {
 step: function(now, mx) {
 //as the opacity of current_fs reduces to 0 - stored in "now"
 //1. scale current_fs down to 80%
 scale = 1 - (1 - now) * 0.2;
 //2. bring next_fs from the right(50%)
 left = (now * 50)+"%";
 //3. increase opacity of next_fs to 1 as it moves in
 opacity = 1 - now;
 current_fs.css({'transform': 'scale('+scale+')'});
 next_fs.css({'left': left, 'opacity': opacity});
 },
 duration: 800,
 complete: function(){
 current_fs.hide();
 animating = false;
 },
 //this comes from the custom easing plugin
 easing: 'easeInOutBack'
 });
});
 
$(".previous").click(function(){
 if(animating) return false;
 animating = true;
 
 current_fs = $(this).parent();
 previous_fs = $(this).parent().prev();
 
 //de-activate current step on progressbar
 $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
 
 //show the previous fieldset
 previous_fs.show();
 //hide the current fieldset with style
 current_fs.animate({opacity: 0}, {
 step: function(now, mx) {
 //as the opacity of current_fs reduces to 0 - stored in "now"
 //1. scale previous_fs from 80% to 100%
 scale = 0.8 + (1 - now) * 0.2;
 //2. take current_fs to the right(50%) - from 0%
 left = ((1-now) * 50)+"%";
 //3. increase opacity of previous_fs to 1 as it moves in
 opacity = 1 - now;
 current_fs.css({'left': left});
 previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
 },
 duration: 800,
 complete: function(){
 current_fs.hide();
 animating = false;
 },
 //this comes from the custom easing plugin
 easing: 'easeInOutBack'
 });
});
 
$(".submit").click(function(){
 return false;
})
 </script>
</head>
<body>
    
<div class="bgImage"></div>
<svg class="blobCont">
    <image xlink:href="https://images.unsplash.com/photo-1500462918059-b1a0cb512f1d?ixlib=rb-0.3.5&s=e20bc3d490c974d9ea190e05c47962f5&auto=format&fit=crop&w=634&q=80" mask="url(#mask)" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
    <defs>
        <filter id="gooey" height="130%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="15" result="blur" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
        </filter>
    </defs>
    <img src="DBMS_logo_final.png" width=150 height=150 style="margin-left:auto; display:block; margin-right:auto;">
    <mask id="mask" x="0" y="0">
        <g style="filter: url(#gooey)">
            <circle class="blob" cx="10%" cy="10%" r="80" fill="white" stroke="white"/>
            <circle class="blob" cx="50%" cy="10%" r="40" fill="white" stroke="white"/>
            <circle class="blob" cx="17%" cy="15%" r="70" fill="white" stroke="white"/>
            <circle class="blob" cx="90%" cy="20%" r="120" fill="white" stroke="white"/>
            <circle class="blob" cx="30%" cy="25%" r="30" fill="white" stroke="white"/>
            <circle class="blob" cx="50%" cy="60%" r="80" fill="white" stroke="white"/>
            <circle class="blob" cx="70%" cy="90%" r="10" fill="white" stroke="white"/>
            <circle class="blob" cx="90%" cy="60%" r="90" fill="white" stroke="white"/>
            <circle class="blob" cx="30%" cy="90%" r="80" fill="white" stroke="white"/>
            <circle class="blob" cx="10%" cy="10%" r="80" fill="white" stroke="white"/>
            <circle class="blob" cx="50%" cy="10%" r="20" fill="white" stroke="white"/>
            <circle class="blob" cx="17%" cy="15%" r="70" fill="white" stroke="white"/>
            <circle class="blob" cx="40%" cy="20%" r="120" fill="white" stroke="white"/>
            <circle class="blob" cx="30%" cy="25%" r="30" fill="white" stroke="white"/>
            <circle class="blob" cx="80%" cy="60%" r="80" fill="white" stroke="white"/>
            <circle class="blob" cx="17%" cy="10%" r="100" fill="white" stroke="white"/>
            <circle class="blob" cx="40%" cy="60%" r="90" fill="white" stroke="white"/>
            <circle class="blob" cx="10%" cy="50%" r="80" fill="white" stroke="white"/>
        </g>
    </mask>
</svg>
 
<!-- partial:index.partial.html -->
<!-- multistep form -->

<form id="msform" action="otp1.php" method = "post">
 
      <!-- step 2 -->
      <fieldset>
        <img src="DBMS_logo_final.png" width=150 height=150 style="margin-left:auto; display:block; margin-right:auto;">
        <h2 class="h2">We sent your code</h2>
        <h3 class="h3">Enter the confirmation code below</h3>
        <input type="password" name="otp" placeholder="Enter confirmation code" />
     <input type="submit" name="Submit" class="next action-button" value="Submit" />
        <input type="submit" name="Cancel" class="previous" value="Cancel" />
        
    <p style="margin-top:10px;"> This Page Will Expire In <p id="counter" style="margin-top:10px;">300</p></p>
    <script>
        setInterval(function() {
            var div = document.querySelector("#counter");
            var count = div.textContent * 1 - 1;
            div.textContent = count;
            if (count <= 0) {
                
                window.location.replace("home.html");
            }
        }, 1000);
    </script>
 
      </fieldset>
      

</form>
 
       
 
        
        
 
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<!-- jQuery easing plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" type="text/javascript"></script>
<!-- partial -->
  <script  src="./script.js"></script>
 
</body>
</html>