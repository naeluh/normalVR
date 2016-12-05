var overcolorlink = document.querySelectorAll('body > div.overlay > div > ul > li');
var menubuttons = document.querySelectorAll('.list');
var overlay = document.querySelector("body");
var overcolor = document.querySelectorAll('.overlay');

var webpages = [{
	'id':1,
	'title':'gifpaint.in',
	'img': 'assets/ezgif.com-754a7b199a.gif', 
	'link': 'https://gifpaint.hulea.org/', 
	'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
} , {
	'id':1,
	'title':'gifpaint.in',
	'img': 'assets/ezgif.com-754a7b199a.gif', 
	'link': 'https://gifpaint.hulea.org/', 
	'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
}]


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
