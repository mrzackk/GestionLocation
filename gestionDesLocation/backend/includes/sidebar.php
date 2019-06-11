<?php


?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="./index.php" class="site_title"><i class="fa fa-car"></i> <span>SUP MTI CARS!</span></a>
        </div>


        <!-- menu profile quick info -->
        <div class="profile ">
            <div class="col-xs-12 text-center ">
                <img src="images/logo1.ico" alt="..." class="img-circle img-responsive" >
            </div>

            <div class="clearfix"></div>
        </div>



        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Admin</h3>
                <ul class="nav side-menu">
                    <li><a href="./index.php"><i class="fa fa-home green"></i> Accueil </a></li>
                    <li><a><i class="fa fa-car blue"></i> Gestion Des Voitures <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./listeDesVoiture.php"><i class="fa fa-list red"></i>Liste Des Voitures</a></li>
                            <li><a href="./addVoiture.php"><i class="fa fa-plus green"></i>Ajouter Voiture</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-list blue"></i>Gestion Reservation<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./listeDesReservation.php"><i class="fa fa-list red"></i>Liste des reservation</a></li>
                            <li><a href="./addReservation.php"><i class="fa fa-plus green"></i>reservation </a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-group green"></i> Gestion Des Clients <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./listeDesClient.php" ><i class="fa fa-list red"></i>Liste Des Clients</a></li>
                            <li><a href="./addClient.php" ><i class="fa fa-plus green"></i>Ajouter  Client</a></li>
                        </ul>
                    </li>



                </ul>
            </div>
            <?php
            if(isset($_SESSION['superusr'])){
                if($_SESSION['superusr']=='yup'){
                echo "<div class='menu_section'><h3>Super Admin</h3><ul class='nav side-menu'><li><a><i class='fa fa-building green'></i> Gestion Des Agence <span class='fa fa-chevron-down'></span></a><ul class='nav child_menu'><li><a href='./listeDesAgence.php'><i class='fa fa-list red'></i>Liste Des Agence</a></li><li><a href='./addAgence.php'><i class='fa fa-plus green'></i>Ajouter  Agence</a></li></ul></li></ul></div>";
                //echo '<script>alert('.$_SESSION['superusr'].')</script>';
              }
            }
            ?>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="./logout.php"">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
