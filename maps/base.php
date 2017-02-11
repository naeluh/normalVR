
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7-eWrq86PRFIcLN5rJ9FwviTFjpTYIo0"></script>
<script type ="text/javascript" src="scripts/v3_epoly.js"></script>
<script type ="text/javascript" src="scripts/rotate.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body onload="initialize()">
<img id="t" src="imgs/smaller.gif" style="display:none;"/>
<div id="tools">
  <span>start:</span>
  <input type="text" name="start" id="start" value="union square, NY"/>
  <span>end:</span>
  <input type="text" name="end" id="end" value="times square, NY"/>
  <input type="submit" onclick="calcRoute();"/>
</div>
<div id="map_canvas" style="width:100%;height:100%;"></div>
</body>
</html>