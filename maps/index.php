
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>NHM PTERASAURS</title>
<style>
html{height:100%;}
body{height:100%;margin:0px;font-family: Helvetica,Arial;}
</style>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyA7-eWrq86PRFIcLN5rJ9FwviTFjpTYIo0"></script>
<script type ="text/javascript" src="scripts/v3_epoly.js"></script>
<script type ="text/javascript" src="scripts/rotate.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body onload="initialize()">
<img id="t" src="imgs/smaller.gif" style="display:none;"/>
<div id="tools" style="display:none;">
  <span>start:</span>
  <input type="text" name="start" id="start" value="augusta, ma"/>
  <span>end:</span>
  <input type="text" name="end" id="end" value="la mirada, CA"/>
  <input id="click" type="submit" onclick="calcRoute();"/>
</div>
<div class="header">
  <div class="left">
    <div class="nhmlogo"><img src="imgs/nhm.png" alt="NHM" title="NHM"></div>
  </div>
  <div class="right">
      <div class="plogo"><img src="" alt="" title=""></div>
        <div id="clockdiv">
          <div>
            <span class="days"></span>
            <div class="smalltext">Days</div>
          </div>
          <div>
            <span class="hours"></span>
            <div class="smalltext">Hours</div>
          </div>
          <div>
            <span class="minutes"></span>
            <div class="smalltext">Minutes</div>
          </div>
          <div>
            <span class="seconds"></span>
            <div class="smalltext">Seconds</div>
          </div>
        </div>
    </div>
</div>
<div id="map_canvas" style="width:100%;height:100%;"></div>
<script type="text/javascript">
window.onload = function(){
$(document).keypress(function(e) {
    if(e.which == 13) {
        calcRoute();
    }
});
};
</script>
<script type="text/javascript" src="scripts/countdown.js"></script>
</body>
</html>
