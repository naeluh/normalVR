
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Nick Hulea</title>

	<!-- Included CSS Files -->
	<link rel="stylesheet" href="stylesheets/app.css">
  <link rel="stylesheet" href="stylesheets/offcanvas.css">
  <!--<link href="stylesheets/style.css" rel="stylesheet">-->
<style type="text/css">
.chart{width:100%;}
</style>

<script src="javascripts/foundation/modernizr.foundation.js"></script>


 </head>


  <body id="page" class="off-canvas">
	<div class="container" style="display:none;">

		<header id="header" class="row">
		  <div class="twelve columns phone-two">
		    <h1 id="site-title"><a href="http://hulea.org/"><object data="name.svg" type="image/svg+xml" class="chart">
        <!--[if lte IE 8 ]-->
            <img src="name.png" alt="nick hulea">
        <--![endif]-->
</object></a></h1>
            <div class="bar"></div>
		  </div>
		  <div class="eight columns phone-two">
		   <!-- <nav id="menu" role="navigation" class="hide-for-small">
    			<ul id="nav" class="nav-bar">
    				<li><a href="" class="main">One</a></li>
    				<li><a href="" class="main">Two</a></li>
    				<li><a href="" class="main">Three</a></li>
    				<li><a href="" class="main">Four</a></li>
    			</ul>
    		</nav>-->
  			<p class="show-for-small">

  			  <a class='sidebar-button button' id='sidebarButton' href="#sidebar" >Contact</a>
  			</p>
		  </div></header>


		<div class="row">
  		<section role="main">
  			<h3></h3>
  			<div class="row">
  			  <div class="twelve columns">
  			    <p align="center">Hello you have arrived at the web site of <strong>Nick Hulea</strong> <br>
      			  I am an <strong>artist</strong>, a <strong>designer</strong> and &nbsp;a <strong>web designer and developer</strong></p>
                <p align="center">Here is a list of things I can help with:</p>
                <p align="center"><strong>WEB</strong></p>
                <p align="center">HTML 5<br>
                  CSS 3<br>
                  JAVASCRIPT<br>
                  PHP - DRUPAL</p>
                <p align="center">RESPONSIVE FOR ALL DEVICES</p>
                <p align="center"><strong>3D</strong></p>
                <p align="center">RHINO 5<br>
                  3DS MAX<br>
                  VRAY</p>
                <p align="center">&nbsp;</p>
                <p align="center">I will be adding more examples of work so check back <strong>frequently</strong>.</p>
                <p align="center"><strong><a href="mailto:naeluh@gmail.com">Email Me</a></strong></p>
                <p align="center">Either Way thanks for contacting me !</p>
<p>&nbsp;</p>
      		</div>
        </div>
  		</section>

  		<section id="sidebar" role="complementary">
				<div id="ErrResults"><!-- retrive Error Here --></div>
        <div id="MainResult"><!-- retrive response Here --></div>
        <div id="MainContent">
        <fieldset>
            <legend>Fill out da Form</legend>
            <form id="MyContactForm" name="MyContactForm" method="post" action="">
            <label for="name" id="nameLb">Name <span class="error">Name Field Required</span></label>
            <input type="text" name="name" id="name" />
            <label for="email" id="emailLb">Email Address <span class="error">Email Field Required</span></label><input type="text" name="email" id="email" />
            <label for="phone" id="phoneLb">Phone <span class="error">Phone Field Required</span></label><input type="text" name="phone" id="phone" />
            <label for="message" id="messageLb">Message <span class="error">Message Required</span></label><textarea ame="message" id="message" ></textarea>
            <button>Submit</button>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            </form>
        </fieldset>
        </div>
  		</section>
		</div>



		<!--<nav id="bottomMenu" role="navigation" class="show-for-small">
			<ul id="bottomNav" class="nav-bar">
				<li><a href="">One</a></li>
				<li><a href="">Two</a></li>
				<li><a href="">Three</a></li>
				<li><a href="">Four</a></li>
			</ul>
		</nav>-->
    <footer class="site-footer row" role="contentinfo">
      <div class="twelve columns">
      </div>
    </footer>
  </div>


	<!-- Included JS Files -->
  <script src="javascripts/foundation/jquery.js"></script>
  <script src="javascripts/contact.js"></script>
  <script>$(document).ready(function() {
    $("#front").slideUp(1).delay('fast').slideDown('slow');
	$(".container").hide(0).delay(250).fadeIn(750)
	});</script>
  <script src="javascripts/foundation/jquery.foundation.reveal.js"></script>
  <script src="javascripts/foundation/jquery.foundation.orbit.js"></script>
  <script src="javascripts/foundation/jquery.foundation.forms.js"></script>
  <script src="javascripts/foundation/jquery.placeholder.js"></script>
  <script src="javascripts/foundation/jquery.foundation.tooltips.js"></script>
  <script src="javascripts/foundation/jquery.foundation.alerts.js"></script>
  <script src="javascripts/foundation/jquery.foundation.buttons.js"></script>
  <script src="javascripts/foundation/jquery.foundation.accordion.js"></script>
  <script src="javascripts/foundation/jquery.foundation.navigation.js"></script>
  <script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="javascripts/foundation/jquery.foundation.tabs.js"></script>
  <script src="javascripts/foundation/jquery.offcanvas.js"></script>
  <script src="javascripts/foundation/app.js"></script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-13081083-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
