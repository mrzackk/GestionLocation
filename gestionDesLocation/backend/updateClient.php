<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once('db_cnx.php');
$pdo= connect_bd();


 if(isset($_GET["id"])){

            $id=$_GET["id"];
					
  $sql="SELECT * from client WHERE idClient= ?";
  $req=$pdo->prepare($sql);
  $req->bindParam(1, $id, PDO::PARAM_INT);
  $req->execute();


  while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
      $nom=$ligne["nom"];
      $prenom = $ligne['prenom'];
     $email = $ligne['email'];
    $tel=$ligne['telephone'];
    $address = $ligne['adresse'];
      $ville = $ligne['ville'];
     $permis = $ligne['nPermis'];
			 $date = date('Y-m-d', strtotime($ligne["dateInscri"]));




  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
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
                        <h3>Modifier Client</h3>
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

                                <form onsubmit="msg();" class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form1" >



                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                                        </label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																								<input type="text" id="email2" name="nom"  required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_GET['id'])) echo $nom; ?>" >

																				</div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Prenom <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="email" name="prenom" required="required"   value="<?php if(isset($_GET['id'])) echo $prenom; ?>"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Tel <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
																							<input type="text" id="tel" name="tel" value="<?php if(isset($_GET['id'])) echo $tel; ?>" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" pattern='^\0?\d{10}' title='Phone Number (Format:0999999999)'>

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="number" name="address"  value="<?php if(isset($_GET['id'])) echo $address; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">ville <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="website" name="ville"  value="<?php if(isset($_GET['id'])) echo $ville; ?>" required="required" placeholder="" class="form-control col-md-7 col-xs-12"  >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="website" name="email"  value="<?php if(isset($_GET['id'])) echo $email; ?>" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Numero de permis <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="occupation" type="text" name="permis"  value="<?php if(isset($_GET['id'])) echo $permis; ?>"  required="required"  class="optional form-control col-md-7 col-xs-12"  >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Date d'inscription</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" id="email2" name="date" data-validate-linked="email" required="required"
                                            min="<?php echo date('Y-m-d');?>"class="form-control col-md-7 col-xs-12" value="<?php echo $date; ?>" disabled>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary" onclick="window.location='listeDesClient.php';" >Annuler</button>
                                              <input type="hidden" id="website" name="id1" value="<?php if(isset($_GET['id'])) echo $_GET["id"]; ?>" />
                                            <button id="send" type="submit" name="edit" class="btn btn-success" onclick="msg();">Modifier</button>


                                        </div>
                                    </div>
                                </form>
                                <?php


                                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address'])
                                && isset($_POST['ville']) && isset($_POST['permis']) && isset($_POST['id1'])  )
                                {
                                  $nom = $_POST['nom'];
                                  $prenom = $_POST['prenom'];
                                  $email = $_POST['email'];
                                  $tel=$_POST['tel'];

                                  $address = $_POST['address'];
                                  $ville = $_POST['ville'];
                                  $permis = $_POST['permis'];
                                  $id=$_POST['id1'];




                                 $req="update client set nom=?, prenom=?, telephone=?, adresse=?, ville=?, email=?, nPermis=? where idClient=?";
                                 $qu = $pdo->prepare($req);



                                 $qu->bindParam(1, $nom, PDO::PARAM_STR);
                                 $qu->bindParam(2, $prenom, PDO::PARAM_STR);
                                 $qu->bindParam(3, $tel, PDO::PARAM_STR);
                                 $qu->bindParam(4, $address, PDO::PARAM_STR);
                                 $qu->bindParam(5, $ville, PDO::PARAM_STR);
                                 $qu->bindParam(6, $email, PDO::PARAM_STR);
                                 $qu->bindParam(7, $permis, PDO::PARAM_STR);
                                $qu->bindParam(8, $id, PDO::PARAM_INT);

                                $a= $qu->execute();
																 if($a){
                                              echo '<script>
                                              swal({
                                                title: "modification avec succes!",

                                                icon: "success",
                                                button: "OK!",
                                                }).then(function(result){
						   																 		window.location = \'listeDesClient.php\';
						              													});
                                              </script>';
                                              //echo'<script>window.location.href="listeDesAgence.php"</script>';
                                            //header("Refresh:0;url=listeDesAgence.php");
                                            //echo "<script> setTimeout(\"window.location.href = 'listeDesClient.php';\", 10000); </script>";

                                            }
                                            else{
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'Update failed!',   type: 'error' });</script>";
                                            //echo '<script>alert("Update Failed")</script>';
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
<script>




 </script>

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
