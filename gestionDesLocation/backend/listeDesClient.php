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

        <title>LISTE DES CLIENTS</title>

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
                            <h3>LISTE DES CLIENTS</h3>
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
                                        <th class="column-title">Nom </th>
                                        <th class="column-title">Prenom </th>
                                        <th class="column-title">Tel</th>
                                        <th class="column-title">Address </th>
                                        <th class="column-title">ville </th>
                                        <th class="column-title">Email </th>
                                        <th class="column-title">Num PERMIS </th>
                                        <th class="column-title">Date Inscription </th>
                                        <th class="column-title no-link last"><span class="nobr">Actions</span>
                                        </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $q= " select * from client";
                                        $res=$pdo->query($q);
																				$_SESSION['iv'] = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                                        while($line = $res->fetch(PDO::FETCH_ASSOC)){

                                          echo "<tr>

                                              <td>".$line['idClient']."</td>
                                              <td>".$line['nom']."</td>
                                              <td>".$line['prenom']."</td>
                                              <td>".$line['telephone']."</td>
                                              <td>".$line['adresse']."</td>
                                              <td>".$line['ville']."</td>
                                              <td>".$line['email']."</td>
                                              <td>".$line['nPermis']."</td>
                                              <td>".date('Y-m-d', strtotime($line["dateInscri"]))."</td><td><a href=\"?id=".$line['idClient']."\" class=\"btn btn-primary btn-xs \" onclick= \"return(confirm('Etes-vous sûr de vouloir supprimer ?'));\"> Supprimer</a> <a href=\"updateClient.php?id=".$line['idClient']."\" class=\"fa fa-pencil  btn btn-info btn-xs\"> Modifier</a></td></tr>";
																							if(isset($_GET["id"]))
                                                        {

                                                      $id=$_GET["id"];
                                                     $requete1="DELETE  FROM client where idClient= ?";
													 $qu = $pdo->prepare($requete1);


										                                 $qu->bindParam(1, $id, PDO::PARAM_INT);


                                                       $res= $qu->execute();

                                                if($res){
                                            echo'<script> alert("Suppression Faite" );window.location.href="listeDesClient.php"</script>';
                                    }

                                                         }




                                        }

                                         ?>





                                    </tbody>
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
		<?php

		?>
    </body>
    </html>
