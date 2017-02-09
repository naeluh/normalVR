<!doctype html>
<meta name="robots" content="noindex">
<html>

<head>
    <meta charset="utf-8">
    <title>Nick Hulea</title>
    <meta name="description" content="fuck nhm !">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://use.typekit.net/yer1yzk.js"></script>
    <script>
    try {
        Typekit.load({
            async: true
        });
    } catch (e) {}
    </script>
</head>

<body class="hide-overlay">
    <nav>
        <ul>
            <li class="list one"></li>
            <!--li class="list two"></li>
            <li class="list three"></li>
            <li class="list four"></li>
            <li class="list five"></li>
            <li class="list six"></li> -->
        </ul>
        <ul style="display:none;">
            <li class="list lines">
            	<span contenteditable="false" class="l1"></span>
            	<span contenteditable="false" class="l2"></span>
            	<span contenteditable="false" class="l3"></span>
            </li>
            <!-- <li class="list two"></li>
            <li class="list three"></li>
            <li class="list four"></li>
            <li class="list five"></li>
            <li class="list six"></li> -->
        </ul>
    </nav>
    <div class="overlay">
        <div class="overlay-content">
            <!-- <div id="title">
    <h1>Title</h1>
   </div> -->
            <div id="close"><span>close</span>
            </div>
            <ul id="weblist">
            </ul>
        </div>
    </div>
    <div class="background-content">
        <section class="offset60">
            <h1 contenteditable="false" id="title"></h1>
        </section>
        <section class="offset0">
            <div id="image" class="imgHero" style="background-image: url()"></div>
        </section>
        <section class="offset60">
            <h3><a contenteditable="false" id="link" target="_blank" href="http://gifpaint.hulea.org/"></a></h3>
            <p id="description" contenteditable="false"> </p>
        </section>
        <section class="offset40" style="display: none;">
            <a id="next" class="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </section>
    </div>
    <div id="load"><div><b>Loading ...</b></div></div> 
    <!-- <script type="text/javascript" src="js/main.js"></script> -->
    <script type="text/javascript">
        console.log('js');
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
    'title': '127.0.0.1',
    'img': '',
    'link': '',
    'siteInfo': '<p>There are a lot of odd spaces in the internet, one of which is the animated gif. After completing yourimage.io, I was interested in extending the idea of random image collage and image painting to make use of animated content.</p><p> Utilizing gif.js, native canvas api and imgur I was able to create a website that has the ability to paint and collage with animated content. I want to add more brushes and the ability to save and share the artwork that is created.</P>',
  }, {
    'id': 1,
    'title': 'Work',
    'img': 'assets/1464932541.png',
    'link': 'http://yourimage.hulea.org/',
    'siteInfo': '<p>I used the JavaScript canvas API and paper.js to create this website. It allows users to use their mouse or touch device to paint with images from the Imgur API.</p><p> The program also allows user to save their creation </p><p> Using the combination of the unknown (Not knowing which image will be next), collage (<a target="_blank" href="https://en.wikipedia.org/wiki/Collage">https://en.wikipedia.org/wiki/Collage</a>), and a version of action painting (<a target="_blank" href="https://en.wikipedia.org/wiki/Action_painting">https://en.wikipedia.org/wiki/Action_painting</a>) the results become unique artwork to share.</p><p> I move this logic forward with the gif paint program I also developing.</p>',
  }, {
    'id': 2,
    'title': 'Contact',
    'img': 'assets/4d.png',
    'link': 'http://4dchat.hulea.org/',
    'siteInfo': '<p>This website is a work in progress. It uses three.js and node.js to create a  interactive observation work space for discussion and updates to a 3D project. I used three.js to upload files to the server that creates a room users can enter and see and move the object in view and the others in the room can see what the active user can see. In each room there is a localized chat session.</p> <p>The long term objective for this project is to continue to add functionality and upadte the design to release a 1.0 version late 2017.</p>',
  }, {
    'id': 3,
    'title': 'About',
    'img': 'assets/nhm1.png',
    'link': 'http://nhm.org/',
    'siteInfo': '<p>For the main NHM site I coded a step-by-step field trip sign-up mechanism for the education department, with specific logic that catered to very specific needs. I wrote the new homepage design that updated an aging design with a more pointed and strategic design, that benefited not only use of the page but also leveraging possible analytic conversion.</p><p> I added a custom calendar front end and back end solution that works with Drupal, providing end points that can power multiple contexts throughout the site. This year, I worked with our digital designer to add a modernized basic template that is responsive and uses a new menu that makes us of Drupal’s menu system so it could be maintained by Drupal’s GUI. I make all the main updates and strategies that are implemented for the NHM websites and digital properties currently.</p>',
  }];
window.onload = function() {
  for (var w = 0; w < webpages.length; w++) {
        var h = '<li><a href="#"><p contenteditable="false" >'+webpages[w].title+'</p><img src="" alt=""></a></li>';
        document.getElementById('weblist').innerHTML += h;
  }
  var menubuttons = document.querySelectorAll('.list');
  for (var i = 0, len = menubuttons.length; i < len; i++) {
    menubuttons[i].addEventListener('click', toggleOverlay);
  }
  images.style.backgroundImage = "url(" + webpages[c].img + ")";
  titles.textContent = webpages[c].title;
  sitinfo.innerHTML = webpages[c].siteInfo;
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
      sitinfo.innerHTML = webpages[i].siteInfo;
      link.textContent = webpages[i].link;
    }
  }
  document.body.scrollTop = document.documentElement.scrollTop = 0;
  return false;
});
close.addEventListener('click', function(event) {
  overlay.className = "hide-overlay";
  document.body.scrollTop = document.documentElement.scrollTop = 0;
  return false;
});
    </script>
</body>

</html>
