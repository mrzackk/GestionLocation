<?php
include("bdconnexion.php"); //include config file

//sanitize post value



$results = $connexion->query('SELECT idV FROM voiture');
$get_total_rows = $results->rowCount();
$pages = ceil($get_total_rows/$item_per_page);

if(isset($_POST["page"])){

	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);


//Limit our results within a specified range.
if(empty($_POST["select"]))
{

	$results1 =  "SELECT `idV`,`numMatricule`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA ORDER BY idV DESC LIMIT  $position, $item_per_page";


}
else
{
	$results1 =  "SELECT `idV`,`numMatricule`,`image`,`categorie`,`coutParJour`,m.marque,md.num,a.nomAgence FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM inner join agence a on v.idA=a.idA ";

	if( $_POST["select"]=="DESC")
	{
		$results1 .=  "ORDER BY marque DESC ";

	}
	elseif( $_POST["select"]=="ASC") {
		$results1 .=  "ORDER BY marque ASC ";
	}
	elseif( $_POST["select"]=="PrixA") {
		$results1 .=  "ORDER BY coutParJour ASC ";
	}
	elseif( $_POST["select"]=="PrixD") {
		$results1 .=  "ORDER BY coutParJour DESC";
	}
}




$results=$connexion->query($results1);


//output results from database

     while($ligne=$results->fetch(PDO::FETCH_ASSOC))
{
	$image=$ligne['image'];
	$mat=$ligne['numMatricule'];
	$cat=$ligne['categorie'];
	$cpj=$ligne['coutParJour'];
	$marque=$ligne['marque'];
	$mod=$ligne['num'];
	$ag=$ligne['nomAgence'];
	$id=$ligne['idV'];


?>





         <div class="item col-xs-6 col-sm-6 col-md-4">
             <div class="search-result-item-container">
               <div class="search-result-item-media">
           <?php
                   echo "  <img src='../gestionDesLocation/backend/images/".$image."' />";
  ?>
               </div>
               <div class="search-result-item-content">
                 <div class="title"><a href="product-detail.php"><?php echo $marque ?></a></div>

                 <ul class="list-4">
                   <li><strong>Agence:</strong> <?php echo $ag?></li>
                   <li><strong>Carburant:</strong> <?php echo $cat?></li>
                   <li><strong>Modele : </strong><?php echo $mod?></li>
                 </ul>
                 <p class="grid-hidden"></p>
                 <div class="price"><?php echo $cpj." MAD "?></div>
                 <?php
                 echo  "<a href=\"product-detail.php?idA=$id\"  class=\"btn btn-default\" role=\"button\">Details</a>";

                  ?>

               </div>
             </div>
         </div>
  <?php }  ?>
