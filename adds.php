<?php 
require 'includes/functions.php';
addTemplate('header');
?>

    <main class="container section">
      <h2>Houses on Sale!</h2>
         <?php

          $limit = 10;
          
          include 'includes/templates/ads.php';
        ?>
    </main>

<?php addTemplate('footer'); ?>