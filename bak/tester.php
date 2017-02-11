
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>imgur api and paperjs  - jsFiddle demo</title>
  
  <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
  <script type='text/javascript' src="http://cdn.eyahuska.com/papernew.js"></script>
  <script type='text/javascript' src="http://yourimage.io/dev_3/js/plugins.js"></script>
 
  <style type='text/css'>
    body {
    font-family:"Lucida Console", Monaco, monospace;
}
canvas {
    display:block;
    width:100%;
    overflow:hidden;
    position:absolute;
    top:0;
    left:0;
    margin-top:50px;
    cursor:pointer;
    z-index:-1;
}
#button {
    width:10%;
    overflow:hidden;
    position:absolute;
    top:0;
    left:0;
    background-color:#666;
    color:#fff;
    padding:10px;
}
#button:hover {
    background-color:#000;
    cursor:pointer;
}
#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:rgba(255, 255, 255, 0.5);
    z-index:100;
}
#status {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 250px;
    background: rgba(255, 255, 255, 0.90);
    padding: 22px 32px;
    font-family:"Lucida Console", Monaco, monospace;
}
#percentage {
    font-size:75px;
    font-family:"Lucida Console", Monaco, monospace;
}
  </style>
  


<script type='text/javascript'>
$(window).load(function(){
var canvas_options_form = document.getElementById("canvas-options");
var canvas_filename = document.getElementById("canvas-filename");
var img = document.createElement('img');
var canvas = document.getElementById('mycanvas');
var url = canvas.toDataURL(); // Read succeeds, canvas won't be dirty
canvas_options_form.addEventListener("submit", function (event) {
    event.preventDefault();
    canvas.toBlob(function (blob) {
        saveAs(
        blob, (canvas_filename.value || canvas_filename.placeholder) + ".png");
    }, "image/png");
}, false);
});  
</script>

</head>
<body>
  <canvas resize="true" id="mycanvas"></canvas>
<div id="preloader" style="display:none;">
    <div id="status">
        <div id="percentage"></div>
    </div>
</div>
<!--<div id="button">click</div>-->
<form id="canvas-options">
    <label>Filename:
        <input type="text" class="filename" id="canvas-filename" placeholder="doodle" />.png</label>
    <input type="submit" value="Save" />
</form>
<script type="text/paperscript" canvas="mycanvas">
    var r;
    var path;
    var preloadAmount = 4;
    var cache = [];
    var imgurcache = [];
    var convertCache = [];
    var resultcache = [];
    var rArray = [];
    var convertedArray = [];
    var ajaxlength = [];
    var raster;
    var background;
    var imagesrc;
    var numberofclicks = 0;
    var imagesrcs;
    var autoShowNext = false;
    var value = isNaN(value) ? 0 : value;
    var valueajax = isNaN(valueajax) ? 0 : valueajax;


    function base64(url) {
        var dataURL;
        var img = new Image(),
            canvas = document.createElement("canvas"),
            ctx = canvas.getContext("2d"),
            src = url; // insert image url here

        img.crossOrigin = "Anonymous";

        img.onload = function() {
            canvas.height = img.height;
            canvas.width = img.width;
            ctx.drawImage(img, 0, 0);
            var dataURL = canvas.toDataURL('image/png');
            canvas = null;
            preload(dataURL);
        };
        img.src = url;
    }

    function extractToken(hash) {
        var match = hash.match(/access_token=(\w+)/);
        return !!match && match[1];
    }
    var num = Math.floor(Math.random() * 10); // 0...6
    var token = extractToken(document.location.hash);
    var clientId = 'b144351ffb05838';
    var auth;
    if (token) authorization = 'Bearer ' + token;
    else authorization = 'Client-ID ' + clientId;
    $.ajax({
        url: 'https://api.imgur.com/3/gallery/random/random/page=' + num,
        method: 'GET',
        headers: {
            Authorization: authorization,
            Accept: 'application/json'
        },
        crossDomain: true,
        data: {
            image: localStorage.dataBase64,
            type: 'base64'
        },
        beforeSend: function() {
            $('#preloader').css('display', 'block');
        },
        success: handleData
    });

    function handleData(result) {

        $.each(result.data, function(idx, image) {
            if (result.data[idx].animated === false) {
                if (result.data[idx].is_album === false) {
                    if (result.data[idx].height < 500) {
                        var rimgur = image.link;
                        ajaxlength.push({
                            imageamount: valueajax++
                        })
                        var newimage = base64(rimgur);
                    }
                }
            }
        });
    }
    showNext();

    function onMouseDown(event) {
        showNext();
    }

    function showNext() {
        if (cache.length) {
            var numberofclicks = value++;



            if (numberofclicks == (imgurcache.length - 15)) {
                console.log('new');
                getMoreImages();
            }
            var img = cache.shift();
            autoShowNext = false;
            raster = new Raster(img.source);
            raster.position = view.center;
            raster.size = view.bounds;
            rArray.push(raster);
            //preload();
        } else {
            autoShowNext = true;
        }
    }

    function preload(dataURL) {
        imgurcache.push({
            image: dataURL
        });
        if (ajaxlength.length == imgurcache.length) {
            $('#preloader').fadeOut('slow');
        }
        var percent = Math.round(Number(imgurcache.length) / Number(ajaxlength.length) * 100);
        var ic = Number(imgurcache.length);
        var ac = Number(ajaxlength.length);
        if (percent >= 0 && percent <= 100) {
            $("#percentage").html('<b>' + percent + "%</b>");
        }
        if (percent >= 100) {
            $("#percentage").html('<b>Finishing Up...</b>');
        }
        if (ic == ac) setTimeout(function() {
            $("#preloader").fadeOut(250);
            $("#bar").fadeOut(250);
            $("#bar").css("width", 0);
            percent = 0;
        }, 1E3);

        var img = new Image();
        img.onload = function() {
            cache.push({
                source: img,
                position: view.center,
                size: view.bounds
            });
            if (cache.length < preloadAmount) {
                preload();
            }
            if (autoShowNext) {
                showNext();
            }
        };
        img.src = dataURL;

        if (convertCache.length == '2') {
            raster = new Raster(convertCache[0].source);
            raster.position = view.center;
            raster.size = view.bounds;
        }
    }

    function onResize(event) {
        if (background) background.fitBounds(view.bounds, true);
        if (raster) raster.fitBounds(view.bounds, true);
        if (rArray.length) {
            rArray.forEach(function(el) {
                el.fitBounds(view.bounds, true);
                el.position = view.center;
            });
        }
    }

    function getMoreImages() {
        function extractToken(hash) {
            var match = hash.match(/access_token=(\w+)/);
            return !!match && match[1];
        }
        var num = Math.floor(Math.random() * 10); // 0...6
        var token = extractToken(document.location.hash);
        var clientId = 'b144351ffb05838';
        var auth;
        if (token) authorization = 'Bearer ' + token;
        else authorization = 'Client-ID ' + clientId;
        $.ajax({
            url: 'https://api.imgur.com/3/gallery/random/random/page=' + num,
            method: 'GET',
            headers: {
                Authorization: authorization,
                Accept: 'application/json'
            },
            crossDomain: true,
            data: {
                image: localStorage.dataBase64,
                type: 'base64'
            },
            beforeSend: function() {
                $('#preloader').css('display', 'block');
            },
            success: handleData
        });

        function handleData(result) {
            $.each(result.data, function(idx, image) {
                if (result.data[idx].animated === false) {
                    if (result.data[idx].is_album === false) {
                        if (result.data[idx].height < 500) {
                            var rimgur = image.link;
                            ajaxlength.push({
                                imageamount: valueajax++
                            })
                            var newimage = base64(rimgur);
                        }
                    }
                }
            });
        }
    }
</script>
  
</body>


</html>

