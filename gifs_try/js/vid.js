
(function() {
  var animloop, tryToLoadNextImage, urlFromLocation, urls;

  getWindowSize = function() {
    var d, e, g, w;
    w = window;
    d = document;
    e = d.documentElement;
    g = d.getElementsByTagName("body")[0];
    window.cw = w.innerWidth || e.clientWidth || g.clientWidth;
    window.ch = w.innerHeight || e.clientHeight || g.clientHeight;
    window.cMin = Math.min(cw, ch);
    return window.cMax = Math.max(cw, ch);
  };

  sizeCanvas = function(w, h) {
    window.canvas = document.getElementById("canvas");
    canvas.setAttribute("height", h);
    return canvas.setAttribute("width", w);
  };

  sizeContext = function(w, h) {
    return window.ctx = document.getElementById("canvas").getContext("2d");
  };  

  getWindowSize();

  sizeCanvas(cw, ch);

  sizeContext(cw, ch);

  window.imageSmoothing = function(a, context) {
    var c;
    if (a == null) {
      a = false;
    }
    if (context == null) {
      context = ctx;
    }
    c = context;
    c.webkitImageSmoothingEnabled = a;
    c.mozImageSmoothingEnabled = a;
    return c.imageSmoothingEnabled = a;
  };

  window.ctx = document.getElementById("canvas").getContext("2d");

  window.time = 0;

  window.requestAnimFrame = (function() {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback, element) {
      return window.setTimeout(callback, 1000 / 60);
    };
  })();

  ctx.fillRect(0, 0, cw, ch);

  animloop = function() {
    window.requestAnimFrame(animloop);
    imageSmoothing(false);
    ctx.drawImage(gif.frames[gif.currentFrame()].ctx.canvas, 0, 0);
  };

  tryToLoadNextImage = function() {
    if (urls.length === 0) {
      window.imageURL = "./img/load-error.gif";
    } else {
      window.imageURL = urls.shift();
    }
    console.log("loading " + imageURL);
    if (imageURL.substr(-3) === "gif") {
      window.gif = GIF(imageURL);
      gif.on("error", tryToLoadNextImage);
      gif.on("rendered", animloop);
      return gif.render();
    } else {
      window.img = new Image();
      img.addEventListener("error", tryToLoadNextImage);
      img.addEventListener("load", animloop);
      img.crossOrigin = "anonymous";
      return img.src = imageURL;
    }
  };

  urls = [];

  urlFromLocation = decodeURIComponent(window.location.search.trim().substr(1));

  urls.push(urlFromLocation);

  tryToLoadNextImage();

  console.log(gif);

}).call(this);



/*
//@ sourceMappingURL=gifmelt-old.map
*/
