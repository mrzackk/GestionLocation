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

        <title>LISTE DES Reservation</title>

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
                            <h3>LISTE DES RESERVATIONS</h3>
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
                                        <th class="column-title">N.réservation </th>

                                        <th class="column-title">nom</th>
                                        <th class="column-title">prenom </th>
                                        <th class="column-title">numero permis</th>
                                        <th class="column-title">telephone</th>
                                        <th class="column-title">Marque</th>
                                        <th class="column-title">Matricule</th>
                                        <th class="column-title">service</th>
                                        <th class="column-title">Date Debut</th>
                                        <th class="column-title">Date Fin</th>
                                        <th class="column-title">Montant</th>
                                        <th class="column-title no-link last"><span class="nobr">Actions</span>
                                        </th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $req=$pdo->prepare("SELECT idR,nom,prenom,nPermis,telephone,marque,numMatricule,nom_service,dateLocation,dateFin,montant FROM reservation r inner join voiture e on r.idV=e.idV inner join service s on s.idService=r.idService inner join client c on c.idClient=r.idClient inner join marque m on m.idmarque=e.idmarque");
                                    $req->execute();

                                    while($ligne = $req->fetch(PDO::FETCH_ASSOC))
                                            {
                            echo"<tr><th>".$ligne["idR"]."</th><th>".$ligne["nom"]."</th><th>".$ligne["prenom"]."</th><th>".$ligne["nPermis"]."</th><th>".$ligne["telephone"]."</th><th>".$ligne["marque"]."</th><th>".$ligne["numMatricule"]."</th><th>".$ligne["nom_service"]."</th><th>".date('Y-m-d', strtotime($ligne["dateLocation"]))."</th><th>".date('Y-m-d', strtotime($ligne["dateFin"]))."</th><th>".$ligne["montant"]."</th><th>";


                                                $id=$ligne["idR"];
                                             //   $idd=$ligne["nPermis"];


                                              echo "<a href=\"?idR=$id\"  class=\" btn btn-primary btn-xs \" onclick= \"return(confirm('Etes-vous sûr de vouloir supprimer ?'));\"> Supprimer  </a> ";

                                             echo  "<a href=\"updateReservation.php?idR=".@openssl_encrypt ($ligne['idR'],'aes128','12345')."\" class=\"fa fa-pencil  btn btn-info btn-xs\"> Modifier</a></td></tr>";
                                            }
 if(isset($_GET["idR"]))
                                                        {
                                                      $id=$_GET["idR"];
                                                     $requete1="DELETE  FROM reservation where idR=$id";


                                                       $res=$pdo->exec($requete1);

                                                if($res){
                                                     echo '<script>alert("Suppression Faite" );window.location.href = "listeDesReservation.php";</script>';
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
