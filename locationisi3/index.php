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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
<body>



  <header class="home-header"> <!-- header -->

    <nav class="navbar navbar-default" role="navigation">
	    <div class="">
        <div class="navbar-inner">
          <!-- logo-->
					<a href="index.php" title="Home" class="logo pull-left"><img src="img/logo.png" alt="logo"></a>
          <!-- logo ends -->

          <!-- Menu -->
          <ul class="nav pull-left" id="nav">
            <li class="selected"><a href="index.php" title="">Home</a></li>
            <li><a href="galerie.php" title="">Galerie</a></li>
            <li><a href="services.php" title="">Services</a></li>
            <li><a href="agencee.php" title="">Agences</a>

            </li>
            <li><a href="about.php" title="">A propos de nous</a></li>
            <li><a href="contact.php" title="">Contact</a></li>
          </ul>
          <!-- Menu ends -->

        </div>
      </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="singInForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="myModalLabel">Please Sing Up</h3>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="login-name" class="control-label">Login name:</label>
            <input type="text" class="form-control" id="login-name">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="password" class="form-control" id="password">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Log in</button>
          </div>
        </div>
      </div>
    </div>

	<div class="tp-banner-container main-slider">
		<div class="tp-banner" >
      <ul>
        <!-- SLIDE  -->
	      <li data-transition="fade" data-slotamount="" data-masterspeed="1500" data-thumb="img/slider-main/1.jpg" data-delay="8000"  data-saveperformance="off"  data-title="Our Workplace">
		      <!-- MAIN IMAGE -->
		      <img src="img/slider-main/1.jpg"  alt="kenburns1"  data-bgposition="left center" data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
		      <!-- LAYERS -->
              <div class="caption tp-resizeme skewfromrightshort big-caption"
			                data-x="center"
			                data-y="center"
                      data-voffset="-70"
			                data-speed="500"
			                data-start="1000"
			                data-easing="easeOutExpo"
			                data-splitin="chars"
			                data-splitout="none"
			                data-elementdelay="0.1"
			                data-endelementdelay="0.1"
			              >LOCATION MA
            </div>


						<div class="caption tp-resizeme lfl fadeout small-caption"
			                data-x="center"
			                data-y="center"
                      data-voffset="0"
                      data-hoffset = "0"
			                data-speed="500"
			                data-start="2000"
			                data-easing="easeOutExpot"
			                data-splitout="none"
			              >trouvez tout les agences à l'échel Oriental
            </div>


        </li>
	      <!-- SLIDE  -->
	      <li data-transition="slidedown" data-slotamount="1" data-masterspeed="1500" data-thumb="img/slider-main/2.jpg" data-delay="8000"  data-saveperformance="off"  data-title="New York City">
		      <!-- MAIN IMAGE -->
		      <img src="img/slider-main/2.jpg"  alt="kenburns6"  data-bgposition="center top" data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone" data-bgfit="110" data-bgfitend="100" data-bgpositionend="center center">
		      <!-- LAYERS -->

        </li>
	      <!-- SLIDE  -->
	      <li data-transition="slideleft" data-slotamount="1" data-masterspeed="1500" data-thumb="img/slider-main/3.jpg" data-delay="8000"  data-saveperformance="off"  data-title="Nerd Wisdom">
          <!-- MAIN IMAGE -->
		      <img src="img/slider-main/3.jpg"  alt="kenburns3"  data-bgposition="left top" data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right bottom">
		      <!-- LAYERS -->

            </div>
        </li>
      </ul>

    </div>
  </div>

  </header>



  <section> <!-- section -->



    <div class="f-bg big-search-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <form role="form" method="post" action="">
                <?php
 if(isset($_POST['btn']) )
                                            {
                                              if(empty($_POST["sea"]))
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir une marque !!!',   type: 'error' });</script>";

                                              }
                                              else{
            $req="SELECT `marque` FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM WHERE marque='".$_POST["sea"]."'";

                  $req1=$connexion->query($req);
                 // while($ligne=$req1->fetch(PDO::FETCH_ASSOC))
                //  if($req1)         {


                  //  $resultat=mysql_num_rows($req1);
                   // if($resultat>0){


                    //while($resultat=mysql_fetch_array($req))           {
                    $count=0;
                    while($ligne=$req1->fetch(PDO::FETCH_ASSOC)){

              if($ligne['marque']== $_POST['sea'] )
               {
                 $count++;
                }

            }
                if($count!=NULL)
           {
             $_SESSION['sea']=$_POST['sea'];
            echo '<script>
                              swal("Voiture trouvée !", {

                                }). then(function(result){
                                   window.location =\'galeriesimple.php\';
                                   });
                              </script>';
            // header('location:galerie.php');
           }
           elseif($count==0){
                                                          echo "<script>sweetAlert({  title: 'Oops!',   text: 'CETTE N EST PAS DISPONIBLE  !!!',   type: 'error' });</script>";
           }


                  }

                            }


      // $_SESSION['sea']=$_POST['sea'];

      // echo $_SESSION['sea'];





        ?>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" name="sea" id="sea" class="form-control input-lg" placeholder="Recherche par marque de voiture">
              <span class="input-group-addon">
                <button class="btn btn-default btn-lg" type="submit" name="btn" style="background-color: white;"><i class="fa fa-search"></i></button>

              </span>
            </div>
            <div id="countryList"></div>

            </form>

          </div>
        </div>
        <div class="spacer30"></div>
        <div class="row">
          <div class="col-sm-12">
           <p><a href="#" id="advanced-serach-container-button" class="advanced-serach-container-button">Recherche Avancée</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="d-bg advanced-search-container" id="advanced-search-container">
      <div class="container">


        <div class="row">
          <div class="col-xs-12">

            <form role="form1" method="post" class="form-dark">
                  <?php
 if(isset($_POST['btnn']) )
                                            {
                                              if(empty($_POST["mark"]) && empty($_POST["city"]) && empty($_POST["prixf"]) && empty($_POST["prixd"]))
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'Choissi un critére !!!',   type: 'error' });</script>";

                                              }
                                              else{


       $req="SELECT `marque`,`villeAgence`,`coutParJour` FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA WHERE 1=1";

        // if (isset($_POST['prixf']) && empty($_POST["prixd"])) $req.=" AND coutParJour LIKE '%".$_POST['prixf']."%'";
         //if (isset($_POST['prixd']) && empty($_POST["prixf"])) $req.=" AND coutParJour LIKE '%".$_POST['prixd']."%'";
       if (isset($_POST['mark']) && $_POST['mark'] )
          $req.=" AND marque LIKE '%".$_POST['mark']."%'";
         if (isset($_POST['city']) && $_POST['city'])
          $req.=" AND villeAgence LIKE '%".$_POST['city']."%'";
        if (isset($_POST['prixd']) && $_POST['prixd'] && isset($_POST["prixf"]) && $_POST["prixf"])
          $req.=" AND coutParJour BETWEEN '".$_POST['prixd']."' AND '".$_POST['prixf']."'";


        // if (isset($_POST['prixd']) && isset($_POST["prixf"])) $req.=" AND coutParJour BETWEEN ".$_POST['prixd']." AND ".$_POST['prixf'];
//marque LIKE '%".$_POST['mark']."%'

                  $req1=$connexion->query($req);
                 // while($ligne=$req1->fetch(PDO::FETCH_ASSOC))
                //  if($req1)         {


                  //  $resultat=mysql_num_rows($req1);
                   // if($resultat>0){


                    //while($resultat=mysql_fetch_array($req))           {
                    $count=0;
                    while($ligne=$req1->fetch(PDO::FETCH_ASSOC)){

              if($ligne['marque']== $_POST['mark'] || $ligne['villeAgence']== $_POST['city'] || $ligne['coutParJour']== $_POST['prixf'] || $ligne['coutParJour']== $_POST['prixd'])
               {
                 $count++;
                }

            }
                if($count!=0)
           {
             $_SESSION['markkk']=$_POST['mark'];
             $_SESSION['cityyy']=$_POST['city'];
             $_SESSION['prixddd']=$_POST['prixd'];
             $_SESSION['prixfff']=$_POST['prixf'];
            echo '<script>
                              swal("Voiture trouvée !", {

                               }). then(function(result){
                                   window.location =\'galerieAvanc.php\';
                                   });
                              </script>';
            // header('location:galerie.php');
           }
           elseif($count==0){
                                                          echo "<script>sweetAlert({  title: 'Oops!',   text: 'AUCUN RESULTAT  !!!',   type: 'error' });</script>";
           }


                  }

                            }


      // $_SESSION['sea']=$_POST['sea'];


//echo $req;

        ?>

              <div class="row">

                <div class="form-group col-sm-3">
                  <label for="b0">Marque</label>

        <select name="mark"  class="form-control input-l" >
           <!--<input type="text" name="markkk">-->
                                                      <option value="">Choisir Marque</option>
                                                      <?php
                                                      $sql1="SELECT * FROM marque";
                                                      $results=$connexion->query($sql1);
                                                      while($rs=$results->fetch(PDO::FETCH_ASSOC)){
                                                        ?>
                                                        <option value="<?php echo $rs["marque"]; ?>"><?php echo $rs["marque"]; ?></option>
                                                        <?php
                                                      }
                                                      ?>

                                                    </select>
                </div>

                <div class="form-group col-sm-3">
                  <label for="b1">Ville</label>
 <select name="city"  class="form-control input-l" >
                                                      <option value="">Choisir ville</option>
                                                      <?php
                                                      $sql1="SELECT * FROM agence";
                                                      $results=$connexion->query($sql1);
                                                      while($rs=$results->fetch(PDO::FETCH_ASSOC)){
                                                        ?>
                                                        <option value="<?php echo $rs["villeAgence"]; ?>"><?php echo $rs["villeAgence"]; ?></option>
                                                        <?php
                                                      }
                                                      ?>

                                                    </select>

                </div>
                  <div class="form-group col-sm-3">
                  <label for="b3">Prix de </label>
                  <input type="text" name="prixd" class="form-control  input-l" id="b4">
                </div>


                <div class="form-group col-sm-3">
                  <label for="b2">A</label>
                  <input type="text" name="prixf" class="form-control  input-l" id="b2" >
                </div>

               <!-- <div class="form-group col-sm-3">
                  <label for="b3">agency</label>
                  <input type="text" class="form-control input-lg" id="b3">
                </div>-->


              </div>


              <div class="spacer20"></div>
              <div class="row">

                <div class="col-sm-2 col-sm-offset-5">
                  <button type="submit" name="btnn" class="btn btn-default  col-xs-12">Rechercher</button>
                </div>


              </div>

            </form>

          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="full-tabs">

          <!-- Navigation Buttons -->

            <!-- Content -->


          </div>

        </div><!-- /row -->
    </div>

    <div class="spacer40"></div>


    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="news-box">
            <img src="img/blog-detail/1.jpg" alt="">
            <div class="overlay">
              <div class="table-cont">
                <div class="table-cell">
                  <h4><b> Sans engagement <b></h4>
                  <p class="hidden-sm hidden-xs">- Arrêt de votre abonnement à tout moment<br> <br>- Pas de frais de résiliation</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="news-box">
            <img src="img/blog-detail/2.jpg" alt="">
            <div class="overlay">
              <div class="table-cont">
                <div class="table-cell">
                  <h4><b> Un budget maîtrisé <b></h4>
                  <p class="hidden-sm hidden-xs">- Une tarification sur vos locations de 1 à 6 jours<br><br>- Des services et garanties inclus</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="news-box">
            <img src="img/blog-detail/3.jpg" alt="">
            <div class="overlay">
              <div class="table-cont">
                <div class="table-cell">
                  <h4><b> Une relation personnalisée <b> </h4>
                  <p class="hidden-sm hidden-xs">- Appelez-nous au 06 00 00 00 00 <br><br>- Ou envoyez-nous un email</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="clasic-slider flexslider">
            <ul class="slides">
              <li>
                <div class="caption">
                  <div class="table-cont">
                    <div class="table-cell">
                      <h2>Mazda MX5</h2>
                      <p>Utilisé, 6.5l, 300 000 km.</p>
                      <p>Seulement : <strong>300DH/Jour</strong></p>
                      <a href="#" class="btn btn-warning btn-lg margin-top-10" role="button">Détails</a>
                    </div>
                  </div>
                </div>
                <img src="img/slider-content/1.jpg"  alt=""/>
              </li>
              <li>
                <div class="caption">
                  <div class="table-cont">
                    <div class="table-cell">
                      <h2>Audi TT</h2>
                      <p>Utilisé, 5.5l, 100 000 km</p>
                      <p>Seulement: <strong>250DH/Jour</strong></p>
                      <a href="#" class="btn btn-default btn-lg margin-top-10" role="button">Détails</a>
                    </div>
                  </div>
                </div>
                <img src="img/slider-content/2.jpg"  alt=""/>
              </li>
              <li>
                <div class="caption">
                  <div class="table-cont">
                    <div class="table-cell">
                      <h2>Honda</h2>
                      <p>Utilisé, 4.5l, 150 000 km</p>
                      <p>Seulement: <strong>200DH/Jour</strong></p>
                      <a href="#" class="btn btn-danger btn-lg margin-top-10" role="button">Détails</a>
                    </div>
                  </div>
                </div>
                <img src="img/slider-content/3.jpg"  alt=""/>
              </li>
            </ul>
          </div>
        </div>

      </div>

    </div>




    <div class="spacer60"></div>

  </section> <!-- section ends -->


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
  <script>
$(document).ready(function(){
     $('#sea').keyup(function(){
          var query = $(this).val();
          if(query != '')
          {
               $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                         $('#countryList').fadeIn();
                         $('#countryList').html(data);
                    }
               });
          }
     });
     $(document).on('click', 'li', function(){
          $('#sea').val($(this).text());
          $('#countryList').fadeOut();
     });
});
</script>
  </body>
</html>
