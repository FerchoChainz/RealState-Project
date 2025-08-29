<?php 
require 'includes/functions.php';
addTemplate('header');
?>

    <main class="container section">
        <h1>Know About Us</h1>

        <div class="content-about">
          <div class="image">
            <picture>
              <source srcset="build/img/nosotros.webp">
              <source srcset="build/img/nosotros.jpg">
              <img src="build/img/nosotros.jpg" alt="Sobre nosotros">
            </picture>
          </div>

          <div class="text-about">
            <blockquote>
              25 años de experiencia
            </blockquote>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum in nobis officiis earum repellat voluptate excepturi, quod saepe magnam velit, delectus, possimus illum. Vel nulla qui cupiditate facilis corrupti ipsum.
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate eaque mollitia tempora culpa. In eum deleniti eligendi error quos animi ad. Tempora nesciunt commodi mollitia, reiciendis atque accusantium delectus exercitationem.
            </p>
          </div>

        </div>
    </main>

    <section class="container section">
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
      </section>

<?php addTemplate('footer'); ;?>