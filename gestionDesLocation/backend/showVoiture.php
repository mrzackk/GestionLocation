<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once("bdconnexion.php");
if(isset($_GET["idV"])){
    $id=openssl_decrypt($_GET["idV"],'aes128','12345');
     //$id=$_GET["idV"];
  $sql="SELECT * FROM voiture v , marque m , modele mo WHERE  v.idmarque=m.idmarque and v.idM=mo.idM and v.idV=$id";
  $req=$connexion->prepare($sql);
  $req->execute();


  while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
        // $id=$ligne["num"];

       $id=$ligne["idV"];
        $matricule=$ligne["numMatricule"];
        $carteG=$ligne["carteGrise"];
        $datA = date('Y-m-d', strtotime($ligne["dateAchat"]));
        $coleur=$ligne["couleur"];

        $image=$ligne['image'];
        $puis=$ligne["puissance"];
        $cat=$ligne["categorie"];
        $CPJ=$ligne["coutParJour"];
        $idmrq=$ligne["marque"];
        $idmod=$ligne["num"];


  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SupMti Location! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include("includes/sidebar.php") ?>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <?php include ("includes/header.php")?>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->


        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Fiche Technique </h3>
                    </div>


                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                 <h3> <?php echo $idmrq?></h3>
                                <ul class="nav navbar-right panel_toolbox">

                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>


                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="col-md-7 col-sm-7 col-xs-12">
                                <?php
                                    echo "<div class='product-image'>";

                                      echo "  <img src='images/".$carteG.".jpg' />";
                                   echo" </div>";

                                    ?>
                                </div>

                                <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                                    <h3 class="prod_title">*MATRICULE</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $matricule</p>
                                    <br />";
?>

                                    <h3 class="prod_title">*CARTE GRISE </h3>
<?php
                                  echo"  <p>&nbsp &nbsp $carteG</p>
                                    <br />";
?>

                                    <h3 class="prod_title">*DATE D'ACHAT</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $datA</p>
                                    <br />";
?>
<h3 class="prod_title">*COULEUR</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $coleur</p>
                                    <br />";
?>


                                    <h3 class="prod_title">*PUISSANCE</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $puis</p>
                                    <br />";
?>


                                    <h3 class="prod_title">*CATEGORIE</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $cat</p>
                                    <br />";
?>
 <h3 class="prod_title">*MARQUE</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $idmrq</p>
                                    <br />";
?>
<h3 class="prod_title">*MODELE</h3>
<?php
                                  echo"  <p>&nbsp &nbsp $idmod</p>
                                    <br />";
?>






                                </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include ("includes/footer.php")?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>
