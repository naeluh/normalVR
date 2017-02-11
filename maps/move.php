<!DOCTYPE html>
<html>
<head>
  <meta content="initial-scale=1.0, user-scalable=no" name="viewport">
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>
  </title>
  <style>html{height:100%;}body{height:100%;margin:0px;font-family: Helvetica,Arial;}</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXDUrm8-K8y9fh4sy3k5rsngEl6vdKlMQ"></script>
  <script src="https://rawgit.com/geocodezip/geoxml3/master/polys/geoxml3.js" type="text/javascript"></script>
  <script src="https://rawgit.com/geocodezip/geoxml3/master/ProjectedOverlay.js" type="text/javascript"></script>
  <script src="scripts/downloadxml.js" type="text/javascript"></script>
  <script src="scripts/v3_epoly.js" type="text/javascript"></script>
  <script src="scripts/rotate.js" type="text/javascript"></script>
  <script src="scripts/move.js" type="text/javascript"></script>
</head>
<body onload="initialize()">
  <!--
<div id="tools">
  <input type="button" onclick="startAnimation();" value="Restart" />
</div>
-->
  <div class="load" style=" position: absolute; width: 100vw; height: 100vh; background: #fff; z-index: 1; display: block;"><img src="imgs/loading.gif" style=" padding: 0; width: 25%; overflow: auto; margin: auto; position: absolute; top: 0; left: 0; bottom: 0; right: 0;">
  </div>
  <div id="map_canvas" style="width:100%;height:100%;">
  </div>
</body>
</html>