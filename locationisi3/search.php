<?php
require_once("bdconnexion.php");
 if(isset($_POST["query"]))
 {
      $output = '';
      $query = "SELECT DISTINCT `marque` FROM `voiture` v inner join marque m on v.idmarque=m.idmarque inner join modele md on v.idM=md.idM WHERE marque LIKE '%".$_POST["query"]."%'";
      $result = $connexion->query($query);
      $output = '<ul class="list-unstyled">';
      if(($result->rowCount()) > 0)
      {
           while($row = $result->fetch(PDO::FETCH_ASSOC))
           {
                $output .= '<li>'.$row["marque"].'</li>';
           }
      }
      else
      {
           $output .= '<li>Marque Not Found</li>';
      }
      $output .= '</ul>';
      echo $output;
 }
 ?>
