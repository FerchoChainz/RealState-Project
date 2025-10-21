<?php

declare(strict_types=1);


require 'includes/app.php';
addTemplate('header',$main = true);
?>


    <main class="container section">
        <h1>More about us</h1>

        <div class="icons-about">
          <div class="icon">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Security</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, fugit nostrum numquam corrupti ab aliquid dicta sit soluta fugiat dolore facilis pariatur dolor obcaecati et consequuntur asperiores ut alias ipsum!</p>
          </div>
          <div class="icon">
            <img src="build/img/icono2.svg" alt="Icono seguridad" loading="lazy">
            <h3>Price</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, fugit nostrum numquam corrupti ab aliquid dicta sit soluta fugiat dolore facilis pariatur dolor obcaecati et consequuntur asperiores ut alias ipsum!</p>
          </div>
          <div class="icon">
            <img src="build/img/icono3.svg" alt="Icono seguridad" loading="lazy">
            <h3>Time</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, fugit nostrum numquam corrupti ab aliquid dicta sit soluta fugiat dolore facilis pariatur dolor obcaecati et consequuntur asperiores ut alias ipsum!</p>
          </div>
        </div>
      </main>

      <section class="section container">
        <h2>Houses and Departments on sale!</h2>

        <?php
          
          include 'includes/templates/ads.php';
        ?>

         <div class="align-right">
          <a href="adds.php" class="green-btn">See all</a>
         </div>
      </section>


      <section class="contact-img">
        <h2>Found your dreamed house</h2>
        <p>Fill out this contact form and an advisor will contact you shortly.</p>
        <a href="contact.php " class="yellow-btn">Contact us</a>
      </section>


      <div class="container section under-section">
        <section class="blog">
          <h3>Our blog</h3>

          <article class="blog-entry">
            <div class="image">
              <picture>
                <source srcset="build/img/blog1.webp" type="webp">
                <source srcset="build/img/blog1.jpeg" type="jpg">
                <img src="build/img/blog1.jpg" alt="Texto entrada blog">
              </picture>
            </div>

            <div class="text-entry">
              <a href="entry.php">
                <h4>Terraza en el techo de tu casa</h4>
                <p>Escrito el: <span>20/10/2025 </span>por: <span>Admin</span></p>

                <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
              </a>
            </div>
          </article>


          <article class="blog-entry">
            <div class="image">
              <picture>
                <source srcset="build/img/blog2.webp" type="webp">
                <source srcset="build/img/blog2.jpeg" type="jpg">
                <img src="build/img/blog2.jpg" alt="Texto entrada blog">
              </picture>
            </div>

            <div class="text-entry">
              <a href="entry.php">
                <h4>Guia para la decoracion de tu hogar</h4>
                <p>Escrito el: <span>20/10/2025 </span>por: <span>Admin</span></p>
                
                <p>Maximiza el espacio en tu hogar con esta guia, aprender a combinar muebles y colores para darle vida a tu espacio.</p>
              </a>
            </div>
          </article>
        </section>


        <section class="testimonials">
          <h3>Testimoniales</h3>
          
          <div class="testimon">
            <blockquote>
              El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas
            </blockquote>

            <p>- Lazaro Estrada</p>
          </div>
        </section>
      </div>


<?php addTemplate('footer'); ;?>