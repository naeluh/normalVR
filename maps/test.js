/**
 * requestAnimationFrame version: "0.0.17" Copyright (c) 2011-2012, Cyril Agosta ( cyril.agosta.dev@gmail.com) All Rights Reserved.
 * Available via the MIT license.
 * see: http://github.com/cagosta/requestAnimationFrame for details
 *
 * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
 * http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
 * requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel
 * MIT license
 *
 */

(function() {

    if (typeof window === 'undefined')
        return

    if (window.requestAnimationFrame)
        return window.requestAnimationFrame

    if (window.webkitRequestAnimationFrame) { // Chrome <= 23, Safari <= 6.1, Blackberry 10
        window.requestAnimationFrame = window['webkitRequestAnimationFrame'];
        window.cancelAnimationFrame = window['webkitCancelAnimationFrame'] || window['webkitCancelRequestAnimationFrame'];
        return window.requestAnimationFrame
    }

    // IE <= 9, Android <= 4.3, very old/rare browsers

    var lastTime = 0;

    window.requestAnimationFrame = function(callback, element) {

        var currTime = new Date().getTime();
        var timeToCall = Math.max(0, 16 - (currTime - lastTime));
        var id = window.setTimeout(function() {
                callback(currTime + timeToCall);
            },
            timeToCall);
        lastTime = currTime + timeToCall;
        return id; // return the id for cancellation capabilities
    };

    window.cancelAnimationFrame = function(id) {
        clearTimeout(id);
    };

    if (typeof define === 'function') {
        define(function() {
            return window.requestAnimationFrame;
        })
    }

})();

/**
 * The application code
 *
 */
function initialize() {
    var myLatlng = new google.maps.LatLng(41.869561, -79.013672);

    var myOptions = {
        zoom: 5,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);


    var parser = new geoXML3.parser({map: map, processStyles: true});
    parser.parse("p.kml");

    console.log(parser);


    // Path we are animating along
    /*
    var route = new google.maps.Polyline({
        path: [
            new google.maps.LatLng(35, 110),
            new google.maps.LatLng(35, 100)
        ],
        map: map
    });
    */

    // Marker object we are animation
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(41.869561, -79.013672),
        map: map,
        icon: "http://placehold.it/32/ff0000" // Change this image to one you want
    });

    // Handle to requestAnimationFrame
    var requestID,
        // How many times we move
        steps = 0;

    /**
     * Method for animating marker along the line
     *
     */
    var draw = function() {

        // Controlling the speed of animation
        requestID = requestAnimationFrame(draw);

        // Current position of the marker
        var pos = marker.getPosition();

        // Next position of the marker (we use - 0.1 from previous position)
        marker.setPosition(new google.maps.LatLng(pos.lat(), pos.lng() - 0.1));

        // If we have reached the end of the path - cancel animationFrame
        if (steps === 99) {
            cancelAnimationFrame(requestID);
            return;
        }

        // Increasing steps
        steps++;

    };

    // Start animation
    draw();

}

// Init
google.maps.event.addDomListener(window, 'load', initialize);
