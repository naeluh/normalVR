var overcolorlink = document.querySelectorAll('body > div.overlay > div > ul > li'),
    menubuttons = document.querySelectorAll('.list'),
    overlay = document.querySelector("body"),
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
        for (var i = 0, len = overcolorlink.length; i < len; i++) {
            overcolorlink[i].style.backgroundColor = backcolor;
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
        'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    }, {
        'id': 2,
        'title': '4d Chat',
        'img': 'assets/4d.png',
        'link': 'http://4dchat.hulea.org/',
        'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    }, {
        'id': 3,
        'title': 'nhm.org',
        'img': 'assets/nhm1.png',
        'link': 'http://nhm.org/',
        'siteInfo': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    }];

window.onload = function() {
    for (var i = 0, len = menubuttons.length; i < len; i++) {
        menubuttons[i].addEventListener('click', toggleOverlay);
    }
    images.style.backgroundImage = "url(" + webpages[i].img + ")";
    titles.textContent = webpages[i].title;
    sitinfo.textContent = webpages[i].siteInfo;
    link.textContent = webpages[i].link;
    if (back !== null) {
        back.style.display = "block";
    }


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
    console.log('hello'+c);
    return false;
});

close.addEventListener('click', function(event) {
    overlay.className = "hide-overlay";
    return false;
});
