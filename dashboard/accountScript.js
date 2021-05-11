let prism = document.querySelector(".rec-prism");

window.onload = function() {
    document.body.style.zoom = "90%";
    changeLink();
}

function showLogin(){
  prism.style.transform = "translateZ(-100px)";
}
function showForgotPassword(){
  prism.style.transform = "translateZ(-100px) rotateY( -180deg)";
}

function showSubscribe(){
  prism.style.transform = "translateZ(-100px) rotateX( -90deg)";
}