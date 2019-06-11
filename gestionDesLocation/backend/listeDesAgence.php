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

        <title>LISTE DES Agence</title>

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
        <script src="js/sweetalert.min.js"></script>

         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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
                            <h3>LISTE DES AGENCE</h3>
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
                                        <th class="column-title">Nom d'utilisateur </th>
                                        <th class="column-title">Code Agence </th>
                                        <th class="column-title">Nome Agence  </th>
                                        <th class="column-title">Responsable</th>
                                        <th class="column-title">CIN Respnsable </th>
                                        <th class="column-title">Adresse </th>
                                        <th class="column-title">Ville </th>
                                        <th class="column-title no-link last"><span class="nobr">Actions</span>
                                        </th>

                                    </tr>
                                    </thead>
                                    <?php
                                    $req=$pdo->prepare("SELECT idA,codeAgence,nomAgence,responsable,cinResponsable,username,adresseAgence,villeAgence FROM agence");
                                    $req->execute();

                                    while($ligne = $req->fetch(PDO::FETCH_ASSOC))
                          					{
                        	               echo"<tr><th name=\"ida\">".$ligne["username"]."</th><th>".$ligne["codeAgence"]."</th><th>".$ligne["nomAgence"]."</th><th>".$ligne["responsable"]."</th><th>".$ligne["cinResponsable"]."</th><th>".$ligne["adresseAgence"]."</th><th>".$ligne["villeAgence"]."</th><th>";

                                         		$id=$ligne["idA"];


                          					  echo "<a href=\"?idA=$id\"  class=\" fa fa-close btn btn-primary btn-xs \"  onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer' ));\"> Supprimer	</a> "; //glyphicon glyphicon-remove-sign

                          					 echo  "<a href=\"updateAgence%20.php?idA=".@openssl_encrypt ($id,'aes128','1234')."\"  class=\"fa fa-pencil  btn btn-info btn-xs\"> Modifier	</a> </th> </tr>";
                          					}


                                    					  if(isset($_GET["idA"]))
                                    					{
                                                      $id=$_GET["idA"];
                                    		      	 $requete1=$pdo->prepare("DELETE  FROM agence where idA=$id");
                                                $res= $requete1->execute();

                                    		          // $res=$pdo->exec($requete1);

                                    			if($res){
                                              echo '<script>alert("Suppression Faite" );window.location.href = "listeDesAgence.php";</script>';
                                  //  echo'<script>window.location.href="listeDesAgence.php"
                                    //     alert("zdmlkza !")</script>';
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

            <script>

            $(document).ready(function() {
              $('#btn1').submit(function(e) {
                e.preventDefault();
                swal({
              title: "Are you sure?",
              text: "Once updated, you will not be able to recover the current data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {
              swal("Poof! The informations has been updated!", {
               icon: "success",
              });
              } else {
              swal("Update cancelled : your data remains the same!");
              }
              });

            });
            });


             </script>




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
 * Time: 01:12
 */
