<?php 

if(!isset($_SESSION)){
  session_start();
}

$auth = $_SESSION['login'] ?? false;

  // var_dump($auth);

?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/build/css/app.css" />
    <title>RealState</title>
  </head>
  <body>
    <header class="header <?php echo $main ? 'main' : '';?>">
      <div class="container header-content">
        <div class="bar">
          <a href="/">
            <img src="/build/img/logo.svg" alt="imagen logotipo" />
          </a>

          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="Icon">
          </div>


          <div class="right">
            <img src="/build/img/dark-mode.svg" alt="darkmode icon" class="dark-mode-btn">


            <nav class="navegation">
              <a href="about.php">About us</a>
              <a href="adds.php">Advertisements</a>
              <a href="blog.php">Blog</a>
              <a href="contact.php">Contact</a>
 

              <?php if($auth): ?>
                  <a href="/log-out.php">Log Out</a>
              <?php endif; ?>
            </nav>
          </div>
        </div>
        <!-- CIERRE DE BARRA-->


        <?php 
        
        if($main){
          echo "<h1>Venta de casas y departamentos exclusivos de lujo. </h1>";
        }
        
        ?>
      </div>
    </header>