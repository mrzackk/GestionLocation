<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="en"> <!--<![endif]-->
<?php
require_once("bdconnexion.php");

$results = $connexion->query('SELECT idV FROM voiture');
$get_total_rows = $results->rowCount();
$pages = ceil($get_total_rows/$item_per_page);


?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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



 <link href="css/style.css" rel="stylesheet" type="text/css">

 <link href="css/style.css" rel="stylesheet" type="text/css">
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
                 <h3>Voitures</h3>
               </div>
             </div>
             <div class="row">
               <div class="col-sm-12">
               <div class="search-result-heading">
                 <div class="search-result form-group pull-left">
                 <select class="form-control selectpicker" id="select" name="select" data-style="btn-default">
                   <option  value="">Toutes les Voitures</option>

                   <option  value="ASC">Nom (A à Z)</option>

                   <option value="DESC" >Nom (Z à A)</option>
                   <option value="PrixA" >Prix ascendant </option>
                   <option value="PrixD" >Price descendant </option>

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


         <div id="results"></div>


       </div>


           <div class="spacer20"></div>

       <div class="row">

         <div class="col-xs-12 text-center">
         <ul class="">

      <div class="pagination"></div>



         </ul>
         </div>
       </div>


     </div>

     </div>
   </div>
 </div>

   <div class="spacer20"></div>

      <div class="spacer60"></div>

      <div class="f-bg big-padding">
       <div class="container">
         <div class="row">
           <div class="col-xs-12">
             <h3>Voitures Similaires</h3>
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

  <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="js/jquery.js"></script>
 <!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->

 <script type="text/javascript" src="http://botmonster.com/jquery-bootpag/jquery.bootpag.js"></script>

 <script type="text/javascript">
 $(document).ready(function() {
 	$("#results").load("fetch_pages.php");
   //initial page number to load
 	$(".pagination").bootpag({
 	   total: <?php echo $pages; ?>,
 	   pagee: 1,
 	   maxVisible: 5
 	}).on("page", function(e, num){
 		e.preventDefault();

 		$("#results").load("fetch_pages.php", {'page':num});
 	});
 });
</script>

<script type="text/javascript">
 $(document).ready(function(){
      $('#select').change(function(){
           var select = $(this).val();
            if(select == '')
            {
              $(".pagination").show();

            }
            else  $(".pagination").hide();

           $.ajax({
                url:"fetch_pages.php",
                method:"POST",
                data:{select:select},
                success:function(data){
                     $('#results').html(data);
                }
           });
      });
 });
 </script>


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
