<?php
session_start();
if(empty($_SESSION))
		header('Location:login.php');
require_once('db_cnx.php');
$pdo= connect_bd();
if(isset($_GET["idR"])){
     $id=openssl_decrypt($_GET["idR"],'aes128','12345');
  $sql="SELECT  idR,r.idV,nom,prenom,e.idmarque,marque,numMatricule,nom_service,s.idService,dateLocation,dateFin,montant FROM reservation r inner join voiture e on r.idV=e.idV inner join service s on s.idService=r.idService inner join client c on c.idClient=r.idClient inner join marque m on m.idmarque=e.idmarque  where idR=$id ";
  $req=$pdo->prepare($sql);
  $req->execute();


  while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
        // $id=$ligne["num"];

      $nom_complet=$ligne["nom"]."  ".$ligne["prenom"];
      $voitue=$ligne["marque"].$ligne["numMatricule"];
        $matricule=$ligne["numMatricule"];
      $service=$ligne["nom_service"];
      $ser=$ligne["idService"];
      $dated=$ligne["dateLocation"];
      $datef=$ligne["dateFin"];
      $montant=$ligne["montant"];
       $voiture1=$ligne["idV"];
        $marque=$ligne["idmarque"];


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
                        <h3>Modifier la reservation</h3>
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">nom complet <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email2" name="cinre" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nom_complet; ?>" disabled>
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

                                $selected = $matricule == $ligne["numMatricule"] ? "selected='selected'" : "";

                               echo  "<option value=".$ligne["idV"]." $selected>".$ligne["marque"]."   ".$ligne["numMatricule"]."</option>";

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
            $selected = $ser == $ligne["idService"] ? "selected='selected'" : "";

                               echo  "<option value=".$ligne["idService"]." $selected>".$ligne["nom_service"]."</option>";


                            /*   echo  "<option value=".$ligne["idService"].">".$ligne["nom_service"]."</option>";*/

                                           }
                                               ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">date debut</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <?php $datd = date('Y-m-d', strtotime($ligne["dateLocation"])); ?>
                                            <input id="password" type="date" name="dated" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" value="<?php if(isset($_GET['idR'])){$dateA=date('Y-m-d',strtotime($dated)); echo$dateA;}?>"
                                            min="<?php echo date("Y-m-d");?>" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">date fin <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <?php $datf = date('Y-m-d', strtotime($ligne["dateFin"])); ?>
                                            <input type="date" id="email2" name="datef" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($_GET['idR'])){$dateB=date('Y-m-d',strtotime($datef)); echo$dateB;}?>"  min="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">montant<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="email2" name="montant" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $montant; ?>" >
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden"  name="mama" value="<?php echo $marque; ?>" />
                                            <input type="hidden"  name="mdff" value="<?php echo $voiture1; ?>" />
                                              <input type="hidden"  name="mdff" value="<?php if(isset($_GET['idR'])) echo openssl_decrypt($_GET["idR"],'aes128','12345'); ?>" />
                                            <button type="reset" class="btn btn-primary" onclick="window.location='listeDesReservation.php';">Annuler</button>
                                            <button id="send" type="submit" name="ss" class="btn btn-success">Modifier</button>

                                        </div>
                                    </div>
                                </form>
                                <?php
        if(isset($_POST["ss"]))
        {

          if(empty($_POST["voiture"]) || empty($_POST["service"]) || empty($_POST["dated"]) ||
            empty($_POST["datef"]) || empty($_POST["montant"]))
          {
            echo "<script>sweetAlert({  title: 'Oops!',   text: 'veuillez saisir tous les champs !',   type: 'error' });</script>";

          }
          else
          {
           /* $req="UPDATE reservation,voiture,client SET reservation.dateLocation=?, reservation.dateFin=?,reservation.montant=?,reservation.idService=?,voiture.idmarque=? where reservation.idR=? AND client.nPermis=?";*/
           $req="UPDATE reservation,voiture,client SET reservation.idV=? , reservation.idService=? , reservation.dateLocation=?, reservation.dateFin=?,reservation.montant=?  where voiture.idmarque=? AND reservation.idR=?";


            $var=$pdo->prepare($req);



                $dated=$_POST["dated"];
              $datef=$_POST["datef"];
               $montant=$_POST["montant"];
              $service=$_POST["service"];
                $voiture=$_POST["voiture"];
                  $marque=$_POST["mama"];
                  $voiture1=$_POST["mdff"];
             //   $id=$_POST["mdf"];





                $var->bindvalue(1,$voiture,PDO::PARAM_STR);
                $var->bindvalue(2,$service,PDO::PARAM_INT);
                $var->bindvalue(3,$dated,PDO::PARAM_STR);
                $var->bindvalue(4,$datef,PDO::PARAM_STR);
                $var->bindvalue(5,$montant,PDO::PARAM_STR);

                 $var->bindvalue(6,$marque,PDO::PARAM_INT);

                $var->bindvalue(7,$voiture1,PDO::PARAM_INT);

            if(strtotime($datef) > strtotime($dated))
                                                     {
                                            $a= $var->execute();

                                            if($a)
                                             {
                                      echo '<script>
                                     swal({
                                       title: "Bien Modifier",

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
