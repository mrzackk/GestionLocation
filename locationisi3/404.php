<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title>RENT MA</title>
	<meta name="description" content="your description">
	<meta name="keywords" content="your keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" type="image/png">
  <!-- Bootstrap style -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <!-- Font Awesome Style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <!-- Animate Style -->
  <link href="css/animate.css" rel="stylesheet" media="screen" />
  <!-- Lightbox -->
  <link href="css/magnific-popup.css" rel="stylesheet" media="screen" />
  <!-- Flexslider Style -->
  <link href="css/flexslider.css" rel="stylesheet" media="screen" />
	<!-- Style css -->
  <link href="css/style.css" rel="stylesheet" media="screen" />
	<!-- Components css -->
  <link href="css/components.css" rel="stylesheet" media="screen" />
	<!-- Color style css -->

	<!-- Responsive css -->
  <link href="css/responsive.css" rel="stylesheet" media="screen" />
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link href="css/extralayers.css" rel="stylesheet" media="screen" />
	<link href="rs-plugin/css/settings.css" rel="stylesheet" media="screen" />
  <!-- Google Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cabin:400,600' rel='stylesheet' type='text/css'>
  <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>



  <header class="home-header"> <!-- header -->

  <?php include("includes/header.php"); ?>

  </header>

            <div id ="hi" class="container">

            <p class="pback">404, Page Not Found</p>
                <p class="p2back">Oooooops! Looks like nothing was found at this location.</p>
            <a href="index.html"> <input type="button" name="back" value="Go Back To Home Page" class="back" > </a>
            </div>


  <footer class="footer">  <!-- footer -->
    <?php include("includes/footer.php"); ?>
  </footer> <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery.isotope.min.js"></script>

  <script src="js/jquery.appear.js"></script>


  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/ion.rangeSlider.min.js"></script>
  <script src="js/selectnav.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/functions.js"></script>
  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
  <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

  <script type="text/javascript">

				jQuery(document).ready(function() {



					jQuery('.tp-banner').show().revolution(
					{
						dottedOverlay:"none",
						delay:16000,
						startwidth:1920,
						startheight:800,
						hideThumbs:200,

						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,

						navigationType:"none",
						navigationArrows:"solo",
						navigationStyle:"preview1",

						touchenabled:"on",
						onHoverStop:"off",

						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,

						parallax:"mouse",
						parallaxBgFreeze:"on",
						parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

						keyboardNavigation:"off",

						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						spinner:"spinner4",

						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",

						autoHeight:"off",
						forceFullWidth:"off",



						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,

						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						videoJsPath:"rs-plugin/videojs/",
						fullScreenOffsetContainer: ""
					});




				});	//ready

	</script>

  </body>
</html>
