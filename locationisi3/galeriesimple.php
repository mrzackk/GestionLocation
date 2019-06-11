 <!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<?php
require_once("bdconnexion.php");
session_start();
?>

<head>
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title>LOCA MA</title>
	<meta name="description" content="your description">
	<meta name="keywords" content="your keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon2.jpeg" rel="icon" type="image/png">
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
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="no-main-slider">

  <header class="home-header"> <!-- header -->
   <?php include("includes/header.php"); ?>

  </header>

  <section>





    <div class="f-bg big-search-container">
      <div class="container">

      </div>
    </div>


    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="page-title"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">



        <div class="col-sm-12">
          <div class="r-bg">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Popular cars</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                <div class="search-result-heading">

              <div class="btn-group">
                <a href="#" id="grid-view" class="btn btn-default active"><i class="fa fa-th i-margin"></i></a>
                <a href="#" id="list-view" class="btn btn-default "><i class="fa fa-list i-margin"></i></a>
              </div>
            </div>

            </div>


           </div>
        <div id="products" class="row">
            <?php
      //  echo $_SESSION["sea"];
           // echo $resultat;
                  $req="SELECT `idV`,`image`,`couleur`,`categorie`,`coutParJour`,`marque`,md.num FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM WHERE marque='".$_SESSION["sea"]."'";

                  $req1=$connexion->query($req);
                  while($ligne=$req1->fetch(PDO::FETCH_ASSOC))
                         {

                    $image=$ligne['image'];

                    $cat=$ligne['categorie'];
                    $cpj=$ligne['coutParJour'];
                    $marque=$ligne['marque'];

                    $couleur=$ligne['couleur'];
                   $num=$ligne['num'];

                   $id=$ligne['idV'];







            ?>

       <div class='item col-xs-6 col-sm-6 col-md-4'>
              <div class='search-result-item-container'>
                <div class='search-result-item-media'>

                  <?php
                          echo "  <img src='../gestionDesLocation/backend/images/".$image."' />";
               ?>

                </div>
              <div class='search-result-item-content'>
              <div class='title'><?php  echo $marque ?></div>

               <ul class='list-4'>
                  <li><strong>couleur:</strong> <?php echo $couleur?></li>
           <li><strong>Carburant:</strong> <?php echo $cat?></li>
                 <li><strong>Modele : </strong><?php echo $num?></li>
                  </ul>
                  <p class='grid-hidden'></p>
                  <div class='price'><?php echo $cpj.' MAD '?></div>

                  <?php
                  echo  "<a href=\"product-detail.php?idA=$id\"  class=\"btn btn-default\" role=\"button\">Details</a>";

                   ?>

            </div>
              </div>
          </div>

<?php  } ?>





      </div>



       </div>

          </div>
        </div>
      </div>
    </div>
    </div>

  </section> <!-- section ends -->


  <footer class="footer">  <!-- footer -->
    <div class="footer-top">
      <div class="footer-top-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <h4>Hot</h4>
              <ul class="list-2">
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Statistics</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Log in</a></li>
              </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
              <h4>Services</h4>
              <ul class="list-2">
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Statistics</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Log in</a></li>
              </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
              <h4>About us</h4>
              <ul class="list-2">
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Statistics</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Log in</a></li>
              </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
              <h4>Follow us</h4>
              <ul class="colored-social-icons-2">
                <li><a href="#" rel="external" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" rel="external" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" rel="external" class="twitter"><i class="fa fa-twitter"></i></a></li>

                <li><a href="#" rel="external" class="instagram"><i class="fa fa-instagram"></i></a></li>
              </ul>
              <div class="spacer25"></div>
              <h4>Subscribe</h4>
              <form role="form">
                <div class="input-group">
                  <input type="text" class="form-control footer-form-control" placeholder="E-mail">
                  <span class="input-group-addon">
                    <button class="btn btn-default" type="button"> <i class="fa fa-angle-right"></i> </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-bottom-bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-6" id="center">
              <p>&copy; RENTMA. 2018 - Created by <a href="#">SUP3</a>.</p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </footer>  <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/retina.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.countTo.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/ion.rangeSlider.min.js"></script>
  <script src="js/selectnav.js"></script>
  <script src="js/responsive-tabs.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/functions.js"></script>
	</body>
</html>
