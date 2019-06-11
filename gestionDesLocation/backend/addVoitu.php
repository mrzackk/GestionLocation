<?php
session_start();
require_once('db_cnx.php');
if(empty($_SESSION))
		header('Location:login.php');
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
                                <h2>Ajouter Voiture <small>voiture</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate>




                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">marque <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">new marque</button>

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
                                                            <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Logo Marque <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success">Valider</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">model <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>

                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">couleur <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">carburant<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">model <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">agence</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control">
                                                <option>agence </option>
                                                <option>Option one</option>
                                                <option>Option two</option>
                                                <option>Option three</option>
                                                <option>Option four</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button id="send" type="submit" class="btn btn-success">Submit</button>
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
<?php
if($_SESSION['superusr']=='nope')
echo '<script>var _0x161a=["\x72\x65\x6D\x6F\x76\x65","\x64\x69\x76\x2E\x6D\x65\x6E\x75\x5F\x73\x65\x63\x74\x69\x6F\x6E\x3A\x6C\x61\x73\x74\x2D\x63\x68\x69\x6C\x64"];$(_0x161a[1])[_0x161a[0]]()</script>';
?>
</body>
</html>
