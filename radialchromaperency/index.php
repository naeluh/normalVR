
<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <meta charset="utf-8">

<meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="radialchromaperency"/>
    <meta name = "viewport" content = "user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta property="og:url" content="http://hulea.org/radialchromaperency/"/>
    <meta property="og:title" content="radialchromaperency"/>
    <meta property="og:image" content="http://hulea.org/radialchromaperency/circ.png"/>
    <meta property="og:site_name" content="radialchromaperency"/>
    <meta property="og:description" content="radialchromaperency"/>
  <title>radialchromaperency</title>

<style id="jsbin-css">
body {
  overflow:hidden;
}

.sunburst {
   width: 2000px;
   height: 1090px;
   margin:-11px -11px -11px -11px;
   overflow: hidden;
   background: #fff;
  position:absolute;
  opacity:0.5;
  overflow:hidden;
}

.sunburst .outer {
   width: 2000px;
   height: 910px;
   padding-top: 1090px;
   margin: -449px 0 0 6px;
   -webkit-animation-name: rotate1;
   -webkit-animation-duration:2s;
   -webkit-animation-iteration-count:infinite;
   -webkit-animation-timing-function:linear;
   -moz-animation-name: rotate1;
   -moz-animation-duration:2s;
   -moz-animation-iteration-count:infinite;
   -moz-animation-timing-function:linear;
}

.sunburst b {
   display: block;
   width: 0;
   height: 0;
   border-width: 90px 1000px;
   margin: -180px 0 0 0;
   border-color: transparent black;
   border-style: solid;
}

.sunburst b:nth-child(1) { 
   -webkit-transform:rotate(20deg);  
   -moz-transform:rotate(20deg);  
}

.sunburst b:nth-child(2) { 
   -webkit-transform:rotate(40deg);  
   -moz-transform:rotate(40deg);  
}

.sunburst b:nth-child(3) { 
   -webkit-transform:rotate(60deg);  
   -moz-transform:rotate(60deg);  
}

.sunburst b:nth-child(4) { 
   -webkit-transform:rotate(80deg);  
   -moz-transform:rotate(80deg);  
}

.sunburst b:nth-child(5) { 
   -webkit-transform:rotate(100deg); 
   -moz-transform:rotate(100deg); 
}

.sunburst b:nth-child(6) {    
   -webkit-transform:rotate(120deg); 
   -moz-transform:rotate(120deg); 
}

.sunburst b:nth-child(7) { 
   -webkit-transform:rotate(140deg); 
   -moz-transform:rotate(140deg); 
}

.sunburst b:nth-child(8) { 
   -webkit-transform:rotate(160deg); 
   -moz-transform:rotate(160deg); 
}

.sunburst b:nth-child(9) { 
   -webkit-transform:rotate(180deg); 
   -moz-transform:rotate(180deg); 
}

@-webkit-keyframes rotate1 {
    from { -webkit-transform: rotate(0deg); }
    to   { -webkit-transform: rotate(20deg); }
}

@-moz-keyframes rotate1 {
    from { -moz-transform: rotate(0deg); }
    to   { -moz-transform: rotate(20deg); }
}

</style>
</head>

<body>
    <div class="sunburst"></div>
<script>
window.addEventListener('click',function(e){
   var w = $('.sunburst').width()/2;
   var h = $('.sunburst').height()/2;
   var x = e.pageX - w;
   var y = e.pageY - h;
   var color = "#" + Math.random().toString(16).slice(2, 8); 
   var color2 = "#" + Math.random().toString(16).slice(2, 8); 
  
   $('body').append('<div style="top:'+y+'px;left:'+x+'px;transform:scale(2);background:'+color2+';" class="sunburst"><div class="outer"><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b><b style="border-color:transparent '+color+';"></b></div></div>');
   
   //$('.sunburst').css({top: y, left: x});
    e.preventDefault();   
  
  
});
</script>
</body>

</html>
