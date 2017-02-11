<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<meta name="description" content="gif painting wip NSFW" />
<meta charset="utf-8">
<title>fuckoff</title>
<style id="jsbin-css">
html{
    overflow: hidden;
}
canvas {
    position:absolute;
    top:0px;
    left:0px;
}
#loading {
    position:absolute;
    top:0px;
    left:0px;
	  background:#000;
	  width:100%;
	  height:100%;
	  color:#fff;
}
</style>
</head>
<body>
<div id="loading" style="display:block;">Loading...</div>
<div id="gifs" style="display:block;"></div>
<script src="http://aa8f47fcc01b7584f779-b57f388ffba74a9d5600392ce75da4b1.r13.cf2.rackcdn.com/gif.js"></script>
<script src="http://aa8f47fcc01b7584f779-b57f388ffba74a9d5600392ce75da4b1.r13.cf2.rackcdn.com/AnimationFrame.js"></script>
<script id="jsbin-javascript">
var ajaxlength=[],value=isNaN(value)?0:value,valueajax=isNaN(valueajax)?0:valueajax,cvs=document.getElementById("mycanvas"),animationFrame=new AnimationFrame(120),ct=[],ct2=[],g=[],gifLoad=[],canarr=[],canarr2=[];function extractToken(a){a=a.match(/access_token=(\w+)/);return!!a&&a[1]}var token=extractToken(document.location.hash),clientId="b144351ffb05838";authorization=token?"Bearer "+token:"Client-ID "+clientId;
$.ajax({url:"https://api.imgur.com/3/gallery/random/random/page="+Math.floor(50*Math.random()),method:"GET",headers:{Authorization:authorization,Accept:"application/json"},crossDomain:!0,data:{image:localStorage.dataBase64,type:"base64"},beforeSend:function(){$("#loading").css("display","block")},success:function(a){$.each(a.data,function(c,b){if(!1!==a.data[c].animated&&!0!==a.data[c].is_album){var d=GIF(b.link);d.render();g.push(d);loadStupid();$("#gifs").html(g.length)}})}});
function loadStupid(){setTimeout(function(){$("#loading").fadeOut(1E3)},1E4*Number(g.length))}function createCanvas(a,c){var b=document.createElement("canvas");b.width=window.innerWidth;b.height=window.innerHeight;document.body.appendChild(b);var d=b.getContext("2d");a.push(d);c.push(b)}
window.addEventListener("mousemove",function(a){for(var c=0;c<g.length;c++){var b=ct2[c%ct2.length];0>=ct2.length||(b.globalCompositeOperation="source-over",b.beginPath(),b.arc(a.pageX,a.pageY,50,0,2*Math.PI,!1),b.fill(),b.fillStyle="rgba(255,255,255,1)")}});window.addEventListener("mousedown",function(a){createCanvas(ct,canarr);createCanvas(ct2,canarr2)});
function animloop(){animationFrame.request(animloop);for(var a=0;a<g.length;a++){var c=a%g.length,b=g[c],d=ct[c],e=ct2[c],c=canarr[c];0<ct.length&&0<ct2.length&&0<canarr.length&&0<g.length&&void 0!==d&&!0===b.rendered&&!0===b.loaded&&(d.clearRect(0,0,window.innerWidth,window.innerHeight),d.globalCompositeOperation="source-over",e.globalCompositeOperation="source-atop",e.drawImage(b.frames[b.currentFrame()].ctx.canvas,0,0,window.innerWidth,window.innerHeight),d.drawImage(c,0,0,window.innerWidth,window.innerHeight),
d.globalCompositeOperation="source-atop")}}animloop();window.addEventListener("resize",function(){for(var a=0;a<g.length;a++)0<canarr.length&&0<canarr2.length&&(canarr.width=window.innerWidth,canarr.height=window.innerHeight,canarr2.width=window.innerWidth,canarr2.height=window.innerHeight)});
</script>
</body>
</html>