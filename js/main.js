var overcolorlink = document.querySelectorAll('body > div.overlay > div > ul > li');
var menubuttons = document.querySelectorAll('.list');
var overlay = document.querySelector("body");
var overcolor = document.querySelectorAll('.overlay');


function on_resize(c, t) {
 onresize = function() {
  clearTimeout(t);
  t = setTimeout(c, 100);
 };
 return c;
}

function toggleOverlay() {
 console.log(overlay.className)
 if (overlay.className === "hide-overlay") {
  overlay.classList.toggle('hide-overlay');
 }
 var backcolor = window.getComputedStyle(this, null).getPropertyValue('background-color');
 for (var i = 0, len = overcolorlink.length; i < len; i++) {
  overcolorlink[i].style.backgroundColor = backcolor;
 }

}

document.getElementById("close").addEventListener('click', function(event) {
 overlay.className = "hide-overlay";
 return false;
});


for (var i = 0, len = menubuttons.length; i < len; i++) {
 menubuttons[i].addEventListener('click', toggleOverlay);
}
