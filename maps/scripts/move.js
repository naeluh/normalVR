var map;
var bounds = null;
var directionDisplay;
var directionsService;
var stepDisplay;
var markerArray = [];
var position;
var marker = null;
var polyline = null;
var poly2 = null;
var speed = 5E-6, wait = 1;
var infowindow = null;
var filename = "p.kml";
var myPano;
var panoClient;
var nextPanoId;
var timerHandle = null;
var geoXml = null;
var geoXmlDoc = null;
var myLatLng = null;
var myGeoXml3Zoom = true;
var sidebarHtml = "";
var kmlLayer = null;
var geocoder = new google.maps.Geocoder;
var pImage = "data:image/png;base64,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";
function createMarker(latlng, label, html) {
  var contentString = "<b>" + label + "</b><br>" + html;
  var marker = new google.maps.Marker({position:latlng, map:map, title:label, zIndex:Math.round(latlng.lat() * -1E5) << 5});
  marker.myname = label;
  google.maps.event.addListener(marker, "click", function() {
    infowindow.setContent(contentString);
    infowindow.open(map, marker);
  });
  return marker;
}
function initialize() {
  var query = location.search.substring(1);
  var pairs = query.split("&");
  for (var i = 0;i < pairs.length;i++) {
    var pos = pairs[i].indexOf("=");
    var argname = pairs[i].substring(0, pos).toLowerCase();
    var value = pairs[i].substring(pos + 1).toLowerCase();
    if (argname == "filename") {
      filename = unescape(value);
    }
  }
  infowindow = new google.maps.InfoWindow({size:new google.maps.Size(150, 50)});
  var myOptions = {center:new google.maps.LatLng(0, 0), zoom:13, mapTypeId:google.maps.MapTypeId.ROADMAP};
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  stepDisplay = new google.maps.InfoWindow;
  geoXml = new geoXML3.parser({infoWindow:infowindow, singleInfoWindow:true, zoom:myGeoXml3Zoom, markerOptions:{optimized:false}, afterParse:useTheData});
  geoXml.parse(filename);
}
function useTheData(doc) {
  var g = google.maps;
  bounds = new g.LatLngBounds;
  var pts = [];
  var length = 0;
  var point = null;
  geoXmlDoc = doc[0];
  if (!geoXmlDoc || !geoXmlDoc.placemarks) {
    return;
  }
  for (var i = 0;i < geoXmlDoc.placemarks.length;i++) {
    var placemark = geoXmlDoc.placemarks[i];
    for (var m = 0;m < placemark.LineString[0].coordinates.length;m++) {
      var lat = parseFloat(placemark.LineString[0].coordinates[m].lat);
      var lng = parseFloat(placemark.LineString[0].coordinates[m].lng);
      pts.push(new g.LatLng(lat, lng));
      if (m > 0) {
        length += pts[m - 1].distanceFrom(pts[m]);
        if (isNaN(length)) {
          alert("[" + m + "] length=" + length + " segment=" + pts[m - 1].distanceFrom(pts[m]));
        }
      }
      bounds.extend(pts[m]);
      point = pts[parseInt(m / 2)];
    }
  }
  //console.log(pts);
  polyline = new g.Polyline({map:map, path:pts, strokeColor:"#FF0000", strokeOpacity:1E-5, strokeWeight:0, clickable:true});
  map.fitBounds(bounds);
  startAnimation();
  poly2 = new google.maps.Polyline({path:[], strokeColor:"#FF0000", strokeOpacity:1E-5, strokeWeight:0, geodesic:true});
}
var steps = [];
var step = 500;
var tick = 100;
var eol;
var k = 0;
var stepnum = 0;
var speed = "";
var lastVertex = 1;
var t = 0;
function updatePoly(d) {
  if (poly2.getPath().getLength() > 100) {
    poly2 = new google.maps.Polyline([polyline.getPath().getAt(lastVertex - 1)]);
  }
  if (polyline.GetIndexAtDistance(d) < lastVertex + 2) {
    if (poly2.getPath().getLength() > 1) {
      poly2.getPath().removeAt(poly2.getPath().getLength() - 1);
    }
    poly2.getPath().insertAt(poly2.getPath().getLength(), polyline.GetPointAtDistance(d));
  } else {
    poly2.getPath().insertAt(poly2.getPath().getLength(), polyline.getPath().getAt(polyline.getPath().getLength() - 1));
  }
}
function animate(d) {
  //map.setZoom(19);
  t++;
  if (t > eol) {
    var endlocation = polyline.getPath().getAt(polyline.getPath().getLength() - 1);
    map.panTo(endlocation);
    marker.setPosition(endlocation);
    return;
  }
  var p = polyline.GetPointAtDistance(t);
  map.panTo(p);
  var lastPosn = marker.getPosition();
  marker.setPosition(p);
  heading = google.maps.geometry.spherical.computeHeading(lastPosn, p);
  rh = Math.round(heading);
  marker.setOptions({icon:RotateIcon.makeIcon(pImage).setRotation({deg:rh}).getUrl()});
  updatePoly(t);
  requestAnimationFrame(animate);
}
function startAnimation() {
  if (timerHandle) {
    clearInterval(timerHandle);
  }
  eol = polyline.Distance();
  map.setCenter(polyline.getPath().getAt(0));
  if (marker) {
    marker.setMap(null);
    delete marker;
    marker = null;
  }
  if (!marker) {
    marker = new google.maps.Marker({position:polyline.getPath().getAt(0), optomized:false, map:map, icon:{url:RotateIcon.makeIcon(pImage).setRotation({deg:0}).getUrl()}});
  }
  poly2 = new google.maps.Polyline({path:[polyline.getPath().getAt(0)], strokeColor:"#FF0000", strokeOpacity:1E-5, strokeWeight:0, geodesic:true});
  setTimeout(function() {
    animate(.01);
    $(".load").fadeOut("slow");
  }, 2E3);
}
;