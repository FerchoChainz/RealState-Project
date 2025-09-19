<?php
// Import bd

// connection
$db = DBconn();

// query
$query = "SELECT * FROM properties LIMIT $limit";


// get results
$result = mysqli_query($db, $query);


?>

<div class="container-adds">

  <?php while ($propertie = mysqli_fetch_assoc($result)): ?>

    <div class="adds">
      <img src="/images/<?php echo $propertie['image']; ?>" alt="Anuncio" loading="lazy">


      <div class="add-content">
        <h3><?php echo $propertie['tittle']; ?></h3>
        <p><?php echo $propertie['description']; ?></p>
        <p class="price"><?php echo $propertie['price']; ?></p>

        <ul class="icons-specifics">
          <li>
            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
            <p><?php echo $propertie['wc']; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionaminto">
            <p><?php echo $propertie['parking']; ?></p>
          </li>
          <li>
            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
            <p><?php echo $propertie['rooms']; ?></p>
          </li>
        </ul>

        <a href="add.php?id=<?php echo $propertie['id']; ?>" class="yellow-btn-b">View Property</a>

      </div><!--content-adds-->
    </div> <!--Adds-->

  <?php endwhile ?>
</div><!--container-adds-->


<?php

// close connection 
mysqli_close($db);

?>