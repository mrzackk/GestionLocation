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
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script src="js/sweetalert.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SupMti Location</title>

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
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Ajouter Client</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form1">



                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nom"  required="required" type="text" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Prenom <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="email" name="prenom" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Tel <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" id="email2" name="tel"  required="required" class="form-control col-md-7 col-xs-12" pattern='^\0?\d{10}' title='Phone Number (Format: 0999999999)' value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="number" name="address" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">ville <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="website" name="ville" required="required" placeholder="" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="website" name="email" required="required" placeholder="" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Numero de permis <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="occupation" type="text" name="permis" data-validate-length-range="5,20" required="required" class="optional form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['permis'])) echo $_POST['permis']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Date d'inscription</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="date" type="date" name="date" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>" min="<?php echo date("Y-m-d"); ?>">

	 

                                        </div>
                                    </div>

                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary" onclick="window.location='listeDesClient.php';" >Annuler</button>
                                            <button id="send" type="submit" class="btn btn-success">Ajouter</button>


                                        </div>
                                    </div>
                                </form>
                                <?php

                                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address'])
                                && isset($_POST['ville']) && isset($_POST['permis']) && isset($_POST['date'])){
                                  $nom = $_POST['nom'];
                                  $prenom = $_POST['prenom'];
                                  $email = $_POST['email'];
                                  $tel=$_POST['tel'];
                                  $address = $_POST['address'];
                                  $ville = $_POST['ville'];
                                  $permis = $_POST['permis'];
                                  $date = $_POST['date'];

                                 $req="INSERT INTO client( nPermis, nom, prenom, telephone, adresse, ville, dateInscri, email) VALUES (?,?,?,?,?,?,?,?)";
                                 $qu = $pdo->prepare($req);


                                 $qu->bindParam(1, $permis, PDO::PARAM_STR);
                                 $qu->bindParam(2, $nom, PDO::PARAM_STR);
                                 $qu->bindParam(3, $prenom, PDO::PARAM_STR);
                                 $qu->bindParam(4, $tel, PDO::PARAM_INT);
                                 $qu->bindParam(5, $address, PDO::PARAM_STR);
                                 $qu->bindParam(6, $ville, PDO::PARAM_STR);
                                 $qu->bindParam(7, $date, PDO::PARAM_STR);
                                 $qu->bindParam(8, $email, PDO::PARAM_STR);


                                 $a=$qu->execute();

	                                       if($a)
	                      								 {
	                      					echo '<script>
	                               swal({
	                                 title: "Add success",

	                                 icon: "success",
	                                 button: "OK!",
	                                 }). then(function(result){
  																 		window.location = \'listeDesClient.php\';
             													});
	                               </script>';
	                                   //alert("New record created successfully");
	                             //  echo'<script>window.location.href="listeDesAgence.php"</script>';

	                      				}
	                      				else {
	                      			//		echo '<script>swal("Operation Failed!","error");</script>';
	                           echo "<script>sweetAlert({  title: 'Oops!',   text: 'Something went wrong while adding an agency!',   type: 'error' });</script>";
	                      				}
	                           }







                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include ("includes/footer.php"); ?>
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
<script>

</script>


</body>
</html>
