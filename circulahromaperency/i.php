

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="circulahromaperency"/>
    <meta name = "viewport" content = "user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta property="og:url" content="http://hulea.org/circulahromaperency/"/>
    <meta property="og:title" content="circulahromaperency"/>
    <meta property="og:image" content="http://hulea.org/circulahromaperency/griding.png"/>
    <meta property="og:site_name" content="circulahromaperency"/>
    <meta property="og:description" content="circulahromaperency"/>
  <title>circulahromaperency</title>
  
  <script type='text/javascript' src='//code.jquery.com/jquery-1.10.1.js'></script>

  
  <style type='text/css'>
    canvas {
    width:100%;
    height:100%;
    overflow:hidden;
    position:absolute;
    top:0;
    left:0;
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
  
<body>
  <canvas id="c"></canvas> 

<script type='text/javascript'>
$(window).load(function(){

var viewportWidth = $(window).width();
var viewportHeight = $(window).height();
var isDrawing, points = [],
    radius = 15;

var el = document.getElementById('c');
var ctx = el.getContext('2d');

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

el.width = window.innerWidth;
el.height = window.innerHeight;
ctx.lineJoin = ctx.lineCap = 'round';

function init(e) {
    e.preventDefault();

    isDrawing = true;
    points.push({
        x: e.clientX,
        y: e.clientY,
        radius: getRandomInt(10, 50),
        opacity: 0.1
    });
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    repeatOften();

}

$('body').on("mousemove", init);
$('body').on("touchstart", init);
$('body').on("touchmove", init);

$(window).resize(function () {
    el.width = window.innerWidth;
    el.height = window.innerHeight;
    repeatOften();

});

function repeatOften() {
    for (var i = 0; i < points.length; i++) {
        ctx.beginPath();
        ctx.globalAlpha = points[i].opacity;
        ctx.arc(
        points[i].x, points[i].y, points[i].radius,
        false, Math.PI * 2, false);
        var color = "#" + Math.random().toString(16).slice(2, 8);
        ctx.fillStyle = color;
        ctx.strokeStyle = color;
        ctx.fill();
        ctx.stroke();
    }
    //requestAnimationFrame(repeatOften);
}

});

</script>



</body>


</html>

