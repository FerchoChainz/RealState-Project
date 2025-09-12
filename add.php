<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// var_dump($id);

if (!$id) {
  header('Location: /');
}

// Import bd
require 'includes/config/database.php';

// connection
$db = DBconn();

// query
$query = "SELECT * FROM properties WHERE id = $id ";


// get results
$result = mysqli_query($db, $query);


// redirect to main
if(!$result -> num_rows){
  header("Location: /");
}

// echo "<pre>";
// var_dump($result);
// echo "</pre>";

$propertie = mysqli_fetch_assoc($result);


require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section centered-content">
  <h1><?php echo $propertie['tittle']; ?></h1>

  <img src="/images/<?php echo $propertie['image']; ?>" alt="Imagen destacada" loading="lazy">


  <div class="property-summary">
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

    <p> <?php echo $propertie['description']; ?></p>
  </div>
</main>


<?php
mysqli_close($db);
addTemplate('footer');

?>