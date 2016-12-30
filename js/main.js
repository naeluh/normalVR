var overlay = document.querySelector("body"),
  overcolor = document.querySelectorAll('.overlay'),
  images = document.getElementById("image"),
  titles = document.getElementById("title"),
  sitinfo = document.getElementById("description"),
  link = document.getElementById("link"),
  c = 0,
  close = document.getElementById("close"),
  next = document.getElementById("next"),
  back = document.getElementById("background-content"),
  on_resize = function(c, t) {
    onresize = function() {
      clearTimeout(t);
      t = setTimeout(c, 100);
    };
    return c;
  },
  toggleOverlay = function() {
    if (overlay.className === "hide-overlay") {
      overlay.classList.toggle('hide-overlay');
    }
    var backcolor = window.getComputedStyle(this, null).getPropertyValue('background-color');
    var overcolorlink = document.querySelectorAll('body > div.overlay > div > ul > li');
    for (var i = 0, len = overcolorlink.length; i < len; i++) {
      overcolorlink[i].style.backgroundColor = backcolor;
      overcolorlink[i].setAttribute('data', i);
      overcolorlink[i].addEventListener('click', function(event) {
        var a = this.getAttribute('data');
        for (var i = 0; i < webpages.length; i++) {
          if (webpages[i].id === Number(a)) {
              overlay.className = "hide-overlay";
            images.style.backgroundImage = "url(" + webpages[i].img + ")";
            titles.textContent = webpages[i].title;
            sitinfo.textContent = webpages[i].siteInfo;
            link.textContent = webpages[i].link;
          }
        }
        c = a;
        return false;
      });
    }
  },
  webpages = [{
    'id': 0,
    'title': 'gifpaint.in',
    'img': 'assets/ezgif.com-754a7b199a.gif',
    'link': 'http://gifpaint.hulea.org/',
    'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  }, {
    'id': 1,
    'title': 'yourimage.io',
    'img': 'assets/1464932541.png',
    'link': 'http://yourimage.hulea.org/',
    'siteInfo': 'I used the JavaScript canvas API and paper.js to create this website. It allows users to use their mouse or touch device to paint with images from the Imgur API. It also uses a node.js server to allow users to save their creations locally. I also use this same approach to save all images that are created on the server.',
  }, {
    'id': 2,
    'title': '4d Chat',
    'img': 'assets/4d.png',
    'link': 'http://4dchat.hulea.org/',
    'siteInfo': 'This website is a work in progress. It uses three.js and node.js to create a  interactive observation work space for discussion and updates to a 3D project. I used three.js to upload files to the server that creates a room users can enter and see and move the object in view and the others in the room can see what the active user can see. In each room there is a localized chat session. The long term objective for this project is to continue to add functionality and upadte the design to release a 1.0 version late 2017.',
  }, {
    'id': 3,
    'title': 'nhm.org',
    'img': 'assets/nhm1.png',
    'link': 'http://nhm.org/',
    'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  }, {
    'id': 4,
    'title': 'nhm.org/pterosaurs',
    'img': 'assets/ptero.png',
    'link': 'http://nhm.org/pterosaurs/',
    'siteInfo': 'I converted old code from a game the institution paid for several years ago into a robust, responsive game that allows users to determine what pterosaur they “were,” based on question logic. The entire site was built off a responsive framework that I developed, because I needed all the code to play together, and a framework would have slowed the process. I created a “pterosaur tracker” that used the Google maps API and JS to show a pterosaur fly across the U.S., making stops on its way to the museum. I utilized the JS Canvas API to create an image that would follow the rotational position of the KML points which gave a feeling of the pterosaur actually flying. I used requestAnimationFrame and the rendering engine which provided the pterosaur flying on the Google Map with 60fps, allowing fluid animation and preventing jitter.',
  }];
window.onload = function() {
  for (var w = 0; w < webpages.length; w++) {
        var h = '<li><a href="#"><p contenteditable="true" >'+webpages[w].title+'</p><img src="" alt=""></a></li>';
        document.getElementById('weblist').innerHTML += h;
  }
  var menubuttons = document.querySelectorAll('.list');
  for (var i = 0, len = menubuttons.length; i < len; i++) {
    menubuttons[i].addEventListener('click', toggleOverlay);
  }
  images.style.backgroundImage = "url(" + webpages[c].img + ")";
  titles.textContent = webpages[c].title;
  sitinfo.textContent = webpages[c].siteInfo;
  link.textContent = webpages[c].link;
  if (back !== null) {
    back.style.display = "block";
  }
  document.getElementById("load").style.display = 'none';
};
next.addEventListener('click', function(event) {
  c++;
  if (c >= webpages.length) {
    c = 0;
  }
  for (var i = 0; i < webpages.length; i++) {
    if (webpages[i].id === c) {
      images.style.backgroundImage = "url(" + webpages[i].img + ")";
      titles.textContent = webpages[i].title;
      sitinfo.textContent = webpages[i].siteInfo;
      link.textContent = webpages[i].link;
    }
  }
  return false;
});
close.addEventListener('click', function(event) {
  overlay.className = "hide-overlay";
  return false;
});