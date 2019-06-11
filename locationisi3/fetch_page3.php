<?php
include("bdconnexion.php"); //include config file

//sanitize post value


$results = $connexion->query('SELECT idA FROM agence');
$get_total_rows = $results->rowCount();
$item_per_page=3;
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
$results = $connexion->query( "SELECT `idA`,`codeAgence`,`nomAgence`,`logo`,`responsable`,`adresseAgence` ,`villeAgence` , `telephone` FROM Agence ORDER BY idA DESC LIMIT  $position, $item_per_page");


//output results from database

     while($ligne=$results->fetch(PDO::FETCH_ASSOC))
{
	$id=$ligne['idA'];
  $lib=$ligne['codeAgence'];
  $desc=$ligne['nomAgence'];
  $dure=$ligne['responsable'];
  $prix=$ligne['adresseAgence'];
	$nbrmax=$ligne['villeAgence'];
  $image=$ligne['logo'];
  $enseignant=$ligne['telephone'];


?>





         <div class="item col-xs-6 col-sm-6 col-md-4">
             <div class="search-result-item-container">
               <div class="search-result-item-media">
           <?php
           echo "  <img src='../gestionDesLocation/backend/images/agence/".$desc.".jpg"."' />";
  ?>
               </div>
               <div class="search-result-item-content">


                 <ul class="list-4">
									 <li><strong>Le responsable:</strong> <?php echo $dure?></li>
									 <li><strong>Adresse:</strong> <?php echo $prix ?></li>
									 <li><strong>Ville :</strong> <?php echo $nbrmax ?></li>
									 <li><strong>GSM :</strong> <?php echo $enseignant ?></li>
                 </ul>
                 <p class="grid-hidden"></p>



               </div>
             </div>
         </div>
  <?php } ?>
