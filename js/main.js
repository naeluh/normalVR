/* Needs fixed */

if (window.location.href.indexOf('work') !== -1) { 

/* Needs fixed */

webpages = [{
    'id': 0,
    'title': '127.0.0.1',
    'img': '',
    'link': 'home',
    'siteInfo': '',
  }, {
    'id': 1,
    'title': 'Work',
    'img': '',
    'link': 'work',
    'siteInfo': '',
  }, {
    'id': 2,
    'title': 'Contact',
    'img': '',
    'link': 'work.php',
    'siteInfo': '',
  }, {
    'id': 3,
    'title': 'About',
    'img': '',
    'link': 'about',
    'siteInfo': '',
}];

work = [{
    'id': 0,
    'title': 'gifpaint.in',
    'img': 'assets/ezgif.com-754a7b199a.gif',
    'link': 'http://gifpaint.hulea.org/',
    'siteInfo': '<p>There are a lot of odd spaces in the internet, one of which is the animated gif. After completing yourimage.io, I was interested in extending the idea of random image collage and image painting to make use of animated content.</p><p> Utilizing gif.js, native canvas api and imgur I was able to create a website that has the ability to paint and collage with animated content. I want to add more brushes and the ability to save and share the artwork that is created.</P>',
  }, {
    'id': 1,
    'title': 'yourimage.io',
    'img': 'assets/1464932541.png',
    'link': 'http://yourimage.hulea.org/',
    'siteInfo': '<p>I used the JavaScript canvas API and paper.js to create this website. It allows users to use their mouse or touch device to paint with images from the Imgur API.</p><p> The program also allows user to save their creation </p><p> Using the combination of the unknown (Not knowing which image will be next), collage (<a target="_blank" href="https://en.wikipedia.org/wiki/Collage">https://en.wikipedia.org/wiki/Collage</a>), and a version of action painting (<a target="_blank" href="https://en.wikipedia.org/wiki/Action_painting">https://en.wikipedia.org/wiki/Action_painting</a>) the results become unique artwork to share.</p><p> I move this logic forward with the gif paint program I also developing.</p>',
  }, {
    'id': 2,
    'title': '4dchat.hulea.org',
    'img': 'assets/4d.png',
    'link': 'http://4dchat.hulea.org/',
    'siteInfo': '<p>This website is a work in progress. It uses three.js and node.js to create a  interactive observation work space for discussion and updates to a 3D project. I used three.js to upload files to the server that creates a room users can enter and see and move the object in view and the others in the room can see what the active user can see. In each room there is a localized chat session.</p> <p>The long term objective for this project is to continue to add functionality and upadte the design to release a 1.0 version late 2017.</p>',
  }, {
    'id': 3,
    'title': 'nhm.org',
    'img': 'assets/nhm1.png',
    'link': 'http://nhm.org/',
    'siteInfo': '<p>For the main NHM site I coded a step-by-step field trip sign-up mechanism for the education department, with specific logic that catered to very specific needs. I wrote the new homepage design that updated an aging design with a more pointed and strategic design, that benefited not only use of the page but also leveraging possible analytic conversion.</p><p> I added a custom calendar front end and back end solution that works with Drupal, providing end points that can power multiple contexts throughout the site. This year, I worked with our digital designer to add a modernized basic template that is responsive and uses a new menu that makes us of Drupal’s menu system so it could be maintained by Drupal’s GUI. I make all the main updates and strategies that are implemented for the NHM websites and digital properties currently.</p>',
  }, {
    'id': 4,
    'title': 'nhm.org/pterosaurs',
    'img': 'assets/ptero.png',
    'link': 'http://nhm.org/pterosaurs/',
    'siteInfo': '<p>I converted old code from a game the institution paid for several years ago into a robust, responsive game that allows users to determine what pterosaur they “were,” based on question logic.</p><p> The entire site was built off a responsive framework that I developed, because I needed all the code to play together, and a framework would have slowed the process. I created a “pterosaur tracker” that used the Google maps API and JS to show a pterosaur fly across the U.S., making stops on its way to the museum. </p><p>I utilized the JS Canvas API to create an image that would follow the rotational position of the KML points which gave a feeling of the pterosaur actually flying. I used requestAnimationFrame and the rendering engine which provided the pterosaur flying on the Google Map with 60fps, allowing fluid animation and preventing jitter.</p>',
}];

console.log('js');

var parser = window.location;
parser.href;     // => "full url"
parser.protocol; // => "http:"
parser.hostname; // => "example.com"
parser.port;     // => "3000"
parser.pathname; // => "/pathname/"
parser.search;   // => "?search=test"
parser.hash;     // => "#hash"
parser.host;     // => "example.com:3000"

console.log(parser);

var overlay = document.querySelector("body"),
  overcolor = document.querySelectorAll('.overlay'),
  //images = document.getElementById("image"),
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
            //images.style.backgroundImage = "url(" + webpages[i].img + ")";
            titles.textContent = webpages[i].title;
            sitinfo.textContent = webpages[i].siteInfo;
            link.textContent = webpages[i].link;
          }
        }
        c = a;
        return false;
      });
    }
  };
window.onload = function() {


  for (var w = 0; w < webpages.length; w++) {
        var h = '<li><a href="#"><p contenteditable="false" >'+webpages[w].title+'</p><img src="" alt=""></a></li>';
        document.getElementById('weblist').innerHTML += h;
  }
  var menubuttons = document.querySelectorAll('.list');
  for (var i = 0, len = menubuttons.length; i < len; i++) {
    menubuttons[i].addEventListener('click', toggleOverlay);
  }
  //images.style.backgroundImage = "url(" + webpages[c].img + ")";
  titles.textContent = webpages[c].title;
  sitinfo.innerHTML = webpages[c].siteInfo;
  link.textContent = webpages[c].link;
  if (back !== null) {
    back.style.display = "block";
  }
  document.getElementById("load").style.display = 'none';
};

for (var i = 0; i < work.length; i++) {
  content = '<section class="offset0"><a href="pages.php?webpage='+i+'" title="#" alt="#"><div  class="imgHero" style="background-image: url('+work[i].img+')"></div><h2 class="imgTitle">'+work[i].title+'</h2></a></section>';
  document.getElementById('work_content').insertAdjacentHTML('beforeend',content);
}

close.addEventListener('click', function(event) {
  overlay.className = "hide-overlay";
  document.body.scrollTop = document.documentElement.scrollTop = 0;
  return false;
});

/* Needs fixed */

} else {

/* Needs fixed */

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
                        //images.style.backgroundImage = "url(" + webpages[i].img + ")";
                        //titles.textContent = webpages[i].title;
                        //sitinfo.textContent = webpages[i].siteInfo;
                        //link.textContent = webpages[i].link;
                    }
                }
                c = a;
                return false;
            });
        }
    },
    menus = [{
        'id': 0,
        'title': '127.0.0.1',
        'img': '',
        'link': '/',
        'siteInfo': '',
    }, {
        'id': 1,
        'title': 'Work',
        'img': '',
        'link': 'work.php',
        'siteInfo': '',
    }, {
        'id': 2,
        'title': 'Contact',
        'img': '',
        'link': 'contact.php',
        'siteInfo': '',
    }, {
        'id': 3,
        'title': 'About',
        'img': '',
        'link': 'about',
        'siteInfo': '',
    }],
    webpages = [{
        'id': 0,
        'title': 'gifpaint.in',
        'img': 'assets/ezgif.com-754a7b199a.gif',
        'link': 'http://gifpaint.hulea.org/',
        'siteInfo': '<p>There are a lot of odd spaces in the internet, one of which is the animated gif. After completing yourimage.io, I was interested in extending the idea of random image collage and image painting to make use of animated content.</p><p> Utilizing gif.js, native canvas api and imgur I was able to create a website that has the ability to paint and collage with animated content. I want to add more brushes and the ability to save and share the artwork that is created.</P>',
    }, {
        'id': 1,
        'title': 'yourimage.io',
        'img': 'assets/1464932541.png',
        'link': 'http://yourimage.hulea.org/',
        'siteInfo': '<p>I used the JavaScript canvas API and paper.js to create this website. It allows users to use their mouse or touch device to paint with images from the Imgur API.</p><p> The program also allows user to save their creation </p><p> Using the combination of the unknown (Not knowing which image will be next), collage (<a target="_blank" href="https://en.wikipedia.org/wiki/Collage">https://en.wikipedia.org/wiki/Collage</a>), and a version of action painting (<a target="_blank" href="https://en.wikipedia.org/wiki/Action_painting">https://en.wikipedia.org/wiki/Action_painting</a>) the results become unique artwork to share.</p><p> I move this logic forward with the gif paint program I also developing.</p>',
    }, {
        'id': 2,
        'title': '4dchat.hulea.org',
        'img': 'assets/4d.png',
        'link': 'http://4dchat.hulea.org/',
        'siteInfo': '<p>This website is a work in progress. It uses three.js and node.js to create a  interactive observation work space for discussion and updates to a 3D project. I used three.js to upload files to the server that creates a room users can enter and see and move the object in view and the others in the room can see what the active user can see. In each room there is a localized chat session.</p> <p>The long term objective for this project is to continue to add functionality and upadte the design to release a 1.0 version late 2017.</p>',
    }, {
        'id': 3,
        'title': 'nhm.org',
        'img': 'assets/nhm1.png',
        'link': 'http://nhm.org/',
        'siteInfo': '<p>For the main NHM site I coded a step-by-step field trip sign-up mechanism for the education department, with specific logic that catered to very specific needs. I wrote the new homepage design that updated an aging design with a more pointed and strategic design, that benefited not only use of the page but also leveraging possible analytic conversion.</p><p> I added a custom calendar front end and back end solution that works with Drupal, providing end points that can power multiple contexts throughout the site. This year, I worked with our digital designer to add a modernized basic template that is responsive and uses a new menu that makes us of Drupal’s menu system so it could be maintained by Drupal’s GUI. I make all the main updates and strategies that are implemented for the NHM websites and digital properties currently.</p>',
    }, {
        'id': 4,
        'title': 'nhm.org/pterosaurs',
        'img': 'assets/ptero.png',
        'link': 'http://nhm.org/pterosaurs/',
        'siteInfo': '<p>I converted old code from a game the institution paid for several years ago into a robust, responsive game that allows users to determine what pterosaur they “were,” based on question logic.</p><p> The entire site was built off a responsive framework that I developed, because I needed all the code to play together, and a framework would have slowed the process. I created a “pterosaur tracker” that used the Google maps API and JS to show a pterosaur fly across the U.S., making stops on its way to the museum. </p><p>I utilized the JS Canvas API to create an image that would follow the rotational position of the KML points which gave a feeling of the pterosaur actually flying. I used requestAnimationFrame and the rendering engine which provided the pterosaur flying on the Google Map with 60fps, allowing fluid animation and preventing jitter.</p>',
    }];

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}


window.onload = function() {

if (window.location.href.indexOf('pages') === -1 && window.location.href.indexOf('work') === -1 && window.location.href.indexOf('contact') === -1) {
var color = '#' + Math.random().toString(16).slice(2, 8).toUpperCase();
var block = document.getElementById('block')
    r = getRandomArbitrary(1.3432, 70.6546);
    block.style.transform = 'rotate3d(1, 1, 1, ' + r + 'deg)';
    block.style.webkitTransform = 'rotate3d(1, 1, 1, ' + r + 'deg)';
    block.style.backgroundColor = color;
}

    var uuid = window.location.search.replace('?webpage=', '');
    console.log(uuid)
    for (var w = 0; w < menus.length; w++) {
        var h = '<li><a href="' + menus[w].link + '"><p contenteditable="false" >' + menus[w].title + '</p><img src="" alt=""></a></li>';
        document.getElementById('weblist').innerHTML += h;
    }
    var menubuttons = document.querySelectorAll('.list');
    for (var i = 0, len = menubuttons.length; i < len; i++) {
        menubuttons[i].addEventListener('click', toggleOverlay);
    }
    if (window.location.href.indexOf('pages') !== -1) {
        for (var i = 0; i < webpages.length; i++) {
            if (webpages[i].id === Number(uuid)) {
                images.style.backgroundImage = "url(" + webpages[i].img + ")";
                titles.textContent = webpages[i].title;
                sitinfo.innerHTML = webpages[i].siteInfo;
                link.textContent = webpages[i].link;
                link.setAttribute('href', webpages[i].link);
            }
        }
    }
    if (back !== null) {
        back.style.display = "block";
    }
    if (window.location.href.indexOf('pages') !== -1) {
        next.addEventListener('click', function(event) {
            var c = window.location.search.replace('?webpage=', '');
            c++;
            this.setAttribute('href', 'pages.php?webpage=' + c)
            if (c >= webpages.length) {
                c = 0;
                this.setAttribute('href', 'pages.php?webpage=' + c)
            }
            for (var i = 0; i < webpages.length; i++) {
                if (webpages[i].id === c) {
                    images.style.backgroundImage = "url(" + webpages[i].img + ")";
                    titles.textContent = webpages[i].title;
                    sitinfo.innerHTML = webpages[i].siteInfo;
                    link.textContent = webpages[i].link;
                    link.setAttribute('href', webpages[i].link);
                }
            }
            document.body.scrollTop = document.documentElement.scrollTop = 0;
            return false;
        });
    } else {

    }
    document.getElementById("load").style.display = 'none';
};
close.addEventListener('click', function(event) {
    overlay.className = "hide-overlay";
    document.body.scrollTop = document.documentElement.scrollTop = 0;
    return false;
});

/* Needs fixed */

}

/* Needs fixed */

