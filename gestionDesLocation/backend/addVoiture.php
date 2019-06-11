<?php
/**
 * Created by PhpStorm.
 * User: redwane
 * Date: 14/04/2018
 * Time: 01:48
 */
 session_start();
 if(empty($_SESSION))
 		header('Location:login.php');
 require_once("bdconnexion.php");

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
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
     function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state.php",
  data:'idmarque='+val,
  success: function(data){
    $("#modele").html(data);
  }
  });
}

    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function () {
          $('#marque').load('addnewma.php')
        }, 0);
      });
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
                        <h3>Ajouter Voiture</h3>
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

                                <form class="form-horizontal form-label-left" novalidate  method="post" enctype="multipart/form-data">




                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Num Matricule<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="numMat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="numMat"  required="required" type="text"
                                            value="<?php if (isset($_POST['numMat'])){echo $_POST['numMat'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Carte Grise<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="cartegr" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cartegr"  required="required" type="text"
                                            value="<?php if (isset($_POST['cartegr'])){echo $_POST['cartegr'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">date Achat <span class="required">*</span>
                                        </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" id="dateA" name="dateA" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"
                                            value="<?php if (isset($_POST['dateA'])){echo $_POST['dateA'];} ?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Couleur<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="couleur" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="couleur"  required="required" type="text"
                                            value="<?php if (isset($_POST['couleur'])){echo $_POST['couleur'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Puissance<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="pui" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pui"  required="required" type="text"
                                            value="<?php if (isset($_POST['pui'])){echo $_POST['pui'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Carburant<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <select name="catg" class="form-control col-md-7 col-xs-12" >
                                            <option value="DIESEL">Diesel</option>
                                             <option value="ESSENCE"> Essence</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cout par Jour<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="cpj" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cpj"  required="required" type="text"
                                            value="<?php if (isset($_POST['cpj'])){echo $_POST['cpj'];} ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Marque <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="marque" id="marque" class="form-control input-l" onChange="getState(this.value);">
                                        <option value="">Select Marque</option>

                                        <?php
                                        $req = "SELECT *  FROM marque  ";
                                        $var=$connexion->query($req);
                                        while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                        {

                                          $id=$ligne["idmarque"];
                                          $id1=$ligne["marque"];
                                          echo	"<option value=\"$id\"";
                                          if(isset($_POST["marque"]) && $_POST["marque"]=="$id") {echo "selected=\"selected\"";}
                                          echo "> $id1</option>";
                                        }
                                        ?>
                                      </select>
                                        </div>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">nouvelle marque</button>

                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Ajouter Marque</h4>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Nom Marque <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="nvmarqueid" type="text" name="nvmarque" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button  name="btnmarque" id="btnmarqueid" type="submit" class="btn btn-success" value="btnmarque" >Valider</button>
                                                        <?php
                                                       if(isset($_POST["btnmarque"]) == 'btnmarque')
                                                         {
                                                          if(empty($_POST["nvmarque"]))
                                                          {
                                                            echo "<script>sweetAlert({  title: 'Oops!',   text: 'champs marque vide !',   type: 'error' });</script>";

                                                          }
                                                          else
                                                          {
                                                            $req = $connexion->prepare("INSERT INTO marque (marque) VALUES (?)");
                                                            $req->bindValue(1,$_POST['nvmarque'],PDO::PARAM_STR);
                                                            $a=$req->execute();
                                                            $req->closeCursor();

                                                            if($a)
                                                            {
                                                              echo '<script>
                                                              swal({
                                                                title: "Add success",

                                                                icon: "success",
                                                                button: "OK!",
                                                                });
                                                              </script>';
                                                            }

                                                          }
                                                        }


                                                         ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Modele <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <select id="modele" name="modele" class="form-control input-l" >
    <option value="">  </option>
    </select>
                                        </div>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg1">nouveau modele</button>

                                        <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg1">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Ajouter Modele</h4>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Nom modele <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="nvm" type="text" name="nvm" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Marque <span class="required">*</span>
                                                      </label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="marquenv" id="marquenv" class="form-control input-l" >
                                                      <option value="">Select Marque</option>
                                                      <?php
                                                      $sql1="SELECT * FROM marque";
                                                      $results=$connexion->query($sql1);
                                                      while($rs=$results->fetch(PDO::FETCH_ASSOC)){
                                                        ?>
                                                        <option value="<?php echo $rs["idmarque"]; ?>"><?php echo $rs["marque"]; ?></option>
                                                        <?php
                                                      }
                                                      ?>

                                                    </select>
                                                      </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button  name="md" type="submit" class="btn btn-success" value="md" >Valider</button>
                                                        <?php

                                                     if(isset($_POST["md"]) == 'md' )
                                                        {
                                                          if(empty($_POST["nvm"]))
                                                          {
                                                            echo "<script>sweetAlert({  title: 'Oops!',   text: 'champs modele vide !',   type: 'error' });</script>";

                                                          }
                                                          else
                                                          {

                                                            $req = $connexion->prepare("INSERT INTO modele (idmarque,num) VALUES (?,?)");
                                                            $req->bindValue(1,$_POST['marquenv'],PDO::PARAM_INT);

                                                            $req->bindValue(2,$_POST['nvm'],PDO::PARAM_INT);
                                                            $a=$req->execute();
                                                            $req->closeCursor();

                                                            if($a)
                                                            {
                                                              echo '<script>
                                                              swal({
                                                                title: "Add success",

                                                                icon: "success",
                                                                button: "OK!",
                                                                });
                                                              </script>';
                                                            }

                                                          }
                                                        }


                                                         ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                                            <input id="image" class="form-control col-md-7 col-xs-12"  name="image"  required="required" type="file">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                          <input type="text" data-role="magic-overlay" name="image" id="image" data-target="#pictureBtn" data-edit="insertImage" />
                                        </div>
                                    </div>
                                  -->
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <input type="hidden" name="MAX_FILE_SIZE" value="100000" />

                                            <?php
                                            if(!empty($_POST["btn"]) == 'btn')
                                            {


                                              if(empty($_POST["numMat"]) || empty($_POST["cartegr"]) || empty($_POST["dateA"]) || empty($_POST["couleur"]) ||
                                                     empty($_POST["pui"]) || empty($_POST["catg"]) || empty($_POST["cpj"]) || empty($_POST["marque"]) || empty($_POST["modele"] )|| empty($_FILES["image"]) )
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                              }
                                            else
                                            {

                                              //$image=$_FILES["image"]["t_image"];
                                              $image = $_FILES['image']['name'];
                                              $file_extension = strrchr($_FILES['image']['name'], '.');
                                              $extensions= array(".jpeg",".jpg",".png");

                                              $req = $connexion->prepare("INSERT INTO voiture (numMatricule, carteGrise, dateAchat, couleur, puissance , categorie , coutParJour , idM , idmarque , image,idA)
                                               VALUES ( ?, ?, ? , ? , ? , ? , ? , ? , ? , ?,?)");

                                              $req->bindValue(1,$_POST['numMat'],PDO::PARAM_INT);
                                              $req->bindValue(2,$_POST['cartegr'],PDO::PARAM_STR);
                                              $req->bindValue(3,$_POST['dateA'],PDO::PARAM_STR);
                                              $req->bindValue(4,$_POST['couleur'],PDO::PARAM_STR);

                                              $req->bindValue(5,$_POST['pui'],PDO::PARAM_INT);
                                              $req->bindValue(6,$_POST['catg'],PDO::PARAM_STR);
                                              $req->bindValue(7,$_POST['cpj'],PDO::PARAM_INT);
                                              $req->bindValue(8,$_POST['modele'],PDO::PARAM_INT);
                                              $req->bindValue(9,$_POST['marque'],PDO::PARAM_INT);
                                              $req->bindValue(10,$image,PDO::PARAM_STR);
                                              $req->bindValue(11,$_SESSION['idA'],PDO::PARAM_STR);

                                              $a=$req->execute();
                                              $req->closeCursor();
                                            /*  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                            		$msg = "Image uploaded successfully";
                                            	}else{
                                            		$msg = "Failed to upload image";
                                            	}
                                              */
                                              if($a)
                                             {
                                               echo '<script>
                                               swal({
                                                 title: "Add success",

                                                 icon: "success",
                                                 button: "OK!",
                                                });
                                                </script>';
                                                echo "<script> setTimeout(\"location.href = 'listeDesVoiture.php';\", 2000); </script>";

                                              }
                                            }
                                          }

                                          if(isset($_FILES['image'])){
                                            // liste des extensions autorisée
                                            $file_extension = strrchr($_FILES['image']['name'], '.');
                                            $extensions= array(".jpeg",".jpg",".png",".PNG");
                                            if(!in_array($file_extension, $extensions)){
                                                echo "
                                                  <div class=\"alert alert-success\">
                                                    <ul class=\"fa-ul\">
                                                      <li>
                                                        <i class=\"fa fa-info-circle fa-lg fa-li\"></i>  L'extension n'est pas valide
                                                      </li>
                                                    </ul>
                                                  </div>
                            ";
                                            }
                                            else
                                            {

                                              //Enregistrement et renommage du fichier
                                              $dossier = 'images/';
                                              $nom_fichier=$_POST['cartegr'].".jpg";

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
                              ";                                              }
                                            }
                                          }
                                                ?>
                                                 <button type="reset" class="btn btn-primary" onclick="window.location='listeDesVoiture.php';">Retour</button>
                                            <button id="send" name="btn" type="submit" value="btn" class="btn btn-success">Ajouter</button>
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
