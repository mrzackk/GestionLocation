<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once('db_cnx.php');
$pdo= connect_bd();
 if(isset($_GET["idA"])){
            $id=openssl_decrypt($_GET["idA"],'aes128','1234');
          //  $id=$_GET["idA"];
          	$id =(int) $id;
  $sql="SELECT * from agence where idA= $id";
  $req=$pdo->prepare($sql);
  $req->execute();


  while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
        // $id=$ligne["num"];
      $id=$ligne["idA"];
      $code=$ligne["codeAgence"];
      $nom=$ligne["nomAgence"];
      $respo=$ligne["responsable"];
      $cin=$ligne["cinResponsable"];
      $pswd=$ligne["password"];
      $add=$ligne["adresseAgence"];
      $ville=$ligne["villeAgence"];
      $tel=$ligne["telephone"];
			$user=$ligne["username"];


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

    <title>SupMti Location</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                        <h3>Modifier Agence</h3>
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

                                <form  method="post" class="form-horizontal form-label-left" onSubmit="return validate();" novalidate>


                                    <span class="section">Information Agence</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ID Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ida" required="required" type="text"
                                            value="<?php echo $id; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Code Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="codeagence" required="required" class="form-control col-md-7 col-xs-12"

                                            value="<?php
                                                          if (empty($_POST['codeagence']))
                                                          {
                                                            echo $code;
                                                          }
                                                          else      {
                                                          echo  $_POST['codeagence'];
                                                        }

                                                            ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nom Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="nomagence" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php
                                                    if (empty($_POST['nomagence']))
                                                      {
                                                        echo $nom;
                                                      }
                                                      else      {
                                                        echo  $_POST['nomagence'];
                                                      }

                                                  ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Responsable <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="respo" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php
                                            if (empty($_POST['respo']))
                                              {
                                                echo $respo;
                                              }
                                              else      {
                                                echo  $_POST['respo'];
                                              }
                                                  ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CIN Responsable <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="cinre" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php
                                                      if (empty($_POST['cinre']))
                                                        {
                                                          echo $cin;
                                                        }
                                                        else      {
                                                          echo  $_POST['cinre'];
                                                        }
                                                      ?>">
                                        </div>
                                    </div>
																		<div class="item form-group">
																				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nom d'utilisateur <span class="required">*</span>
																				</label>
																				<div class="col-md-6 col-sm-6 col-xs-12">
																						<input type="text" id="uer" name="user" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" disabled
																						value="<?php
																						if (empty($_POST['user']))
																							{
																								echo $user;
																							}
																							else      {
																								echo  $_POST['user'];
																							}
																						?>">
																				</div>
																		</div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Mot de Passe <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required"
                                            value="<?php
                                            if (empty($_POST['password']))
                                              {
                                                echo $pswd;
                                              }
                                              else      {
                                                echo  $_POST['password'];
                                              }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmer Mot de Passe<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required"
                                            value="<?php if (isset($_POST['password2'])){echo $_POST['password2'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Adresse Agence <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="addag" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php
                                            if (empty($_POST['addag']))
                                              {
                                                echo $add;
                                              }
                                              else      {
                                                echo  $_POST['addag'];
                                              }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Ville<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="ville" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php
                                            if (empty($_POST['ville']))
                                              {
                                                echo $ville;
                                              }
                                              else      {
                                                echo  $_POST['ville'];
                                              }
                                            ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Téléphone<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="tel" name="tel" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" pattern='^\0?\d{10}' title='Phone Number (Format: 0999999999)'
                                            value="<?php
                                            if (empty($_POST['tel']))
                                              {
                                                echo $tel;
                                              }
                                              else      {
                                                echo  $_POST['tel'];
                                              }
                                            ?>">
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <button type="reset" class="btn btn-primary" onclick="window.location='listeDesAgence.php';">Annuler</button>
                                        <!--    <input type="hidden" name="txt" value=<?php echo $id ?> > -->
                                            <input type="hidden" id="website" name="shit" value="<?php if(isset($_GET['idA'])) echo openssl_decrypt($_GET["idA"],'aes128','1234'); ?>" />
                                            <button id="send" type="submit" class="btn btn-success" name="btnedit">Modifier</button>
                                            <?php

                                            if(isset($_POST['btnedit']) )
                                            {
                                              if(empty($_POST["codeagence"]) || empty($_POST["nomagence"]) || empty($_POST["respo"]) ||
                                                empty($_POST["cinre"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["addag"]) || empty($_POST["ville"]) || empty($_POST["shit"]) || empty($_POST["tel"]))
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                              }
                                              else {
                                            		$ma_requete_prepare2="update agence set codeAgence=?, nomAgence=?, responsable=?,cinResponsable=?,password=?,adresseAgence=?,villeAgence=?,telephone=? where idA=?";
                                            $prep = $pdo->prepare($ma_requete_prepare2);


                                            $code=$_POST['codeagence'];
                                            $nom=$_POST['nomagence'];
                                            $respo=$_POST['respo'];
                                            $cinr=$_POST['cinre'];
                                            $pass=$_POST['password'];
                                            $adda=$_POST['addag'];
                                            $ville=$_POST['ville'];
                                            $id=$_POST['shit'];
                                            $tel=$_POST['tel'];
                                                $passe  = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                            $prep->bindValue(1, $code, PDO::PARAM_INT);
                                            $prep->bindValue(2, $nom, PDO::PARAM_STR);
                                            $prep->bindValue(3, $respo, PDO::PARAM_STR);
                                            $prep->bindValue(4, $cinr, PDO::PARAM_STR);
                                            $prep->bindValue(5, $passe, PDO::PARAM_STR);
                                            $prep->bindValue(6, $adda, PDO::PARAM_STR);
                                            $prep->bindValue(7, $ville, PDO::PARAM_STR);
                                            $prep->bindValue(8, $tel, PDO::PARAM_INT);

                                            $prep->bindValue(9, $id, PDO::PARAM_INT);



                                            $a=$prep->execute();

                                            if($a){
                                              echo '<script>
                                              swal({
                                                title: "modification avec succes!",

                                                icon: "success",
                                                button: "OK!",
             	                                 }). then(function(result){
               																 		window.location = \'listeDesAgence.php\';
                          													});
                                              </script>';
                                              //echo'<script>window.location.href="listeDesAgence.php"</script>';
                                            //header("Refresh:0;url=listeDesAgence.php");

                                            }
                                            else{
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'Update failed!',   type: 'error' });</script>";
                                            //echo '<script>alert("Update Failed")</script>';
                                            }
                                            $prep->closeCursor();
                                            $prep = NULL;
                                          }
                                          }
                                             ?>
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
