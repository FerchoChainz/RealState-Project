<?php
// Import bd

use App\Propertie;


if($_SERVER['SCRIPT_NAME'] === '/adds.php'){
  $properties = Propertie::all();
} else{
  $properties = Propertie::get(3);
}

?>

<div class="container-adds">

<?php foreach ($properties as $propertie){?>

    <div class="adds">
      <img src="/images/<?php echo $propertie->image; ?>" alt="Anuncio" loading="lazy">


      <div class="add-content">
        <h3><?php echo $propertie->tittle; ?></h3>
        <p><?php echo $propertie->description; ?></p>
        <p class="price"><?php echo currency($propertie->price); ?></p>

        <ul class="icons-specifics">
          <li>
            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
            <p><?php echo $propertie->wc; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionaminto">
            <p><?php echo $propertie->parking; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
            <p><?php echo $propertie->rooms; ?></p>
          </li>
        </ul>

        <a href="add.php?id=<?php echo $propertie->id; ?>" class="yellow-btn-b">View Property</a>

      </div><!--content-adds-->
    </div> <!--Adds-->
    
    <?php } ?>
</div><!--container-adds-->

