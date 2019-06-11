
<?php

 require_once("bdconnexion.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>



  <header class="home-header"> <!-- header -->
    <header class="home-header"> <!-- header -->
      <?php include("includes/header.php")?>






    </header>
  </header>

  <section>


  <div class="spacer60"></div>
      <div class="spacer60"></div> <div class="spacer60"></div>


  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Contactez nous</h1>
        </div>
      </div>
    </div>
    <div class="spacer30"></div>

    <div class="container">
      <div class="row">
          <div class="col-sm-8">

            <div class="r-bg">
          <form role="form" name="ajax-form" id="ajax-form"  method="post" class="form-main">


            <div class="row">
              <div class="form-group col-xs-6">
                <label for="name2">Nom</label>
                <input class="form-control input-lg" id="name2" name="name"  type="text" value="Nom">
                <div class="error" id="err-name" style="display: none;Color: Red;">Veuillez entrer votre nom</div>
              </div>
              <div class="form-group col-xs-6">
                <label for="email2">Email</label>
                <input class="form-control input-lg" id="email2" name="email" type="text" value="E-mail">
                <div class="error" id="err-emailvld" style="display: none;Color: Red;">E-mail Format n'est pas valide </div>
              </div>
            </div>
            <div class="form-group col-xs-14">
            <label for="objet">Objet</label>
                <input class="form-control input-lg" id="objet1" name="objet" type="text"  value="Objet" >
                <div class="error" id="err-message" style="display: none; Color: Red;">Veuillez entrer l'objet</div>
                </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="message2">Message</label>
                <textarea class="form-control" id="message2" name="message" >Message</textarea>
                <div class="error" id="err-message" style="display: none; Color: Red;">Veuillez entrer le message</div>

              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">

            <div id="ajaxsuccess" style="font-size: 150%; Color: green;">E-mail a été envoyé par succès
            </div>
            <div class="error" id="err-form" style="display: none;Color: Red;" >Un problème est survenu lors de la validation du formulaire, merci de vérifier!</div>
            <div class="error" id="err-timedout" style="font-size: 150%; Color: Red;">La connexion au serveur a expiré!</div>
            <div class="error" id="err-state"></div>
            <?php
                                            if(!empty($_POST)){
                                              if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["objet"]) ||
                                                empty($_POST["message"]))
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                              }
                                          else
                                        {


                                      $req = $connexion->prepare("INSERT INTO message (nomEx, emailEx, objetMes, message) VALUES (?,?, ?, ?)");

                                        $req->bindValue(1,$_POST['name'],PDO::PARAM_STR);
                                        $req->bindValue(2,$_POST['email'],PDO::PARAM_STR);
                                        $req->bindValue(3,$_POST['objet'],PDO::PARAM_STR);
                                        $req->bindValue(4,$_POST['message'],PDO::PARAM_STR);



                                      $a=$req->execute();
                                      $req->closeCursor();


                          }
                        }

                            ?>
                <button type="submit" name="btnsubmit" class="btn btn-success" id="send">Envoyer</button>
              </div>
            </div>
          </form>
          </div>
          </div>


          <div class="col-sm-4">
            <div class="r-bg">
              <h3>Heures de travail</h3>
              <ul class="list-1">
                <li><strong>Lundi - Vendredi:</strong> 07:00 - 19:00</li>
                <li><strong>Samedi:</strong> 07:00 - 11:00</li>
                <li><strong>Dimanche:</strong> fermé</li>
              </ul>
            </div>

          </div>

      </div>
    </div>



<iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13124.070537911826!2d-1.9247779!3d34.6795044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf2c453877b6aa52e!2sGare+d&#39;+Oujda!5e0!3m2!1sfr!2sma!4v1525400014779" ></iframe>


  </section> <!-- section ends -->

  <!-- footer -->
  <?php include("includes/footer.php") ?>

    <!-- Footer ends -->

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
