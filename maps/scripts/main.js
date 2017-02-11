  var map;
  var directionDisplay;
  var directionsService;
  var stepDisplay;
  var markerArray = [];
  var position;
  var marker = null;
  var polyline = null;
  var poly2 = null;
  var speed = 0.000005,
      wait = 1;
  var infowindow = null;
  var timerHandle = null;
  var pImage = 'data:image/png;base64,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';


  function initialize() {
      infowindow = new google.maps.InfoWindow({
          size: new google.maps.Size(150, 50)
      });
      // Instantiate a directions service.
      directionsService = new google.maps.DirectionsService();

      // Create a map and center it on Manhattan.
      var myOptions = {
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

      address = 'new york';
      geocoder = new google.maps.Geocoder();
      geocoder.geocode({
          'address': address
      }, function(results, status) {
          map.setCenter(results[0].geometry.location);
      });

      // Create a renderer for directions and bind it to the map.
      var rendererOptions = {
          map: map
      };
      directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

      // Instantiate an info window to hold step text.
      stepDisplay = new google.maps.InfoWindow();

      polyline = new google.maps.Polyline({
          path: [],
          strokeColor: '#FF0000',
          strokeWeight: 3
      });

      poly2 = new google.maps.Polyline({
          path: [],
          strokeColor: '#FF0000',
          strokeWeight: 3
      });
  }

  var steps = [];

  function calcRoute() {

      if (timerHandle) {
          clearTimeout(timerHandle);
      }
      if (marker) {
          marker.setMap(null);
      }
      polyline.setMap(null);
      poly2.setMap(null);
      directionsDisplay.setMap(null);
      polyline = new google.maps.Polyline({
          path: [],
          strokeColor: '#FF0000',
          strokeWeight: 3
      });
      poly2 = new google.maps.Polyline({
          path: [],
          strokeColor: '#FF0000',
          strokeWeight: 3
      });
      // Create a renderer for directions and bind it to the map.
      var rendererOptions = {
          map: map
      };
      directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

      var start = document.getElementById("start").value;
      var end = document.getElementById("end").value;
      var travelMode = google.maps.DirectionsTravelMode.DRIVING;

      var request = {
          origin: start,
          destination: end,
          travelMode: travelMode
      };

      // Route the directions and pass the response to a
      // function to create markers for each step.
      directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);

              var bounds = new google.maps.LatLngBounds();
              var route = response.routes[0];
              startLocation = new Object();
              endLocation = new Object();

              // For each route, display summary information.
              var path = response.routes[0].overview_path;
              var legs = response.routes[0].legs;
              for (i = 0; i < legs.length; i++) {
                  if (i === 0) {
                      startLocation.latlng = legs[i].start_location;
                      startLocation.address = legs[i].start_address;
                      //   marker = createMarker(legs[i].start_location, "start", legs[i].start_address, "green");
                  }
                  endLocation.latlng = legs[i].end_location;
                  endLocation.address = legs[i].end_address;
                  var steps = legs[i].steps;
                  for (j = 0; j < steps.length; j++) {
                      var nextSegment = steps[j].path;
                      for (k = 0; k < nextSegment.length; k++) {
                          polyline.getPath().push(nextSegment[k]);
                          bounds.extend(nextSegment[k]);
                      }
                  }
              }
              polyline.setMap(map);
              map.fitBounds(bounds);
              map.setZoom(18);
              startAnimation();
          }
      });
  }



  var step = 50; // 5; // metres
  var tick = 100; // milliseconds
  var eol;
  var k = 0;
  var stepnum = 0;
  var speed = "";
  var lastVertex = 1;
  var t = 0;
  var c = 0;

  //=============== animation functions ======================
  function updatePoly(d) {
      // Spawn a new polyline every 20 vertices, because updating a 100-vertex poly is too slow
      if (poly2.getPath().getLength() > 20) {
          poly2 = new google.maps.Polyline([polyline.getPath().getAt(lastVertex - 1)]);
          // map.addOverlay(poly2)
      }

      if (polyline.GetIndexAtDistance(d) < lastVertex + 2) {
          if (poly2.getPath().getLength() > 1) {
              poly2.getPath().removeAt(poly2.getPath().getLength() - 1);
          }
          poly2.getPath().insertAt(poly2.getPath().getLength(), polyline.GetPointAtDistance(d));
      } else {
          poly2.getPath().insertAt(poly2.getPath().getLength(), endLocation.latlng);
      }
  }

  function animate(d) {
      t++;
      c++;
      //if (2 > t > 0) {
      map.setZoom(18);
      //}
      if (t > eol) {
          map.panTo(endLocation.latlng);
          marker.setPosition(endLocation.latlng);
          return;
      }
      var p = polyline.GetPointAtDistance(t);
      map.panTo(p);
      var lastPosn = marker.getPosition();
      marker.setPosition(p);
      heading = google.maps.geometry.spherical.computeHeading(lastPosn, p);
      rh = Math.round(heading);
      //console.log(heading , rh);
      marker.setOptions({
        icon: RotateIcon.makeIcon(pImage).setRotation({deg: rh}).getUrl()
      });
      updatePoly(t);
      requestAnimationFrame(animate);

  }

  function startAnimation() {
      var index = 0;
      eol = polyline.Distance();
      map.setCenter(polyline.getPath().getAt(0));
      marker = new google.maps.Marker({
          position: polyline.getPath().getAt(0),
          optomized: false,
          map: map,
          icon: {
              url: RotateIcon.makeIcon(pImage).setRotation({ deg: 0 }).getUrl()
          }
      })
      poly2 = new google.maps.Polyline({
          path: [polyline.getPath().getAt(0)],
          strokeColor: "#0000FF",
          strokeWeight: 10
      });
      animate(0.01);
      map.setZoom(18);
  }

  google.maps.event.addDomListener(window, 'load', initialize);

  //=============== ~animation funcitons =====================
  /*
  var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";

  var icon = {
      path: car,
      scale: .7,
      strokeColor: 'white',
      strokeWeight: .10,
      fillOpacity: 1,
      fillColor: '#404040',
      offset: '5%',
      // rotation: parseInt(heading[i]),
      anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
  };
  */



  $.fn.animateRotate = function(angle, complete) {
      return this.each(function() {
          var $elem = $(this);

          $({ deg: 0 }).animate({ deg: angle }, {
              step: function(now) {
                  $elem.css({
                      transform: 'rotate(' + now + 'deg)'
                  });
              },
              complete: complete || $.noop
          });
      });
  };
