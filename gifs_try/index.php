<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
  <![endif]-->
  <!--[if IE 7]>
  <html class="no-js lt-ie9 lt-ie8">
    <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9">
      <![endif]-->
      <!--[if gt IE 8]><!-->
      <html class="no-js">
        <!--<![endif]-->
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <title></title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width">
          <link rel="stylesheet" href="css/normalize.css">
          <link rel="stylesheet" href="css/main.css">
          <link rel="stylesheet" href="css/overlay.css">
          <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
          <style type="text/css">
           /*
            #load_overlay {
            display: block;
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            margin: 20px;
            cursor: pointer;
            float: left;
            }
            #load_overlay:hover {
            background-color: rgba(0, 0, 0, 1);
            }
            #close_overlay {
            display: block;
            width: 50px;
            height: 50px;
            background-color: rgba(221, 89, 0, 0.9);
            margin: 20px;
            cursor: pointer;
            float: left;
            z-index: 1000;
            }
            #close_overlay:hover {
            background-color: rgba(0, 0, 0, 1);
            }
            #name_download {
            }
            #name_download:hover {
            background-color: rgba(0, 0, 0, 1);
            }
            #canvas-options {
            position: absolute;
            color: rgb(255, 255, 255);
            z-index: 1;
            bottom: 0;
            }
            .main-container {
            background: url() no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }
            html {
            background: url() no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            z-index: -99999999999999999999999999999999999999999999999999;
            }
            #mycanvas {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            }
            */
            #contain {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            /*margin-top: 50px;*/
            }
            #mycanvas {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            }

          </style>
        </head>
        <body>


          <div id="contain">
          <canvas resize="true" width="1280" height="720" id="mycanvas"></canvas>
          </div>

          <form xmlns="http://www.w3.org/1999/xhtml" id="canvas-options">
          <div id="name_download"/><input type="hidden" class="filename" id="canvas-filename" placeholder="eyahuska" /></div>
          </form>
          <script src="js/gif.js"></script>
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')</script>

          <script src="http://cdn.eyahuska.com/paper.js"></script>
          <!--<script src="js/vid.js"></script>-->
          <script type="text/paperscript" src="js/paper_splat.js" canvas="mycanvas"></script>

          <script src="js/plugins.js"></script>
          <script src="js/main.js"></script>
          <script src="js/FileSaver.js"></script>
          <script src="js/canvas-toBlob.js"></script>
          <script src="js/Blob.js"></script>

          <script src="js/underscore.js"></script>
          <script src="js/spaceSave.js"></script>
          <script src="js/overlay.js"></script>
        </body>
      </html>
