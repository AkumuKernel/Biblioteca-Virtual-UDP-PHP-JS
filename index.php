<?php include "includes/header.php"; ?>
    <section class="hero">
        <div class="content-hero">

        <h2>Bienvenido a la Biblioteca Ahoy</h2>

        <p>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#009988" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="11" r="3" />
          <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
          </svg>
        Santiago, Chile</p>
        <?php if(isset($_SESSION["user"])){ ?>
          <a class="button">Bienvenido <?php echo $_SESSION["user"]["name"] ?></a>
        <?php }else{ ?>
          <section class="container">
              <div class="flex center-flex">
                <a class="button" href="login.php">Logeate</a>
                <p> ó </p>
                <a class="button" href="register.php">Registrate</a>
              </div>
            </section>
      <?php } ?>
      </div>
    </section>


    <main class="container shadow">
      <h2>Servicios disponibles</h2>

        <div class="services">
          <section class="service">
            <h3>Vista de libros disponibles</h3>
            <div class="icons">

            <a href="books.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" />
            </svg></a>
          </div>
          </section>

          <section class="service">
            <h3>Solicitar/Devolver libros</h3>
            <div class="icons">

            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
              <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
              <line x1="3" y1="6" x2="3" y2="19" />
              <line x1="12" y1="6" x2="12" y2="19" />
              <line x1="21" y1="6" x2="21" y2="19" />
            </svg></a>
          </div>
          </section>

          <section class="service">
            <h3>Ver libros a tu nombre</h3>
            <div class="icons">

            <a href="mybooks.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
              <line x1="13" y1="8" x2="15" y2="8" />
              <line x1="13" y1="12" x2="15" y2="12" />
            </svg></a>
          </div>
          </section>
        </div>


    <section>
      <h2>Consulta Datos</h2>

      <form class="formulary" action="consult.php" method="post">

        <fieldset>

          <legend>Consulte sus datos llenando los campos</legend>

            <div class="container-fieldset">

            <div class="fieldset">
              <label for="">Nombre</label>
              <input class="input-text" type="text" name="name" placeholder="Tu nombre" <?php if(isset($_SESSION["user"])) echo "value=\"". $_SESSION["user"]["name"] ."\""  ?>>
            </div>

            <div class="fieldset">
              <label for="">Telefono</label>
              <input class="input-text" type="tel" name="phone" placeholder="+569XXXXXXXX">
            </div>

            <div class="fieldset">
              <label for="">Correo</label>
              <input class="input-text" type="mail" name="mail" placeholder="correo@correo.com" <?php if(isset($_SESSION["user"])) echo "value=\"". $_SESSION["user"]["mail"] ."\""  ?> >
            </div>

            <div class="fieldset">
              <label for="">Comentario</label>
              <textarea class="input-text" name="comment"></textarea>
            </div>
          </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>

      </form>

    </section>
  </main>

    <footer><p>Todos los derechos reservados.</p></footer>
  </body>
</html>
