<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Reading KML Files with Google Maps JavaScript API Version 3</title>
    <style type="text/css">
    html,
    body,
    #map_canvas {
        width: 750px;
        height: 600px;
        margin: 0;
        padding: 0;
    }
    
    #loaddiv {
        BORDER-RIGHT: #785e4f 4px groove;
        PADDING-RIGHT: 20px;
        BORDER-TOP: #785e4f 4px groove;
        PADDING-LEFT: 20px;
        FONT-WEIGHT: bold;
        Z-INDEX: 100;
        FILTER: alpha(opacity=75);
        LEFT: 260px;
        PADDING-BOTTOM: 20px;
        MARGIN-LEFT: auto;
        BORDER-LEFT: #785e4f 4px groove;
        WIDTH: 250px;
        MARGIN-RIGHT: auto;
        PADDING-TOP: 20px;
        BORDER-BOTTOM: #785e4f 4px groove;
        POSITION: absolute;
        TOP: 308px;
        BACKGROUND-COLOR: #FFFFFF;
        /* BACKGROUND-COLOR: #e7b047; */
        TEXT-ALIGN: center;
        opacity: .75
    }
    
    .infowindow * {
        font-size: 90%;
        margin: 0
    }
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js">
    </script>
    <script type="text/javascript" src="https://rawgit.com/geocodezip/geoxml3/master/polys/geoxml3.js">
    </script>
    <script type="text/javascript" src="https://rawgit.com/geocodezip/geoxml3/master/ProjectedOverlay.js">
    </script>
    <script type="text/javascript">
    //<![CDATA[
    var geoXml = null;
    var geoXmlDoc = null;
    var map = null;
    var myLatLng = null;
    var myGeoXml3Zoom = true;
    var sidebarHtml = "";
    var infowindow = null;
    var kmlLayer = null;
    var filename = "p.kml";
    var geocoder = new google.maps.Geocoder();

    function MapTypeId2UrlValue(maptype) {
        var urlValue = 'm';
        switch (maptype) {
            case google.maps.MapTypeId.HYBRID:
                urlValue = 'h';
                break;
            case google.maps.MapTypeId.SATELLITE:
                urlValue = 'k';
                break;
            case google.maps.MapTypeId.TERRAIN:
                urlValue = 't';
                break;
            default:
            case google.maps.MapTypeId.ROADMAP:
                urlValue = 'm';
                break;
        }
        return urlValue;
    }

    // ========== This function will create the "link to this page"
    function makeLink() {
        //        var a="http://www.geocodezip.com/v3_MW_example_linktothis.html"
        var url = window.location.pathname;
        var a = url.substring(url.lastIndexOf('/') + 1) + "?lat=" + map.getCenter().lat().toFixed(6) + "&lng=" + map.getCenter().lng().toFixed(6) + "&zoom=" + map.getZoom() + "&type=" + MapTypeId2UrlValue(map.getMapTypeId());
        if (filename != "TrashDays40.xml") a += "&filename=" + filename;
        document.getElementById("link").innerHTML = '<a href="' + a + '">Link to this page<\/a>';
    }

    function initialize() {
        myLatLng = new google.maps.LatLng(37.422104808, -122.0838851);
        // these set the initial center, zoom and maptype for the map 
        // if it is not specified in the query string
        var lat = 37.422104808;
        var lng = -122.0838851;
        var zoom = 18;
        var maptype = google.maps.MapTypeId.ROADMAP;

        // If there are any parameters at eh end of the URL, they will be in  location.search
        // looking something like  "?marker=3"

        // skip the first character, we are not interested in the "?"
        var query = location.search.substring(1);

        // split the rest at each "&" character to give a list of  "argname=value"  pairs
        var pairs = query.split("&");
        for (var i = 0; i < pairs.length; i++) {
            // break each pair at the first "=" to obtain the argname and value
            var pos = pairs[i].indexOf("=");
            var argname = pairs[i].substring(0, pos).toLowerCase();
            var value = pairs[i].substring(pos + 1); //.toLowerCase();
            if (argname == "filename") {
                filename = unescape(value);
                if (filename.indexOf(",") > 0) {
                    filename = filename.split(",");
                }
            }

            var value = pairs[i].substring(pos + 1).toLowerCase();
            // process each possible argname  -  use unescape() if theres any chance of spaces
            if (argname == "id") {
                id = unescape(value);
            }
            if (argname == "marker") {
                index = parseFloat(value);
            }
            if (argname == "lat") {
                lat = parseFloat(value);
            }
            if (argname == "lng") {
                lng = parseFloat(value);
            }
            if (argname == "zoom") {
                zoom = parseInt(value);
                myGeoXml3Zoom = false;
            }
            if (argname == "type") {
                // from the v3 documentation 8/24/2010
                // HYBRID This map type displays a transparent layer of major streets on satellite images. 
                // ROADMAP This map type displays a normal street map. 
                // SATELLITE This map type displays satellite images. 
                // TERRAIN This map type displays maps with physical features such as terrain and vegetation. 
                if (value == "m") {
                    maptype = google.maps.MapTypeId.ROADMAP;
                }
                if (value == "k") {
                    maptype = google.maps.MapTypeId.SATELLITE;
                }
                if (value == "h") {
                    maptype = google.maps.MapTypeId.HYBRID;
                }
                if (value == "t") {
                    maptype = google.maps.MapTypeId.TERRAIN;
                }

            }
        }
        if (!isNaN(lat) && !isNaN(lng)) {
            myLatLng = new google.maps.LatLng(lat, lng);
        }
        var myOptions = {
            zoom: zoom,
            center: myLatLng,
            // zoom: 5,
            // center: myLatlng,
            mapTypeId: maptype
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
        infowindow = new google.maps.InfoWindow({});
        showLoad();
        var time = performance.now();
        geoXml = new geoXML3.parser({
            map: map,
            infoWindow: infowindow,
            singleInfoWindow: true,
            zoom: myGeoXml3Zoom,
            markerOptions: {
                optimized: false
            },
            afterParse: useTheData,
            failedParse: geoxmlErrorHandler
        });
        google.maps.event.addListener(geoXml, 'parsed', function() {
            var endTime = performance.now();

            document.getElementById('deltaTime').innerHTML = "elapsed time = " + (endTime - time).toFixed(3) + " ms";
            hideLoad();
        });
        geoXml.parse(filename);
        google.maps.event.addListener(map, "bounds_changed", makeSidebar);
        google.maps.event.addListener(map, "center_changed", makeSidebar);
        google.maps.event.addListener(map, "zoom_changed", makeSidebar);
        google.maps.event.addListenerOnce(map, "idle", makeSidebar);
        // Make the link the first time when the page opens
        makeLink();

        // Make the link again whenever the map changes
        google.maps.event.addListener(map, 'maptypeid_changed', makeLink);
        google.maps.event.addListener(map, 'center_changed', makeLink);
        google.maps.event.addListener(map, 'bounds_changed', makeLink);
        google.maps.event.addListener(map, 'zoom_changed', makeLink);
    };

    function kmlPgClick(pm) {
        if (geoXml.docs[0].placemarks[pm].polygon.getMap()) {
            google.maps.event.trigger(geoXmlDoc.placemarks[pm].polygon, "click");
        } else {
            geoXmlDoc.placemarks[pm].polygon.setMap(map);
            google.maps.event.trigger(geoXmlDoc.placemarks[pm].polygon, "click");
        }
    }

    function kmlPlClick(pm) {
        if (geoXml.docs[0].placemarks[pm].polyline.getMap()) {
            google.maps.event.trigger(geoXmlDoc.placemarks[pm].polyline, "click");
        } else {
            geoXmlDoc.placemarks[pm].polyline.setMap(map);
            google.maps.event.trigger(geoXmlDoc.placemarks[pm].polyline, "click");
        }
    }

    function kmlClick(pm) {
        if (geoXml.docs[0].placemarks[pm].marker.getMap()) {
            google.maps.event.trigger(geoXml.docs[0].placemarks[pm].marker, "click");
        } else {
            geoXmlDoc.placemarks[pm].marker.setMap(map);
            google.maps.event.trigger(geoXmlDoc.placemarks[pm].marker, "click");
        }
    }

    function kmlShowPlacemark(pm) {
        if (geoXmlDoc.placemarks[pm].polygon) {
            map.fitBounds(geoXmlDoc.placemarks[pm].polygon.bounds);
        } else if (geoXmlDoc.placemarks[pm].polyline) {
            map.fitBounds(geoXmlDoc.placemarks[pm].polyline.bounds);
        } else if (geoXmlDoc.placemarks[pm].marker) {
            map.setCenter(geoXmlDoc.placemarks[pm].marker.getPosition());
        }

        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            var placemark = geoXmlDoc.placemarks[i];
            if (i == pm) {
                if (placemark.polygon) placemark.polygon.setMap(map);
                if (placemark.polyline) placemark.polyline.setMap(map);
                if (placemark.marker) placemark.marker.setMap(map);
            } else {
                if (placemark.polygon) placemark.polygon.setMap(null);
                if (placemark.polyline) placemark.polyline.setMap(null);
                if (placemark.marker) placemark.marker.setMap(null);
            }
        }
    }

    var highlightOptions = {
        fillColor: "#FFFF00",
        strokeColor: "#000000",
        fillOpacity: 0.9,
        strokeWidth: 10
    };
    var highlightLineOptions = {
        strokeColor: "#FFFF00",
        strokeWidth: 10
    };

    function kmlHighlightPoly(pm) {
        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            var placemark = geoXmlDoc.placemarks[i];
            if (i == pm) {
                if (placemark.polygon) placemark.polygon.setOptions(highlightOptions);
                if (placemark.polyline) placemark.polyline.setOptions(highlightLineOptions);
            } else {
                if (placemark.polygon) placemark.polygon.setOptions(placemark.polygon.normalStyle);
                if (placemark.polyline) placemark.polyline.setOptions(placemark.polyline.normalStyle);
            }
        }
    }

    function kmlUnHighlightPoly(pm) {
        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            if (i == pm) {
                var placemark = geoXmlDoc.placemarks[i];
                if (placemark.polygon) placemark.polygon.setOptions(placemark.polygon.normalStyle);
                if (placemark.polyline) placemark.polyline.setOptions(placemark.polyline.normalStyle);
            }
        }
    }


    function showAll() {
        map.fitBounds(geoXmlDoc.bounds);
        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            var placemark = geoXmlDoc.placemarks[i];
            if (placemark.polygon) placemark.polygon.setMap(map);
            if (placemark.polyline) placemark.polyline.setMap(map);
            if (placemark.marker) placemark.marker.setMap(map);
        }
    }

    function highlightPoly(poly, polynum) {
        //    poly.setOptions({fillColor: "#0000FF", strokeColor: "#0000FF", fillOpacity: 0.3}) ;
        google.maps.event.addListener(poly, "mouseover", function() {
            var rowElem = document.getElementById('row' + polynum);
            if (rowElem) rowElem.style.backgroundColor = "#FFFA5E";
            if (geoXmlDoc.placemarks[polynum].polygon) {
                poly.setOptions(highlightOptions);
            } else if (geoXmlDoc.placemarks[polynum].polyline) {
                poly.setOptions(highlightLineOptions);
            }
        });
        google.maps.event.addListener(poly, "mouseout", function() {
            var rowElem = document.getElementById('row' + polynum);
            if (rowElem) rowElem.style.backgroundColor = "#FFFFFF";
            poly.setOptions(poly.normalStyle);
        });
    }

    // == rebuilds the sidebar to match the markers currently displayed ==
    function makeSidebarPolygonEntry(i) {
        var name = geoXmlDoc.placemarks[i].name;
        if (!name || (name.length == 0)) name = "polygon #" + i;
        // alert(name);
        sidebarHtml += '<tr id="row' + i + '"><td onmouseover="kmlHighlightPoly(' + i + ');" onmouseout="kmlUnHighlightPoly(' + i + ');"><a href="javascript:kmlPgClick(' + i + ');">' + name + '</a> - <a href="javascript:kmlShowPlacemark(' + i + ');">show</a></td></tr>';

    }

    function makeSidebarPolylineEntry(i) {
        var name = geoXmlDoc.placemarks[i].name;
        if (!name || (name.length == 0)) name = "polyline #" + i;
        //alert(name);
        sidebarHtml += '<tr id="row' + i + '"><td onmouseover="kmlHighlightPoly(' + i + ');" onmouseout="kmlUnHighlightPoly(' + i + ');"><a href="javascript:kmlPlClick(' + i + ');">' + name + '</a> - <a href="javascript:kmlShowPlacemark(' + i + ');">show</a></td></tr>';

    }

    function makeSidebarEntry(i) {
        var name = geoXmlDoc.placemarks[i].name;
        if (!name || (name.length == 0)) name = "marker #" + i;
        // alert(name);
        sidebarHtml += '<tr id="row' + i + '"><td><a href="javascript:kmlClick(' + i + ');">' + name + '</a></td></tr>';
    }

    function makeSidebar() {
        sidebarHtml = '<table><tr><td><a href="javascript:showAll();">Show All</a></td></tr>';
        var currentBounds = map.getBounds();
        // if bounds not yet available, just use the empty bounds object;
        if (!currentBounds) currentBounds = new google.maps.LatLngBounds();
        if (geoXmlDoc && geoXmlDoc.placemarks) {
            for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
                if (geoXmlDoc.placemarks[i].polygon) {
                    if (currentBounds.intersects(geoXmlDoc.placemarks[i].polygon.bounds)) {
                        makeSidebarPolygonEntry(i);
                    }
                }
                if (geoXmlDoc.placemarks[i].polyline) {
                    if (currentBounds.intersects(geoXmlDoc.placemarks[i].polyline.bounds)) {
                        makeSidebarPolylineEntry(i);
                    }
                }
                if (geoXmlDoc.placemarks[i].marker) {
                    if (currentBounds.contains(geoXmlDoc.placemarks[i].marker.getPosition())) {
                        makeSidebarEntry(i);
                    }
                }
            }
        }
        sidebarHtml += "</table>";
        document.getElementById("sidebar").innerHTML = sidebarHtml;
    }

    function geoxmlErrorHandler(doc) {
        showParseError();
        alert("GEOXML3: failed parse");
    }
/*
    function useTheData(doc) {
        var currentBounds = map.getBounds();
        if (!currentBounds) currentBounds = new google.maps.LatLngBounds();
        // Geodata handling goes here, using JSON properties of the doc object
        sidebarHtml = '<table><tr><td><a href="javascript:showAll();">Show All</a></td></tr>';
        //  var sidebarHtml = '<table>';
        geoXmlDoc = doc[0];
        if (!geoXmlDoc || !geoXmlDoc.placemarks) return;
        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            
            var placemark = geoXmlDoc.placemarks[i];


            if (placemark.polygon) {
                if (currentBounds.intersects(placemark.polygon.bounds)) {
                    makeSidebarPolygonEntry(i);
                }
                var normalStyle = {
                    strokeColor: placemark.polygon.get('strokeColor'),
                    strokeWeight: placemark.polygon.get('strokeWeight'),
                    strokeOpacity: placemark.polygon.get('strokeOpacity'),
                    fillColor: placemark.polygon.get('fillColor'),
                    fillOpacity: placemark.polygon.get('fillOpacity')
                };

                placemark.polygon.normalStyle = normalStyle;

                highlightPoly(placemark.polygon, i);
            }


            if (placemark.polyline) {
                if (currentBounds.intersects(placemark.polyline.bounds)) {
                    makeSidebarPolylineEntry(i);
                }
                var normalStyle = {
                    strokeColor: placemark.polyline.get('strokeColor'),
                    strokeWeight: placemark.polyline.get('strokeWeight'),
                    strokeOpacity: placemark.polyline.get('strokeOpacity')
                };
                placemark.polyline.normalStyle = normalStyle;

                highlightPoly(placemark.polyline, i);
            }



            if (placemark.marker) {
                if (currentBounds.contains(placemark.marker.getPosition())) {
                    makeSidebarEntry(i);
                }
            }

                //doc[0].markers[i].setVisible(false); 
            console.log(placemark.LineString[0].coordinates,placemark.polyline);
        }
        sidebarHtml += "</table>";
        document.getElementById("sidebar").innerHTML = sidebarHtml;
    };
    */

function createMarker(latlng) {
      // alert("createMarker("+latlng+","+label+","+html+","+color+")");
      //var contentString = '<b>' + label + '</b><br>' + html;
      var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          //title: label,
          //zIndex: Math.round(latlng.lat() * -100000) << 5
      });
      //marker.myname = label;
      //gmarkers.push(marker);

      //google.maps.event.addListener(marker, 'click', function() {
          //infowindow.setContent(contentString);
          //infowindow.open(map, marker);
      //});
      return marker;
  }


    function useTheData(doc) {
        var currentBounds = map.getBounds();
        if (!currentBounds) currentBounds = new google.maps.LatLngBounds();
        geoXmlDoc = doc[0];
        if (!geoXmlDoc || !geoXmlDoc.placemarks) return;
        for (var i = 0; i < geoXmlDoc.placemarks.length; i++) {
            var placemark = geoXmlDoc.placemarks[i];
            for (var m = placemark.LineString[0].coordinates.length - 1; m >= 0; m--) {
            var lat = placemark.LineString[0].coordinates[m].lat;
            var lng = placemark.LineString[0].coordinates[m].lng;
            var latlng = new google.maps.LatLng(lat, lng);
            createMarker(latlng)
            }
             console.log(placemark);
        }
    };



    function hide_kml() {

        geoXml.hideDocument();

    }

    function unhide_kml() {

        geoXml.showDocument();

    }

    function reload_kml() {
        geoXml.hideDocument();
        delete geoXml;
        geoXml = new geoXML3.parser({
            map: map,
            singleInfoWindow: true,
            afterParse: useTheData
        });
        geoXml.parse(filename);

    }

    function hide_markers_kml() {
        for (var i = 0; i < geoXmlDoc.markers.length; i++) {
            geoXmlDoc.markers[i].setVisible(false);
        }
    }

    function unhide_markers_kml() {
        for (var i = 0; i < geoXmlDoc.markers.length; i++) {
            geoXmlDoc.markers[i].setVisible(true);
        }
    }

    function hide_polys_kml() {
        for (var i = 0; i < geoXmlDoc.gpolylines.length; i++) {
            geoXmlDoc.gpolylines[i].setMap(null);
        }
    }

    function unhide_polys_kml() {
        for (var i = 0; i < geoXmlDoc.gpolylines.length; i++) {
            geoXmlDoc.gpolylines[i].setMap(map);
        }
    }

    function load_kmlLayer() {
        kmlLayer = new google.maps.KmlLayer(filename, {
            preserveViewport: !myGeoXml3Zoom
        });
        google.maps.event.addListener(kmlLayer, "status_changed", function() {
            document.getElementById('kmlstatus').innerHTML = "Kml Status:" + kmlLayer.getStatus();
        });
        kmlLayer.setMap(map);
    }

    function hide_kmlLayer() {
        kmlLayer.setMap(null);
    }

    function show_kmlLayer() {
        kmlLayer.setMap(map);
    }

    // A function to hide the loading message
    function hideLoad() {
        var loaddiv = document.getElementById("loaddiv");
        if (loaddiv == null) {
            alert("Sorry can't find the loaddiv");
            return;
        }
        //div found
        loaddiv.style.visibility = "hidden";
    }

    // A function to hide the loading message
    function showLoad() {
        var loaddiv = document.getElementById("loaddiv");
        if (loaddiv == null) {
            alert("Sorry can't find your loaddiv");
            return;
        }
        //div found
        loaddiv.style.visibility = "visible";
    }

    function showParseError() {
        var loaddiv = document.getElementById("loaddiv");
        if (loaddiv == null) {
            alert("Sorry can't find your loaddiv");
            return;
        }
        //div found
        loaddiv.style.visibility = "visible";
        loaddiv.innerHTML = "<b>XML parse error</b>";
    }

    function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                if (results[0].geometry.viewport)
                    map.fitBounds(results[0].geometry.viewport);
                else if (results[0].geometry.bounds)
                    map.fitBounds(results[0].geometry.bounds);
                else
                    map.setCenter(results[0].geometry.location);

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    //]]>
    </script>
</head>

<body onload="initialize()">
    <h4>Reading a <a href="http://code.google.com/intl/it-IT/apis/kml/documentation/">KML</a> file with Google Maps JavaScript API <a href="http://code.google.com/intl/it-IT/apis/maps/documentation/v3/">Version 3</a> and <a href="http://code.google.com/p/geoxml3/">geoxml3</a>.</h4>
    <div>
        <!--  <button onclick="hide_polys_kml();">hide polylines</button>
  <button onclick="unhide_polys_kml();">unhide polylines</button> -->
        <button onclick="hide_kml();">hide</button>
        <button onclick="unhide_kml();">unhide</button>
        <button onclick="hide_markers_kml();">hide markers</button>
        <button onclick="unhide_markers_kml();">show markers</button>
        <button onclick="load_kmlLayer();">load kmlLayer</button>
        <button onclick="hide_kmlLayer();">hide kmlLayer</button>
        <button onclick="show_kmlLayer();">show kmlLayer</button>
        <!--  <button onclick="reload_kml();">reload</button> -->
    </div>
    <div id="deltaTime"></div>
    <div id="loaddiv">Loading.....&#160;&#160;&#160; please wait!
        <br />
    </div>
    <table style="width:100%;">
        <tr>
            <td>
                <div id="map_canvas">
                </div>
            </td>
            <td>
                <div id="sidebar" style="width:300px;height:600px; overflow:auto"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="link"></div>
            </td>
        </tr>
    </table>
    <div id="map_text">
    </div>
    <div id="kmlstatus"></div>
    <div>
        <input id="address" value="" />
        <input id="geocode" value="Geocode" type="button" onclick="codeAddress();" />
    </div>
    <div id="w3valid">
        <a href="http://validator.w3.org/check?uri=referer">
            <!-- target="validationresults" --><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
    </div>

</body>

</html>
