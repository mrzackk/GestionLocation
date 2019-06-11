<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once('db_cnx.php');
$pdo= connect_bd();
if(isset($_GET["idV"])){
     $id=openssl_decrypt($_GET["idV"],'aes128','12345');
  $sql="SELECT * from voiture where idV= $id";
  $req=$pdo->prepare($sql);
  $req->execute();


  while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
        // $id=$ligne["num"];

       $id=$ligne["idV"];
        $matricule=$ligne["numMatricule"];
        $carteG=$ligne["carteGrise"];
        $datA = date('Y-m-d', strtotime($ligne["dateAchat"]));
        $coleur=$ligne["couleur"];


        $puis=$ligne["puissance"];
        $cat=$ligne["categorie"];
        $CPJ=$ligne["coutParJour"];
        $idmrq=$ligne["idmarque"];
        $idmod=$ligne["idM"];


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
                        <h3>Modifier Voiture</h3>
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




                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Matricule<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email2" name="matricule" data-validate-linked="email"
                                        pattern="[a-zA-Z]*" title="hhhhh" class="form-control col-md-7 col-xs-12" value="<?php echo $matricule; ?>"
                                         required disabled >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">cartGrise <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="carte" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $carteG; ?>" disabled >
                                        </div>
                                    </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Date Achate <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" id="email2" name="dateA" data-validate-linked="email" required="required"
                                            min="<?php echo date('Y-m-d');?>"class="form-control col-md-7 col-xs-12" value="<?php echo $datA; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Puissance<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="puissance" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $puis; ?>" disabled>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">marque <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="marque" class="form-control input-l" required disabled>
                                                <option value="">_________</option>
                                        <?php
                                        $req = "SELECT *  FROM marque  ";
                            $var=$pdo->query($req);
                                     while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                                        {
            $selected = $idmrq == $ligne["idmarque"] ? "selected='selected'" : "";

                               echo  "<option value=".$ligne["idmarque"]." $selected>".$ligne["marque"]."</option>";


                            /*   echo  "<option value=".$ligne["idService"].">".$ligne["nom_service"]."</option>";*/

                                           }
                                               ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">modele <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="modele" class="form-control input-l" required disabled>
                                                <option value="">_________</option>
                                        <?php
                                        $req = "SELECT *  FROM modele  ";
                            $var=$pdo->query($req);
                                     while($ligne=$var->fetch(PDO::FETCH_ASSOC))
                                                        {
            $selected =  $idmod == $ligne["idM"] ? "selected='selected'" : "";

                               echo  "<option value=".$ligne["idM"]." $selected>".$ligne["num"]."</option>";


                            /*   echo  "<option value=".$ligne["idService"].">".$ligne["nom_service"]."</option>";*/

                                           }
                                               ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">couleur<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="couleur" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $coleur; ?>" >
                                        </div>
                                    </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">carburant<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="categorie" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cat; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Prix Par Jour<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="prix" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $CPJ; ?>" >
                                        </div>
                                    </div>







                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">

                                              <input type="hidden"  name="mdff" value="<?php if(isset($_GET['idV'])) echo openssl_decrypt($_GET["idV"],'aes128','12345'); ?>" />
                                            <button type="submit" name="cancel" class="btn btn-primary">Retour</button>
                                            <?php
                                            if(isset($_POST['cancel']))
                                            {
                                            echo "<script> setTimeout(\"location.href = 'listeDesVoiture.php';\"); </script>";
                                             }
                                            ?>


                                            <button id="send" type="submit" name="ss" class="btn btn-success">Modifier </button>

                                        </div>
                                    </div>
                                </form>
                                <?php
        if(!empty($_POST))
        {

 if(  empty($_POST["couleur"]) || empty($_POST["prix"]))
                                              {
                                                echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

                                              }
                                          else
                                        {
           /* $req="UPDATE reservation,voiture,client SET reservation.dateLocation=?, reservation.dateFin=?,reservation.montant=?,reservation.idService=?,voiture.idmarque=? where reservation.idR=? AND client.nPermis=?";*/
           $req="UPDATE `voiture` SET  `couleur` = ?,
                        `coutParJour` = ? WHERE `voiture`.`idV` = ?";


            $var=$pdo->prepare($req);








               // $var->bindvalue(1,$_POST['matricule'],PDO::PARAM_STR);
               // $var->bindvalue(2,$_POST['carte'],PDO::PARAM_STR);
               // $var->bindvalue(3,$_POST['dateA'],PDO::PARAM_STR);
                $var->bindvalue(1,$_POST['couleur'],PDO::PARAM_STR);
               // $var->bindvalue(5,$_POST['puissance'],PDO::PARAM_INT);

               //  $var->bindvalue(6,$_POST['categorie'],PDO::PARAM_STR);

                $var->bindvalue(2,$_POST['prix'],PDO::PARAM_INT);
               // $var->bindvalue(8,$_POST['marque'],PDO::PARAM_INT);
               // $var->bindvalue(9,$_POST['modele'],PDO::PARAM_INT);
                $var->bindvalue(3,$_POST['mdff'],PDO::PARAM_INT);


                                            $a= $var->execute();

                                            if($a)
                                             {
                                      echo '<script>
                                     swal({
                                       title: "Bien Modifier",

                                       icon: "success",
                                       button: "OK!",
                                      }). then(function(result){
                                         window.location = \'listeDesVoiture.php\';
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
