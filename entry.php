<?php 
require 'includes/app.php';
addTemplate('header');
?>

    <main class="container section centered-content">
        <h1>Guia para la decoracion de tu hogar</h1>

        

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">

            <img src="build/img/destacada.jpg" alt="Imagen destacada" loading="lazy">
        </picture>

        <p class="meta-info">Escrito por: <span> Admin</span> en la fecha: <span> 20/06/2025</span></p>


        <div class="property-summary">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, blanditiis. Eos ad accusantium modi. Dolore autem debitis quo nulla quia cupiditate minus, aperiam enim quasi beatae ab aut alias ipsum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia deleniti perspiciatis ullam, dicta laudantium minus non odio quas libero dignissimos tempora harum cumque sapiente ea, est sit. Dolor, vel dolore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, laboriosam natus sit numquam corporis consectetur eveniet repudiandae nihil odit, aliquam dolore totam quo magnam ut architecto, vitae cumque deleniti reiciendis!</p>
        </div>
    </main>

<?php addTemplate('footer'); ;?>