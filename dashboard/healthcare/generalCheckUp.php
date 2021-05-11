<?php
session_start();
$db_con=mysqli_connect("localhost","stteresa_icare","Aardproject@123","stteresa_icareorganisation");
$op = $_SESSION["email"];
$id = 0;
$a = "SELECT * FROM `user_table` WHERE `email` = '$op'";
$a1 = mysqli_query($db_con,$a);
while($r = mysqli_fetch_array($a1)){
    $id = $r["user_id"];
    break;
}
// echo $id;


?>
<html>
    
    <head>
         	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
          <link rel="stylesheet" href="https://codepen.io/darrellpenta/pen/WEVMNE">
          <!--<script src="https://codepen.io/z-/pen/a8e37caf2a04602ea5815e5acedab458"></script>-->
          <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
          <!--<script src="https://codepen.io/z-/pen/2677821722cd9e02c2c882a17c5b2072"></script>-->
          <!--<script src="https://codepen.io/z-/pen/0a1bedbb8ca05b9afd329264fca7b921"></script>-->
        <style>

/*========================
Flexbox shortcuts
========================*/
.f-col,.f-row{-webkit-box-direction:normal}.ctr_dist,.ctr_end,.ctr_mid{align-content:center}.f-row{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-ms-flex-direction:row;flex-direction:row}.f-col{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-ms-flex-direction:column;flex-direction:column}.wrap{-ms-flex-wrap:wrap;flex-wrap:wrap}.nowrap{-ms-flex-wrap:nowrap;flex-wrap:nowrap}.j_start{-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start}.j_end{-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end}.j_ctr{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center}.j_btw{-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between}.j_rnd{-webkit-justify-content:space-around;-ms-flex-pack:distribute;justify-content:space-around}.a_start{-webkit-align-items:flex-start;-ms-flex-align:start;align-items:flex-start}.a_end{-webkit-align-items:flex-end;-ms-flex-align:end;align-items:flex-end}.a_ctr{-webkit-align-items:center;-ms-flex-align:center;align-items:center}.a_str{-webkit-align-items:stretch;-ms-flex-align:stretch;align-items:stretch}.ctr_mid{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-ms-flex-line-pack:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.ctr_dist{-ms-flex-pack:distribute;justify-content:space-around;-ms-flex-line-pack:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.ctr_end{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;-ms-flex-line-pack:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.as_end{ -webkit-align-self: flex-end;-ms-flex-item-align: end;align-self: flex-end;}
a,
*:link {
  text-decoration: none;
}

/* FontAwesome style
/**********************/

/* Hold icons in a span */
.tbar,
.ispan {
      
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  font-size: 1.5rem;
}

.tbar .fa,
.ispan .fa {
  font-size: 1.25em;
}

/* dp Inline SVG */
/****************************/

.sn_dp {
  width: 75%;
  height: 75%;
}
.sn_letter-d,
.sn_letter-p {
  fill: #0c0b30;
  stroke: #0c0b30;
}


/*************************/
/* Circle for initials
/*************************/
/*Use translateZ in place of z-index */
/*Bottom layer white circle */
.rad-nav {
  font-size: 1rem;
  position: relative;

  width: 4em;
  height: 4em;
  background-color: #fff;
  border-radius: 50%;
  border: 3px solid #0c0b30;
  -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform: translateX(0) translateY(0) translateZ(-1em);
  -ms-transform: translateX(0) translateY(0) translateZ(-1em);
  transform: translateX(0) translateY(0) translateZ(-1em);
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/*Top layer lite blue circle */

.rad-nav:after {
  content: "";
  width: 90%;
  height: 90%;
  display: block;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 1px #fff;
  box-shadow: 0 0 0 1px #fff;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/****************************/
/* Radial Menu*/
/****************************/

/* Base form element (Hidden) */
#logo-check {
  display: none;
  font-size: 1rem;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/* Styled form outer element */
.rad-label {
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  cursor: pointer;
  z-index: 50;
  width: 105%;
  height: 105%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateX(-50%) translateY(-50%) translateZ(1em);
  transform: translateX(-50%) translateY(-50%) translateZ(1em);
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/* Radial toggle button container*/
.toggler {
  border-radius: 50%;
  width: 3em;
  height: 3em;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  background: #0c0b30; /*#6534ff;*/
  -webkit-box-shadow: 0 0 0.5em 0.25em rgba(255, 255, 255, 1);
  box-shadow: 0 0 0.5em 0.25em rgba(255, 255, 255, 1);
  position: relative;
  color: #fff;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.rad-tog {
  position: absolute;
  top: 0;
  left: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transform: translateX(2.65em) translateY(-1.4em) translateZ(-2em)
    rotate(180deg) rotateZ(0) scale3d(1, 1, 1);
  transform: translateX(2.65em) translateY(-1.4em) translateZ(-2em)
    rotate(180deg) rotateZ(0) scale3d(1, 1, 1);
  opacity: 0;
  -webkit-transition: opacity 0.01s;
  -o-transition: opacity 0.01s;
  transition: opacity 0.01s;
}
.hover-tog {
  position: absolute;
  top: 0;
  left: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transform: translateX(2.65em) translateY(-1.4em) translateZ(-2em)
    rotate(180deg) rotateZ(0) scale3d(1, 1, 1);
  transform: translateX(2.65em) translateY(-1.4em) translateZ(-2em)
    rotate(180deg) rotateZ(0) scale3d(1, 1, 1);
}

/* Radial toggle button action*/
/*Radial hide open/close toggle*/
.toggler > .tbar:first-child {
  -webkit-transition: display 0.01s;
  -o-transition: display 0.01s;
  transition: display 0.01s;
  -webkit-transition-delay: 0.02s;
  -o-transition-delay: 0.02s;
  transition-delay: 0.02s;
  display: initial;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.toggler > .tbar:last-child {
  display: none;
  -webkit-transition: display 0.01s;
  -o-transition: display 0.01s;
  transition: display 0.01s;
  -webkit-transition-delay: 0.02s;
  -o-transition-delay: 0.02s;
  transition-delay: 0.02s;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

#logo-check:checked ~ .rad-label .rad-tog > .tbar:first-child {
  -webkit-transition: display 0.01s;
  -o-transition: display 0.01s;
  transition: display 0.01s;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition-delay: 0.02s;
  -o-transition-delay: 0.02s;
  transition-delay: 0.02s;
  display: none;
}
#logo-check:checked ~ .rad-label .rad-tog > .tbar:last-child {
  -webkit-transition: display 0.01s;
  -o-transition: display 0.01s;
  transition: display 0.01s;
  -webkit-transition-delay: 0.02s;
  -o-transition-delay: 0.02s;
  transition-delay: 0.02s;
  display: inherit;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

#logo-check:checked ~ .rad-label > .rad-tog {
  -webkit-transition: opacity 0.01s;
  -o-transition: opacity 0.01s;
  transition: opacity 0.01s;
  opacity: 1;
}
#logo-check:checked ~ .rad-label > .hover-tog {
  -webkit-transition: opacity 0.01s;
  -o-transition: opacity 0.01s;
  transition: opacity 0.01s;
  opacity: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/* Radial navigation container */
/****************************/
.rad-cont {
  position: absolute;
  z-index: 10;
  width: 4.2em;
  height: 4.2em;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.rad-inside {
  position: relative;
  width: 90%;
  height: 90%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.rad-cont,
.rad-inside {
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  border-radius: 50%;
  -webkit-perspective: 1000px;
  perspective: 1000px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.rad-inside:after {
  content: "";
  width: 80%;
  height: 80%;
  display: block;
  position: absolute;
  border-radius: 50%;
  border-width: 0.4em solid #689fff;
  z-index: -1;
  opacity: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

#logo-check:hover ~ .rad-label + .rad-cont > .rad-inside:after,
#logo-check:active ~ .rad-label + .rad-cont > .rad-inside:after,
#logo-check:focus ~ .rad-label + .rad-cont > .rad-inside:after {
  opacity: 1;
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
#logo-check:checked ~ .rad-label + .rad-cont > .rad-inside:after {
  border-width: 1em solid #689fff;
  border-radius: 50%;
  background-color: white;
  z-index: -1;
  opacity: 1;
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

#logo-check ~ .rad-label + .rad-cont .sn_dp {
  -webkit-transform: rotate(0);
  transform: rotate(0);
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#logo-check:checked ~ .rad-label + .rad-cont .sn_dp {
  -webkit-transform: rotate(-180deg);
  transform: rotate(-180deg);
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

/* Radial fly-out buttons */
/****************************/
.fly-out {
  position: absolute;
  right: 50%;
  top: 50%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 0em;
  height: 3em;
  -webkit-transform: translateX(0) translateY(-50%) translateZ(-3em)
    scale3d(1, 1, 1);
  transform: translateX(0) translateY(-50%) translateZ(-3em) scale3d(1, 1, 1);
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-perspective: 1000px;
  perspective: 1000px;
  background-color: #0c0b30;
  -webkit-transition: width 0.41s linear;
  -moz-transition: width 0.41s linear;
  -o-transition: width 0.41s linear;
  transition: width 0.41s linear;
  padding: 0;
  -webkit-box-shadow: 0 0 0.5em 0.25em rgba(255, 255, 255, 1);
  box-shadow: 0 0 0.5em 0.25em rgba(255, 255, 255, 1);
  border-radius: 0.21em 0 0 0.21em;
}
#logo-check:checked ~ .rad-label + .rad-cont .fly-out {
  width: 15em;
  -webkit-transition: width 0.41s linear;
  -moz-transition: width 0.41s linear;
  -o-transition: width 0.41s linear;
  transition: width 0.41s linear;
}
.rad-circ {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  width: 2.5em;
  height: 2.5em;
  -webkit-flex: 0 1 auto;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  background-color: #0c0b30;
  color: #fff;
  -webkit-transform: translate3d(0, 0, 0) scale3d(0, 0, 0);
  transform: translate3d(0, 0, 0) scale3d(0, 0, 0);
  -webkit-transition: all 0.25s linear 0s;
  -o-transition: all 0.25s linear 0s;
  transition: all 0.25s linear 0s;
}

#logo-check:checked ~ .rad-label + .rad-cont .rad-circ {
  -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1);
  transform: translate3d(0, 0, 0) scale3d(1, 1, 1);
  -webkit-transition: all 0.52s linear 0.13s;
  -o-transition: all 0.52s linear 0.13s;
  transition: all 0.52s linear 0.13s;
}

#logo-check:checked ~ .rad-label + .rad-cont .rad-circ:hover,
#logo-check:checked ~ .rad-label + .rad-cont .rad-circ:active,
#logo-check:checked ~ .rad-label + .rad-cont .rad-circ:focus {
  -webkit-transform: translate(0, 0) translateZ(0) scale(0.85, 0.85);
  transform: translate(0, 0) translateZ(0) scale(0.85, 0.85);
}

.dp-home > .flyout-dp {
  position: absolute;
  top: 0;
  left: 0;
  width: 2.5em;
  height: 2.5em;
  padding: 0;
  margin: 0;
  display: inline-block;
  text-align: center;
  border: 2px solid #fff;
  border-radius: 50%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased !important;
  font-smoothing: antialiased !important;
  font-family: "Quicksand", Arial, Helvetica, sans-serif;
}

.dp-home p {
  position: inherit;
  top: 50%;
  left: 50%;
  height: 100%;
  width: 100%;
  padding: 0;
  margin: 0;
  font-size: 2em;
  -webkit-transform: translate(-55%, -55%);
  transform: translate(-55%, -55%);
  letter-spacing: -0.15em;
}

.fly-submenu {
  height: 3em;
  width: 3em;
  position: absolute;
  bottom: 0;
  left: 0;
  line-height: 2.5em;
  padding: 0;
  margin: 0;
  margin-left: 1em;
  z-index: 1005;
  font-family: "Noto Sans", Arial, Helvetica, sans-serif;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fs_menu {
  position: inherit;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  display: none;
  margin: 0;
  margin-bottom: 1em;
  -webkit-transform: translate(-75%, -52%);
  transform: translate(-75%, -52%);
  z-index: 999;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fs_menu-holder > div {
  color: #0c0b30;
  -webkit-flex: 1 1 100%;
  -ms-flex: 1 1 100%;
  flex: 1 1 100%;
  min-width: 4.5em;
  font-size: 1em;
  line-height: 2.5em;
  text-align: center;
  background-color: rgba(255, 255, 255, 0.8);
  color: #0c0b30;
  -webkit-box-shadow: inset 0 0 0 2px #0c0b30,
    0 0 0 2px rgba(255, 255, 255, 0.8);
  padding: 0;
  margin: 0 0.25em;
  font-family: "Noto Sans", Arial, Helvetica, sans-serif;
  -webkit-transform: skew(20deg) scale(1, 1);
  transform: translate(20deg) scale(1, 1);
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fs_menu-holder > div a {
  color: inherit;
  display: block;
  padding: 0;
  margin: 0 auto;
  -webkit-transform: skew(-20deg) scale(1, 1);
  transform: translate(-20deg) scale(1, 1);
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fs_menu .fs_menu-holder div:hover {
  background-color: #0c0b30;
  color: #fff;
  -webkit-box-shadow: inset 0 0 0 2px #fff, 0 0 0 2px #0c0b30;
}

.fs_hov {
  width: 3em;
  padding: 0;
  padding-top: 3em;
  margin: 0;
  margin-left: 5%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.fs_menu-holder {
  width: 0;
  height: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
#logo-check:checked
  ~ .rad-label
  + .rad-cont
  .fly-out
  .fly-submenu:hover
  .fs_menu {
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  width: 3em;
  height: 6em;
}

.fly-submenu:hover .fs_menu-holder {
  width: 12em;
  height: 4em;
}

/*TABLE*/

h1{
  font-size: 30px;
  color: white;

  text-transform: uppercase;
  font-weight: bold;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:auto;
  table-layout: fixed;
   background: -webkit-linear-gradient(left, #1e3c72,#2a5298);
  background: linear-gradient(to right, #1e3c72,#2a5298);
  -moz-box-shadow: 20px 20px 20px black;
  -webkit-box-shadow: 20px 20px 20px black;
 box-shadow: 
  inset 10px 10px 10px black, 
  inset -10px -10px 10px black;
  

}
.tbl-header{
  background-color: rgba(255,255,255,0.3);

  
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
 
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);


 
}
th{
  padding: 20px 60px;
  /*text-align: left;*/
  font-weight: bold;
  font-size: 15px;
  color: white;
  
  text-transform: uppercase;
  
		/*vertical-align: top;*/
    white-space: nowrap;
}
td{
  padding: 15px 60px;

  text-align: center;
  /*vertical-align:middle;*/
  font-weight: bold;
  font-size: 15px;
  color: white;
  border-bottom: solid 1px rgba(255,255,255,0.1);

		vertical-align: top;
    white-space: nowrap;
  
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #525252, #3d72b4);
  background: linear-gradient(to right,  #525252, #3d72b4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin-left: 1px;
  margin-top:60px;
  
}
.table-scroll{
      overflow-x:scroll;
      overflow-y:scroll;
      
    width:100%;
    height:150px;
   
}

/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
    height: 8px;
    
} 

/*::-webkit-scrollbar-track {*/
/*    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); */
/*} */
::-webkit-scrollbar-thumb {
    
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.9); 
}
::-webkit-scrollbar:vertical {
display:none;
}

/*BUTTON*/
.button {
  border-radius: 4px;
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  border: none;
  color: black;
  text-align: center;
  float:center;
  
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  /*margin-left: 450px;*/
}

        
         

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

/*IF NO ENTRY THEN BOX*/


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

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);


 a.document.write('</body><div align="center"><button align="center" style="margin-top:20px;"onclick="window.print()"><span>Print</span></button></div></html>');
            a.document.close();
            // a.print();
        }

</script>
    </head>
    
    <body>
        <?php
                         $q2="Select * from symptoms;";
                    $q1 = mysqli_query($db_con, $q2);
 
            while($r = mysqli_fetch_array($q1)){
                  $us_id=$r['id'];
                if($us_id)
                {
                       $data=$data+1;
                     
                }
            }
                  $q2="Select * from disease;";
                    $q1 = mysqli_query($db_con, $q2);
 
            while($r = mysqli_fetch_array($q1)){
                  $us_id=$r['id'];
                if($us_id)
                {
                       $data1=$data1+1;
                     
                }
            }
                   $q2="Select * from medicines;";
                    $q1 = mysqli_query($db_con, $q2);
 
            while($r = mysqli_fetch_array($q1)){
                  $us_id=$r['id'];
                if($us_id)
                {
                       $data2=$data2+1;
                     
                }
            }
                      $q2="Select * from prediction;";
                    $q1 = mysqli_query($db_con, $q2);
 
            while($r = mysqli_fetch_array($q1)){
                  $us_id=$r['id'];
                if($us_id)
                {
                       $data3=$data3+1;
                     
                }
            }
                        $q2="Select * from general_checkup;";
                    $q1 = mysqli_query($db_con, $q2);
 
            while($r = mysqli_fetch_array($q1)){
                  $us_id=$r['user_id'];
                if($us_id)
                {
                       $data4=$data4+1;
                     
                }
            }
            $total=$data+$data1+$data2+$data3+$data4;
           
         $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
            while($r = mysqli_fetch_array($query_ex)){
                if($r['user_id']==$id)
                {
                    $m++;
                }
            }
   
            if($m==0)
            {?> 
                <h1 align="center" style="margin-top:200px">You did not perform General Check Up</h1>
                <h1 align="center" >To Check Up click the button below   <i class="fas fa-hand-point-down"></i></h1>
                <div class="row" align="center">
                <a href="../../healthcare/general_checkup.html" target="_top"><button class="button" align="center"><span>General Check Up </span></button></a>
               </div>
               
           <?php }
           else
           {
           ?>

        
  <!--TABLE-->
  <div id="print">
  <section>
  <!--for demo wrap-->
  <h1 align="center"><i class="fas fa-user-md" aria-hidden="true"></i>     Your General Check Up Data</h1>
<section class="table-scroll">
   
  <!--<div class="tbl-header" style="margin-top:50px">-->
    <table cellpadding="1" cellspacing="1" style="float:center" align="center">
      <thead>
        <tr style="  background-color: rgba(255,255,300,0.3);">
          <th>Id</th>  
          <th>Name</th>
          <th>Email</th>
          <th>User's Phone number</th>
          <th>Age</th>
          <th>Height</th>
          <th>Weight</th>
          <th>BMI</th>
         <th>Maximum Number of Symtoms Selected</th>
        
        </tr>
      </thead>
    <!--</table>-->
  <!--</div>  -->
  
  <!--<div class="tbl-content">-->
  <!--  <table cellpadding="0" cellspacing="0" border="0">-->
<?php

// $querry = "SELECT a.name,a.email,a.phone,a.age,a.height,a.weight,a.diastolic_BP,a.systolic_BP,a.haemoglobin,a.pulse_rate,a.body_temperature,a.trans_disaese,a.blood_group,a.donation_date,a.expiry_date,a.blood_id, b.country, b.city,b.blood_bank, b.address,b.phone_number,b.rating,b.website FROM blood_donation a INNER JOIN blood_map b ON a.user_id = b.user_id ";
         $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
 
      while($r = mysqli_fetch_array($query_ex)){
        $no_id=$no_id+1;
?>
  

      <tbody>
        <tr>
             <td><?php echo $r['id'];?></td>
          <td><?php echo $r['name'];?></td>
          <td> <?php echo $r['email'];?></td>
          <td><?php echo $r['phone_number'];?></td>
          <td><?php echo $r['age'];?></td>
          <td><?php echo $r['height'];?></td>
          <td><?php echo $r['weight'];?></td>
          <td><?php echo $r['bmi'];?></td>
            <td><?php echo $r['max_symptoms'];?></td>

        </tr>
       

<?php

}
?>
      </tbody>
    </table>
  <!--</div>-->
      <!--BREAK AFTER A TABLE-->
  
</section>

</section>
  <!--TABLE-->
  
  <section>
  <!--for demo wrap-->
  <h1 align="center"><i class="fas fa-microscope" aria-hidden="true"></i>     Your Symptoms Selected</h1>
<section class="table-scroll" align="center">
   
  <!--<div class="tbl-header" style="margin-top:50px">-->
    <table cellpadding="1" cellspacing="1" style="float:center" align="center">
      <thead>
        <tr style="  background-color: rgba(255,255,300,0.3);">
           <th>ID</th>
          <th>Name</th>
          <th>Email</th>
     
          <th>Symptoms Name Selected</th>
        </tr>
      </thead>
    <!--</table>-->
  <!--</div>  -->
  
  <!--<div class="tbl-content">-->
  <!--  <table cellpadding="0" cellspacing="0" border="0">-->
<?php

// $querry = "SELECT a.name,a.email,a.phone,a.age,a.height,a.weight,a.diastolic_BP,a.systolic_BP,a.haemoglobin,a.pulse_rate,a.body_temperature,a.trans_disaese,a.blood_group,a.donation_date,a.expiry_date,a.blood_id, b.country, b.city,b.blood_bank, b.address,b.phone_number,b.rating,b.website FROM blood_donation a INNER JOIN blood_map b ON a.user_id = b.user_id ";
         $querry2="Select * from general_checkup a INNER JOIN symptoms b ON a.id = b.id where a.user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
 
      while($r = mysqli_fetch_array($query_ex)){
         $no_id1=$no_id1+1;

?>
  

      <tbody>
        <tr>
            <td><?php echo $r["id"]?></td>
          <td><?php echo $r["name"]?></td>
          <td> <?php echo $r["email"]?></td>
   
          <td><?php echo $r["symptoms_name"];?></td>
        </tr>
       

<?php


}

?>
     

      </tbody>
    </table>

  <!--</div>-->
</section>

</section>
  <!--TABLE-->
  
  <section>
  <!--for demo wrap-->
  <h1 align="center"><i class="fas fa-procedures"></i>     Your Diseases that Match the Symptoms Selected</h1>
<section class="table-scroll">
   
  <!--<div class="tbl-header" style="margin-top:50px">-->
    <table cellpadding="1" cellspacing="1" style="float:center" align="center">
      <thead>
        <tr style="  background-color: rgba(255,255,300,0.3);">
           <th>ID</th>
          <th>Name</th>
          <th>Email</th>
     
          <th>Disease Matching these symptoms</th>
          <th>Symptoms Matched</th>
        </tr>
      </thead>
    <!--</table>-->
  <!--</div>  -->
  
  <!--<div class="tbl-content">-->
  <!--  <table cellpadding="0" cellspacing="0" border="0">-->
<?php

// $querry = "SELECT a.name,a.email,a.phone,a.age,a.height,a.weight,a.diastolic_BP,a.systolic_BP,a.haemoglobin,a.pulse_rate,a.body_temperature,a.trans_disaese,a.blood_group,a.donation_date,a.expiry_date,a.blood_id, b.country, b.city,b.blood_bank, b.address,b.phone_number,b.rating,b.website FROM blood_donation a INNER JOIN blood_map b ON a.user_id = b.user_id ";
         $querry2="Select * from general_checkup a INNER JOIN disease b ON a.id = b.id where a.user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
 
      while($r = mysqli_fetch_array($query_ex)){
        $no_id2=$no_id2+1; 

?>
  

      <tbody>
        <tr>
            <td><?php echo $r["id"]?></td>
          <td><?php echo $r["name"]?></td>
          <td> <?php echo $r["email"]?></td>
   
          <td><?php echo $r["disease_name"];?></td>
        <td><?php echo $r["symptoms_matched"];?></td>
        </tr>
       

<?php


}

?>
     

      </tbody>
    </table>
  <!--</div>-->
</section>

</section>
  <!--TABLE-->
  
  <section>
  <!--for demo wrap-->
  <h1 align="center"><i class="fas fa-capsules" aria-hidden="true"></i>     Medicine for each Diseases which matches the Symptoms</h1>
<section class="table-scroll">
   
  <!--<div class="tbl-header" style="margin-top:50px">-->
<table cellpadding="1" cellspacing="1" style="float:center" align="center">
      <thead>
        <tr style="  background-color: rgba(255,255,300,0.3);">
           <th>ID</th>
          <th>Name</th>
          <th>Email</th>
     
          <th>Medicines for each of these diseases</th>
         
        </tr>
      </thead>
    <!--</table>-->
  <!--</div>  -->
  
  <!--<div class="tbl-content">-->
  <!--  <table cellpadding="0" cellspacing="0" border="0">-->
<?php

// $querry = "SELECT a.name,a.email,a.phone,a.age,a.height,a.weight,a.diastolic_BP,a.systolic_BP,a.haemoglobin,a.pulse_rate,a.body_temperature,a.trans_disaese,a.blood_group,a.donation_date,a.expiry_date,a.blood_id, b.country, b.city,b.blood_bank, b.address,b.phone_number,b.rating,b.website FROM blood_donation a INNER JOIN blood_map b ON a.user_id = b.user_id ";
         $querry2="Select * from general_checkup a INNER JOIN medicines b ON a.id = b.id where a.user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
 
      while($r = mysqli_fetch_array($query_ex)){
         
      $no_id3=$no_id3+1;
?>
  

      <tbody>
        <tr>
            <td><?php echo $r["id"]?></td>
          <td><?php echo $r["name"]?></td>
          <td> <?php echo $r["email"]?></td>
   
          <td><?php echo $r["medicine"];?></td>
       
        </tr>
       

<?php


}

?>
     

      </tbody>
    </table>
  <!--</div>-->
</section>

</section>
  <!--TABLE-->
  
  <section>
  <!--for demo wrap-->
  <h1 align="center"><i class="fas fa-user-injured" aria-hidden="true"></i>   The Diseases that you are likely to have</h1>
<section class="table-scroll">
   
  <!--<div class="tbl-header" style="margin-top:50px">-->
<table cellpadding="1" cellspacing="1" style="float:center" align="center">
      <thead>
        <tr style="  background-color: rgba(255,255,300,0.3);">
           <th>ID</th>
          <th>Name</th>
          <th>Email</th>
     
          <th>The Diseases that you are likely to have</th>
         
        </tr>
      </thead>
    <!--</table>-->
  <!--</div>  -->
  
  <!--<div class="tbl-content">-->
  <!--  <table cellpadding="0" cellspacing="0" border="0">-->
<?php

// $querry = "SELECT a.name,a.email,a.phone,a.age,a.height,a.weight,a.diastolic_BP,a.systolic_BP,a.haemoglobin,a.pulse_rate,a.body_temperature,a.trans_disaese,a.blood_group,a.donation_date,a.expiry_date,a.blood_id, b.country, b.city,b.blood_bank, b.address,b.phone_number,b.rating,b.website FROM blood_donation a INNER JOIN blood_map b ON a.user_id = b.user_id ";
         $querry2="Select * from general_checkup a INNER JOIN prediction b ON a.id = b.id where a.user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
 
      while($r = mysqli_fetch_array($query_ex)){
         
      $no_id4=$no_id4+1;
?>
  

      <tbody>
        <tr>
            <td><?php echo $r["id"]?></td>
          <td><?php echo $r["name"]?></td>
          <td> <?php echo $r["email"]?></td>
   
          <td><?php echo $r["disease_predicted"];?></td>
       
        </tr>
       

<?php


}

?>
     

      </tbody>
    </table>
  <!--</div>-->
</section>

</section>
 <!--CHART FUNCTION CALL   -->
<h1  style="margin-top:40px" align="center"><i class="fas fa-chart-pie" aria-hidden="true"></i>     Your entries compared to entries in database</h1>
   <div class="chart" id="piechart_3d" style="width:100%;  margin-top:10px; position: relative; height: 450px;     background: -webkit-linear-gradient(left, #525252, #3d72b4);background: linear-gradient(to right,  #525252, #3d72b4);" ></div>

   <h1  style="margin-top:40px" align="center"><i class="fas fa-history" aria-hidden="true"></i>     General Checkup History for each time you have performed your Checkup</h1>
   <div id="chart_div" style="width:100%;  margin-top:10px; position: relative; height: 500px;     background: -webkit-linear-gradient(left, #525252, #3d72b4);background: linear-gradient(to right,  #525252, #3d72b4);" ></div>
    </div>      
                   <div class="row" align="center">
                <a href="../../healthcare/general_checkup.html" target="_top"><button class="button" align="center"><span>Perform Check Up</span></button></a>
                        <button class="button" align="center" onclick="printDiv()"><span>Download </span></button>
               </div>
               <br>
               <br>
 
<!--CHART-->
                      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
     var total=<?php echo $total; ?>; 
    var checkup=<?php echo $no_id; ?>;
    var symp=<?php echo $no_id1; ?>;
    var dis_matched=<?php echo $no_id2; ?>;
    var med=<?php echo $no_id3; ?>;
    var dis_pred=<?php echo $no_id4; ?>;
    //   alert(map);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Your entry for General Check Up',     checkup],
          ['Your entry for Symptoms',      symp],
          ['Total entries for Diseases matched for each Symptoms',      dis_matched],
           ['Total entries for Medicines for each Diseases',      med],
            ['Total entries for Diseases you are likely to have',      dis_pred],
             ['Total entries in the tables of General checkup for checkup , symptoms , diseases , medicines and disease predicted in the database',      total],
       
        ]);

            var options = {
        legend:'right',
        backgroundColor: {
        fillOpacity: 0,
      },
          legendTextStyle: { color: 'black' },
         
         is3D: true, 
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <?php
      $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
      $patient_id=array();
      while($r = mysqli_fetch_array($query_ex)){
           $e=$r['id'];
            array_push($patient_id,$e);
      }
   
      $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
      $symptoms=array();
      while($r = mysqli_fetch_array($query_ex)){
          $e=$r['id'];
          $querry3="Select * from symptoms where id='$e';"; 
          $query_ex1 = mysqli_query($db_con, $querry3);
           while($r1 = mysqli_fetch_array($query_ex1))
           {
               $c=$c+1;
               
           }
           array_push($symptoms,$c);
           $c=0;
           }
           $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
      $disease=array();
      while($r = mysqli_fetch_array($query_ex)){
          $e=$r['id'];
          $querry3="Select * from disease where id='$e';"; 
          $query_ex1 = mysqli_query($db_con, $querry3);
           while($r1 = mysqli_fetch_array($query_ex1))
           {
               $c1=$c1+1;
               
           }
           array_push($disease,$c1);
           $c1=0;
           }
                 $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
      $medic=array();
      while($r = mysqli_fetch_array($query_ex)){
          $e=$r['id'];
          $querry3="Select * from medicines where id='$e';"; 
          $query_ex1 = mysqli_query($db_con, $querry3);
           while($r1 = mysqli_fetch_array($query_ex1))
           {
               $c2=$c2+1;
               
           }
           array_push($medic,$c2);
           $c2=0;
           }
     $querry2="Select * from general_checkup where user_id='$id';";
      $query_ex = mysqli_query($db_con, $querry2);
      $predict=array();
      while($r = mysqli_fetch_array($query_ex)){
          $e=$r['id'];
          $querry3="Select * from prediction where id='$e';"; 
          $query_ex1 = mysqli_query($db_con, $querry3);
           while($r1 = mysqli_fetch_array($query_ex1))
           {
               $c3=$c3+1;
               
           }
           array_push($predict,$c3);
           $c3=0;
           }
   
         
    ?>
   
          
 
    <!--BAR CHART-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {

       
  // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Id', 'Total Number Of Syptoms selected', 'Total Number of Diseases matched with selected symptoms', 'Total Number of Medicines matching with diseases', 'Total Number of Diseases you are likely to have'],
          <?php
          $i=0;
          while($i<$no_id)
          {
              
              echo "['".$patient_id[$i]."',".$symptoms[$i].",".$disease[$i].",".$medic[$i].",".$predict[$i]."],";

         
        $i++;
          }
       
        ?>
        ]);

    
        var options = {
         
          vAxis: {title: 'Total number of data calculated'},
          hAxis: {title: 'Your Id for each checkup'},
          seriesType: 'bars',
            legend:'right',
        backgroundColor: {
        fillOpacity: 0,
      },
          legendTextStyle: { color: 'black' },
        };
        
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

              
<?php

}


?>


  </body>
</html>