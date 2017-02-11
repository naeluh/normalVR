
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>GIFS WIP : ANIMATING IN ONE CIRCLE</title>
  
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
      <script type='text/javascript' src="http://hulea.org/gifs_try/js/gif.js"></script>
    
  
  <style type='text/css'>
    canvas {
    overflow:hidden;
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}
html {
    width:100%;
    height:100%;
    overflow:hidden;
    position:absolute;
    top:0;
    left:0;
}
  </style>
  


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
var can = document.getElementById("canvas1");
var ctx = can.getContext("2d");
var mx = 0,
    my = 0;
var animloop, tryToLoadNextImage, giframe, urls;
can.width = window.innerWidth;
can.height = window.innerHeight;
w = window.innerWidth;
h = window.innerHeight;
var img = new Image();
img.onload = function () {};
img.src = "http://placekitten.com/500/500";

animloop = function () {
    requestAnimFrame(animloop);
};

gif = GIF('http://i.imgur.com/P3VmNwy.gif');
gif.on("rendered", animloop);
gif.render();

can.addEventListener("mousemove", function (e) {
    var mouse = {
        x: e.pageX,
        y: e.pageY
    };
    redraw(mouse);
}, false);

function redraw(mouse) {
    ctx.save();
    ctx.beginPath();
    animloop = function () {
        requestAnimFrame(animloop);
        ctx.arc(mouse.x, mouse.y, 100, 0, Math.PI * 2, true);
        ctx.clip();
        ctx.drawImage(gif.frames[gif.currentFrame()].ctx.canvas, 0, 0, w, h);
        ctx.restore();
    };
}

requestAnimFrame = (function () {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (callback, element) {
        return window.setTimeout(callback, 1000 / 60);
    };
})();
});//]]>  

</script>


<script src="http://debug.phonegap.com/target/target-script-min.js#jsf_zxc"></script></head>
<body>
  <canvas id="canvas1" style="z-index:1;"></canvas>
  
</body>


</html>

