<?php 
require 'includes/functions.php';
addTemplate('header');
?>


    <main class="container section">
        <h1>Formulario de contacto</h1>

        <picture>
          <source srcset="build/img/destacada3.webp" type="webp">
          <source srcset="build/img/destacada3.jpg" type="jpeg">

          <img src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form action="" class="form">
          <fieldset>
            <legend>Informacion personal</legend>

            <label for="name">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="name" >
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu correo" id="email" >
            <label for="phone">Telefono</label>
            <input type="tel" placeholder="Tu numero" id="phone" >
            <label for="message">Mensaje</label>
            <textarea id="message"></textarea>
          </fieldset>

          <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="options">Vende o Compra</label>
            <select id="options">
              <option value="" disabled selected>-- Seleccione --</option>
              <option value="buy">Compra</option>
              <option value="sell">Vende</option>
            </select>

            <label for="budget">Presupuesto</label>
            <input type="number" placeholder="Tu presupuesto" id="budget">
          </fieldset>

          <fieldset>
            <legend>Contacto</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="contact-form">
              <label for="contact-phone">Telefono</label>
              <input name="contact" type="radio" id="contact-phone" value="phone">


              <label for="contact-mail">Correo</label>
              <input name="contact" type="radio" id="contact-mail" value="email">
            </div>

            <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>
            <label for="date">Fecha</label>
            <input type="date" id="date">

            <label for="hour">Hora</label>
            <input type="time" id="hour" min="09:00" max="18:00">
          </fieldset>


          <input type="submit" value="send" class="green-btn">
        </form>
    </main>
<?php addTemplate('footer'); ;?>