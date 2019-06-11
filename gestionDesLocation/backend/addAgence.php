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

    <title>SupMti Location</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"></script>

    <script>
       function validate(){

           var a = document.getElementById("password").value;
           var b = document.getElementById("password2").value;
           if (a!=b) {
             sweetAlert("Oops...", "password not matching!", "error");

              return false;
           }
       }
    </script>
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
                        <h3>Ajouter Agence</h3>
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

                                <form method="post" class="form-horizontal form-label-left" onSubmit="return validate();" novalidate enctype="multipart/form-data">



                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Code Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="codeagence" name="codeagence" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['codeagence'])){echo $_POST['codeagence'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nom Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="nomagence" name="nomagence" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['nomagence'])){echo $_POST['nomagence'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Responsable <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="respo" name="respo" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['respo'])){echo $_POST['respo'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CIN Responsable <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="cinre" name="cinre" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['cinre'])){echo $_POST['cinre'];} ?>">
                                        </div>
                                    </div>
																		<div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nom d'utilisateur <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="uer" name="user" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['user'])){echo $_POST['user'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Mot de Passe <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required"
                                            value="<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmer Mot de Passe <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required"
                                            value="<?php if (isset($_POST['password2'])){echo $_POST['password2'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Adresse Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="addag" name="addag" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['addag'])){echo $_POST['addag'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Ville<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="ville" name="ville" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['ville'])){echo $_POST['ville'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Phone<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="tel" name="tel" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" pattern='^\0?\d{10}' title='Phone Number (Format: 0999999999)'
                                            value="<?php if (isset($_POST['tel'])){echo $_POST['tel'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Logo<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
                                            <input id="image" class="form-control col-md-7 col-xs-12"  name="image"  required="required" type="file">
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">

                                            <?php
                                            if(!empty($_POST)){
                                              if(empty($_POST["codeagence"]) || empty($_POST["nomagence"]) || empty($_POST["respo"]) ||
                                                empty($_POST["cinre"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["addag"]) || empty($_POST["ville"]) ||  empty($_POST["tel"]) ||  empty($_POST["user"]) || $_FILES['image']['size'] == 0)
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                              }
                                          else
                                        {
                                          $image = $_FILES['image']['name'];
                                          $file_extension = strrchr($_FILES['image']['name'], '.');
                                          $extensions= array(".jpeg",".jpg",".png");
                                        $passe  = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                      $req = $pdo->prepare("INSERT INTO agence (codeAgence, nomAgence, responsable, cinResponsable,username,password, adresseAgence,villeAgence,logo,telephone) VALUES (?,?,?, ?, ?, ?, ?, ?, ?,?)");

                                        $req->bindValue(1,$_POST['codeagence'],PDO::PARAM_INT);
                                        $req->bindValue(2,$_POST['nomagence'],PDO::PARAM_STR);
                                        $req->bindValue(3,$_POST['respo'],PDO::PARAM_STR);
                                        $req->bindValue(4,$_POST['cinre'],PDO::PARAM_STR);
																				$req->bindValue(5,$_POST['user'],PDO::PARAM_STR);
                                        $req->bindValue(6,$passe,PDO::PARAM_STR);
                                        $req->bindValue(7,$_POST['addag'],PDO::PARAM_STR);
                                        $req->bindValue(8,$_POST['ville'],PDO::PARAM_STR);
                                        $req->bindValue(9,$image,PDO::PARAM_STR);
                                        $req->bindValue(10,$_POST['tel'],PDO::PARAM_STR);


                                      $a=$req->execute();
                                      $req->closeCursor();

                                      if($a)
                     								 {
                     					echo '<script>
                              swal({
                                title: "Add success",

                                icon: "success",
                                button: "OK!",
                                }). then(function(result){
                                   window.location = \'listeDesAgence.php\';
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
                        }
                        if(isset($_FILES['image'])){
                          // liste des extensions autorisée
                          $file_extension = strrchr($_FILES['image']['name'], '.');
                          $extensions= array(".jpeg",".jpg",".png");
                          if(!in_array($file_extension, $extensions)){
                            echo "
                                                  <div class=\"alert alert-success\">
                                                    <ul class=\"fa-ul\">
                                                      <li>
                                                        <i class=\"fa fa-info-circle fa-lg fa-li\"></i>  L'extension n'est pas valide
                                                      </li>
                                                    </ul>
                                                  </div>
                            ";                          }
                          else
                          {

                            //Enregistrement et renommage du fichier
                            $dossier = 'images/agence/';
                            $nom_fichier=$_POST['nomagence'].".jpg";

                            $result=move_uploaded_file($_FILES["image"]["tmp_name"],$dossier.$nom_fichier);
                            if($result==TRUE){
                              echo "";
                            }
                            else{
                              echo "
                                                    <div class=\"alert alert-success\">
                                                      <ul class=\"fa-ul\">
                                                        <li>
                                                          <i class=\"fa fa-info-circle fa-lg fa-li\"></i>  Erreur de transfert
                                                        </li>
                                                      </ul>
                                                    </div>
                              ";
                            }
                          }
                        }
                            ?>
                            <button type="reset" class="btn btn-primary" onclick="window.location='listeDesAgence.php';">Annuler</button>
                            <button id="send" type="submit" class="btn btn-success" name="btnsubmit">Ajouter</button>
                                        </div>
                                    </div>
                                </form>
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
