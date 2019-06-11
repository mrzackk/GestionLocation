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
        <p class="grid-hidden">Looking cautiously round, to ascertain that they we. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
        <div class="price"><?php echo $cpj." MAD "?></div>
        <?php
        echo  "<a href=\"product-detail.php?idA=$id\"  class=\"btn btn-default\" role=\"button\">Details</a>";

         ?>

      </div>
    </div>
</div>
