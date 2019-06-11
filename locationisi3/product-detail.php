                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <!DOCTYPE html><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<?php
require_once("bdconnexion.php");

if(isset($_GET["idA"])){
          $id=$_GET["idA"];

 $sql="SELECT `numMatricule`,`puissance`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence,a.responsable,a.adresseAgence,a.villeAgence,a.telephone FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA Where idV= $id";
 $req=$connexion->prepare($sql);
 $req->execute();


 while($ligne = $req->fetch(PDO::FETCH_ASSOC)){

   $image=$ligne['image'];
   $mat=$ligne['numMatricule'];
   $cat=$ligne['categorie'];
   $cpj=$ligne['coutParJour'];
   $marque=$ligne['marque'];
   $mod=$ligne['num'];
   $ag=$ligne['nomAgence'];
   $pui=$ligne['puissance'];
   $respo=$ligne['responsable'];
   $add=$ligne['adresseAgence'];
   $ville=$ligne['villeAgence'];
   $tel=$ligne['telephone'];




 }
}
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
  <link href="" rel="stylesheet" media="screen" />
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

<body class="no-main-slider">


  <header class="home-header"> <!-- header -->

    <?php include("includes/header.php"); ?>

  </header>


  <section>

 <div class="spacer20"></div>
       <div class="spacer20"></div>
       <div class="spacer20"></div>
       <div class="spacer20"></div>
       <div class="spacer20"></div>



    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
             <div class="page-title"><?php echo $marque; ?></div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-8 car-detail-container">
          <div>
              <?php
                      echo"<a href='../gestionDesLocation/backend/images/".$image."' class=\"popup-link\">";
                      echo "  <img src='../gestionDesLocation/backend/images/".$image."' />";
                      echo"</a>";
       ?>

          </div>

           <div class="spacer20"></div>
             <div class="spacer20"></div>
          <ul class="nav nav-tabs responsive" id="myTab">
            <li class="active"><a href="#tab1" data-toggle="tab">Tech. info</a></li>
            <li><a href="#tab2" data-toggle="tab">Interior</a></li>
            <li><a href="#tab3" data-toggle="tab">Extras</a></li>
          </ul>
          <div class="tab-content responsive">
            <div class="tab-pane fade in active" id="tab1">
              <div class="row">
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tab2">
              <div class="row">
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="tab3">
              <div class="row">
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul class="list-3">
                    <li><strong>Engine:</strong> 2l</li>
                    <li><strong>Horse power:</strong> 250</li>
                    <li><strong>Gear:</strong> manual</li>
                    <li><strong>Doors:</strong> 4</li>
                    <li><strong>Type:</strong> sedan</li>
                    <li><strong>Horse power:</strong> 250</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


    </div>

    <div class="col-sm-4" style="background-color: #e4e4e4cc; padding: 20px; border-radius: 6px;" >

          <div class="r-bg">
          <div class="widget">
            <h3><?php echo $marque; ?></h3>
            <div class="car-detail-info">
              <div class="title"><?php echo $cpj." "."MAD"; ?></div>
              <ul class="car-detail-info-list">
                <li><strong>Matricule:</strong> <?php echo $mat?></li>
                <li><strong>Modele :</strong> <?php echo $mod?></li>
                <li><strong>Carburant :</strong> <?php echo $cat?></li>
                <li><strong>Puissance:</strong> <?php echo $pui." W "?></li>
              </ul>
            </div>
          </div>
          </div>

          <div class="r-bg">
          <div class="widget">
            <h3>Agence contact</h3>
            <div class="car-detail-info">
              <ul class="car-detail-info-list">
                <li>Agence :<span><?php echo $ag?></span></li>
                <li>Responsable :<span><?php echo $respo?></span></li>
                <li>Address:<span><?php echo $add?></span></li>
                <li>Ville:<span><?php echo $ville?></span></li>
                <li>Phone:<span><?php echo $tel?></span></li>
              </ul>
            </div>
          </div>
          </div>




          <div class="r-bg">
            <div class="widget">
            <h3>Private Message to Agence</h3>
            <form role="form">
              <div class="row">
                <div class="form-group form-group-small col-xs-12 col-sm-12 col-md-12">
                  <label for="name11" class="label-small">Name</label>
                  <input type="text" class="form-control" id="name11" placeholder="Enter name">
                </div>
                <div class="form-group form-group-small col-xs-12 col-sm-12 col-md-12">
                  <label for="email11" class="label-small">E-mail</label>
                  <input type="email" class="form-control" id="email11" placeholder="Enter email">
                </div>

                <div class="form-group form-group-small col-xs-12 col-sm-12 col-md-12">
                  <label for="message22" class="label-small">Message</label>
                  <textarea class="form-control" id="message22" name="messag2" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Message</textarea>
                </div>


                <div class="form-group form-group-small col-xs-12 col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-default col-xs-12">Submit</button>
                </div>
              </div>
            </form>

          </div>
          </div>



        </div>
      </div>
   </div>


   <div class="spacer60"></div>

   <div class="f-bg big-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h3>Similar vehicles</h3>
          <div class="related-items-slider">

           <?php

             $req="SELECT `idV`,`numMatricule`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA";

                  $req1=$connexion->query($req);
                  while($ligne=$req1->fetch(PDO::FETCH_ASSOC))
                  {
                    $image=$ligne['image'];
                    $mat=$ligne['numMatricule'];
                    $cat=$ligne['categorie'];
                    $cpj=$ligne['coutParJour'];
                    $marque=$ligne['marque'];
                    $mod=$ligne['num'];
                    $ag=$ligne['nomAgence'];
                    $id=$ligne['idV'];


           ?>

            <div class="item">
              <div class="related-item-container">
                <div class="related-item-media">
                 <?php
                  echo "  <img src='../gestionDesLocation/backend/images/".$image."' />";
   ?>

                </div>
                <div class="related-item-content">
                  <?php
              echo" <div class=\"title\">".$ligne['marque']."</div>";
                 ?>
                  <ul class="list-4">
                    <?php
               echo  "<li><strong>Agence:</strong>".$ligne['nomAgence']."</li>";
               echo  "<li><strong>Carburant:</strong>".$ligne['categorie']."</li>";
               echo  "<li><strong>Modele:</strong>".$ligne['num']."</li>";

                     ?>
                  </ul>
                <?php
                     echo " <div class=\"price\">".$ligne['coutParJour']." "."MAD"."</div>";
                        ?>
               <!--   <a href="#" class="btn btn-default" role="button">Details</a> -->
                  <?php
                  echo  "<a href=\"product-detail.php?idA=$id\"  class=\"btn btn-default\" role=\"button\">Details</a>";

                   ?>
                </div>
              </div>
            </div>
            <?php }?>


  </section> <!-- section ends -->


  <footer class="footer">  <!-- footer -->
      <?php include("includes/footer.php"); ?>

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
