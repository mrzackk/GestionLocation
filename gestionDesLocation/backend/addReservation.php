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
                        <h3>Ajouter Réservation</h3>
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

                                <form method="post" class="form-horizontal form-label-left" novalidate>


                                    <span class="section"></span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">num reservation<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="email" name="numLocation" required="required" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['numLocation'])){echo $_POST['numLocation'];} ?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">nom complet <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="nom" class="form-control input-l" required>
                                                <option value="">_________</option>
                                        <?php
                                        $req = "SELECT *  FROM client  ";
                            $var=$pdo->query($req);
                                     while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                                        {
                                             $id=$ligne["idClient"];
                            $id1=$ligne["nom"];
                            $id2=$ligne["prenom"];

            echo    "<option value=\"$id\"";
                if(isset($_POST["nom"]) && $_POST["nom"]=="$id") {echo "selected=\"selected\"";}
            echo "> $id1 $id2</option>" ;

                           /*    echo  "<option value=".$ligne["idClient"].">".$ligne["nom"]." ".$ligne["prenom"]."</option>";*/

                                           }
                                               ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">voiture <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="voiture" class="form-control input-l" required>
                                                <option value="">_________</option>
                                                <?php
                                                $req = "SELECT v.idV,m.marque,v.numMatricule FROM voiture v INNER JOIN marque m ON v.idmarque=m.idmarque  ";
                                    $var=$pdo->query($req);
                                             while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                                    $id=$ligne["idV"];
                            $id1=$ligne["marque"];
                            $id2=$ligne["numMatricule"];

            echo    "<option value=\"$id\"";
                if(isset($_POST["voiture"]) && $_POST["voiture"]=="$id") {echo "selected=\"selected\"";}
            echo "> $id1 $id2</option>" ;

                                      /* echo  "<option value=".$ligne["idV"].">".$ligne["marque"]."   ".$ligne["numMatricule"]."</option>";*/

                                                   }
                                                       ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">service <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="service" class="form-control input-l" required>
                                                <option value="">_________</option>
                                        <?php
                                        $req = "SELECT *  FROM service  ";
                            $var=$pdo->query($req);
                                     while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                            $id=$ligne["idService"];
                            $id1=$ligne["nom_service"];
                          //  $id2=$ligne["prenom"];

            echo    "<option value=\"$id\"";
                if(isset($_POST["service"]) && $_POST["service"]=="$id") {echo "selected=\"selected\"";}
            echo "> $id1 </option>" ;

                              /* echo  "<option value=".$ligne["idService"].">".$ligne["nom_service"]."</option>";*/

                                           }
                                               ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">date debut</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" type="date" name="dated" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" value="<?php if (isset($_POST['dated'])){echo $_POST['dated'];} ?>" min="<?php echo date("Y-m-d");?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">date fin <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" id="email2" name="datef" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['datef'])){echo $_POST['datef'];}  ?>" min="<?php echo date("Y-m-d");?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">montant<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="montant" name="montant" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['montant'])){echo $_POST['montant'];} ?>" >
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary" onclick="window.location='listeDesReservation.php';">Annuler</button>
                                            <button id="send" type="submit" name="btn" class="btn btn-success">Ajouter</button>
                                           <?php

                                             if(!empty($_POST)){

                                             if(empty($_POST["numLocation"]) || empty($_POST["voiture"]) || empty($_POST["service"]) || empty($_POST["nom"]) ||
                                                    empty($_POST["dated"]) || empty($_POST["datef"]) || empty($_POST["montant"]))
                                                    {
                                                      echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                                    }
                                            else  {
                                                  $date1=$_POST['dated'];
                                            $date2=$_POST['datef'];
                                                 $req = $pdo->prepare("INSERT INTO reservation (numLocation, dateLocation, dateFin, montant, idV , idService , idClient) VALUES (?, ?, ?, ? , ? , ? , ?)");

                                             $req->bindValue(1,$_POST['numLocation'],PDO::PARAM_INT);
                                             $req->bindValue(2,$_POST['dated'],PDO::PARAM_STR);
                                             $req->bindValue(3,$_POST['datef'],PDO::PARAM_STR);
                                             $req->bindValue(4,$_POST['montant'],PDO::PARAM_STR);

                                             $req->bindValue(5,$_POST['voiture'],PDO::PARAM_STR);
                                             $req->bindValue(6,$_POST['service'],PDO::PARAM_STR);
                                             $req->bindValue(7,$_POST['nom'],PDO::PARAM_STR);

                                              if(strtotime($date2) > strtotime($date1))
                                                     {
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
                                          window.location = \'listeDesReservation.php\';
                                          });
                                     </script>';
                                         //alert("New record created successfully");
                                   //  echo'<script>window.location.href="listeDesAgence.php"</script>';
                                    }
                                    else {
                                  //        echo '<script>swal("Operation Failed!","error");</script>';
                                 echo "<script>sweetAlert({  title: 'Oops!',   text: 'Something went wrong !',   type: 'error' });</script>";
                                    }








                                                        }
                                                        else
                                                        {
                                                        echo '<script>swal("Operation Failed!","error");</script>';
                                 echo "<script>sweetAlert({  title: 'verifié la date!',   text: 'date debut doit etre superieur date fin !',   type: 'error' });</script>";
                                                        }
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
