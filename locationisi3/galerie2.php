<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<?php
require_once("bdconnexion.php");
?>

<head>
 <!-- Basic Meta Tags -->
 <meta charset="utf-8">
 <title>RENT MA</title>
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
                 <div class="search-result form-group pull-left">
                 <select class="form-control selectpicker" id="sel1" name="sel" data-style="btn-default">
                   <option>Price (Low to High)</option>

                   <option>Price (Hight to Low)</option>
                   <option value="asc">Name (A to Z)</option>
                   <?php


                    ?>
                   <option>Name (Z to A)</option>
                 </select>
               </div>
             <div class="btn-group">
               <a href="#" id="grid-view" class="btn btn-default active"><i class="fa fa-th i-margin"></i></a>
               <a href="#" id="list-view" class="btn btn-default "><i class="fa fa-list i-margin"></i></a>
             </div>
           </div>

           </div>


          </div>
       <div id="products" class="row">
         <?php

         $videosParPage = 4;
         $videosTotalesReq = $connexion->query('SELECT idV FROM voiture');
         $videosTotales = $videosTotalesReq->rowCount();
         $pagesTotales = ceil($videosTotales/$videosParPage);
         if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourante = $_GET['page'];
         } else {
            $pageCourante = 1;
         }
         $depart = ($pageCourante-1)*$videosParPage;
         ?>
           <?php
                 $req="SELECT `idV`,`numMatricule`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA ";
                   $videos = $connexion->query('SELECT `idV`,`numMatricule`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA ORDER BY idV DESC LIMIT '.$depart.','.$videosParPage);


                 while($ligne=$videos->fetch(PDO::FETCH_ASSOC))
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
         <div class="item col-xs-6 col-sm-6 col-md-4">
             <div class="search-result-item-container">
               <div class="search-result-item-media">
           <?php
                 echo "  <img src='../gestionDesLocation/backend/images/".$image."' />";
  ?>
               </div>
               <div class="search-result-item-content">
                 <div class="title"><a href="product-detail.php"><?php echo $marque ?></a></div>

                 <ul class="list-4">
                   <li><strong>Agence:</strong> <?php echo $ag?></li>
                   <li><strong>Carburant:</strong> <?php echo $cat?></li>
                   <li><strong>Modele : </strong><?php echo $mod?></li>
                 </ul>
                 <p class="grid-hidden">Looking cautiously round, to ascertain that they we. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                 <div class="price"><?php echo $cpj." MAD "?></div>
                 <?php
                 echo  "<a href=\"product-detail.php?idA=$id\"  class=\"btn btn-default\" role=\"button\">Details</a>";

                  ?>

               </div>
             </div>
         </div>
  <?php } ?>
<?php

 ?>




       </div>



       </div>


           <div class="spacer20"></div>

       <div class="row">

         <div class="col-xs-12 text-center">
         <ul class="pagination">
<?php
           for($i=1;$i<=$pagesTotales;$i++) {
              if($i == $pageCourante) {
                 echo $i.' ';
              } else {
                 echo '<a href="galerie.php?page='.$i.'">'.$i.'</a> ';
              }
           }
           ?>

         </ul>
         </div>
       </div>


     </div>

     </div>
   </div>

   <div class="spacer20"></div>



  <div class="f-bg big-padding">
   <div class="container">
     <div class="row">
       <div class="col-xs-12">
         <h3>Hot Items</h3>
         <div class="related-items-slider">
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/1.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/2.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/3.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/4.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/5.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
           <div class="item">
             <div class="related-item-container">
               <div class="related-item-media">
                 <img src="img/car-detail/6.jpg" alt="">
               </div>
               <div class="related-item-content">
                 <div class="title">Mazda MX5</div>
                 <ul class="list-4">
                   <li><strong>Location:</strong> Los Angels</li>
                   <li><strong>Engine:</strong> 6.5L LP, petrol</li>
                   <li><strong>Mileage:</strong> 30000 km</li>
                   <li><strong>Condition:</strong> used</li>
                 </ul>
                 <div class="price">$ 200,000</div>
                 <a href="#" class="btn btn-default" role="button">Details</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   </div>

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
