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
    'siteInfo': 'There are a lot of odd spaces in the internet, one of which is the animated gif. After completing yourimage.io, I was interested in extending the idea of random image collage and image painting to make use of animated content. Utilizing gif.js, native canvas api and imgur I was able to create a website that has the ability to paint and collage with animated content. I want to add more brushes and the ability to save and share the artwork that is created.',
  }, {
    'id': 1,
    'title': 'yourimage.io',
    'img': 'assets/1464932541.png',
    'link': 'http://yourimage.hulea.org/',
    'siteInfo': 'I used the JavaScript canvas API and paper.js to create this website. It allows users to use their mouse or touch device to paint with images from the Imgur API. It also uses a node.js server to allow users to save their creations locally. I also use this same approach to save all images that are created on the server.',
  }, {
    'id': 2,
    'title': '4dchat.hulea.org',
    'img': 'assets/4d.png',
    'link': 'http://4dchat.hulea.org/',
    'siteInfo': 'This website is a work in progress. It uses three.js and node.js to create a  interactive observation work space for discussion and updates to a 3D project. I used three.js to upload files to the server that creates a room users can enter and see and move the object in view and the others in the room can see what the active user can see. In each room there is a localized chat session. The long term objective for this project is to continue to add functionality and upadte the design to release a 1.0 version late 2017.',
  }, {
    'id': 3,
    'title': 'nhm.org',
    'img': 'assets/nhm1.png',
    'link': 'http://nhm.org/',
    'siteInfo': 'For the main NHM site I coded a step-by-step field trip sign-up mechanism for the education department, with specific logic that catered to very specific needs. I wrote the new homepage design that updated an aging design with a more pointed and strategic design, that benefited not only use of the page but also leveraging possible analytic conversion. I added a custom calendar front end and back end solution that works with Drupal, providing end points that can power multiple contexts throughout the site. This year, I worked with our digital designer to add a modernized basic template that is responsive and uses a new menu that makes us of Drupal’s menu system so it could be maintained by Drupal’s GUI. I make all the main updates and strategies that are implemented for the NHM websites and digital properties currently.',
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