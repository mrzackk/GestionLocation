<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once('db_cnx.php');
$pdo= connect_bd();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LISTE DES VOITURES </title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>LISTE DES voitures</h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table id="datatable-responsive" class="table table-striped jambo_table bulk_action" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="headings">
                                       <th class="column-title">Id </th>
                                    <th class="column-title">numero de matricule </th>
                                     <th class="column-title">carte gris</th>
                                    <th class="column-title">carburane </th>
                                    <th class="column-title">date d achat</th>
                                    <th class="column-title">couleur </th>
                                    <th class="column-title">puissance </th>
                                    <th class="column-title">prix en dh  </th>
                                    <th  class="column-title">marque</th>
                                    <th  class="column-title">modele</th>
                                        <th class="column-title no-link last"><span class="nobr">Actions</span>
                                        </th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $req=$pdo->prepare("SELECT * FROM voiture v , marque m , modele mo WHERE  v.idmarque=m.idmarque and v.idM=mo.idM");
                                    $req->execute();

                                    while($ligne = $req->fetch(PDO::FETCH_ASSOC))
                                            {
                            echo"<tr><th>".$ligne["idV"]."</th><th>".$ligne["numMatricule"]."</th><th>".$ligne["carteGrise"]."</th><th>".$ligne["categorie"]."</th><th>".date('Y-m-d', strtotime($ligne["dateAchat"]))."</th><th>".$ligne["couleur"]."</th><th>".$ligne["puissance"]."</th><th>".$ligne["coutParJour"]."</th><th>".$ligne["marque"]."</th><th>".$ligne["num"]."</th><th>";


                                                $id=$ligne["idV"];
                                             //   $idd=$ligne["nPermis"];

                      echo "<a href=\"showVoiture.php?idV=".@openssl_encrypt ($ligne['idV'],'aes128','12345')."\" class='fa fa-eye btn btn-primary btn-xs '>    Voir</a>";
                                              echo "<a href=\"?idV=$id\"  class=\" btn btn-primary btn-xs \" onclick= \"return(confirm('Etes-vous sûr de vouloir supprimer ?'));\"> Supprimer  </a> ";

                                             echo  "<a href=\"updateVoiture.php?idV=".@openssl_encrypt ($ligne['idV'],'aes128','12345')."\" class=\"fa fa-pencil  btn btn-info btn-xs\"> Modifier</a></td></tr>";
                                            }
 if(isset($_GET["idV"]))
                                                        {
                                                      $id=$_GET["idV"];
                                                     $requete1="DELETE  FROM voiture where idV=$id";


                                                       $res=$pdo->exec($requete1);

                                                if($res){
                                                     echo '<script>alert("Suppression Faite" );window.location.href = "listeDesVoiture.php";</script>';
                                          //  echo'<script>window.location.href="listeDesReservation.php"</script>';
                                    }


                                                     }



                                     ?>
                                </table>


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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    </body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: redwane
 * Date: 14/04/2018
 * Time: 01:13
 */
