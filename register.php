<?php include "includes/header.php" ?>

    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="registrador.php" method="post">
        <fieldset>

          <legend>Ingrese sus datos</legend>

            <div class="fieldset">
              <label for="nombre">Usuario</label>
              <input class="input-text" type="text" name="name" placeholder="Username">
            </div>

            <div class="fieldset">
              <label for="email">Email</label>
              <input class="input-text" type="mail" name="mail" placeholder="correo@correo.com">
            </div>

            <div class="fieldset">
              <label for="contraseña">Constraseña</label>
              <input class="input-text" type="password" name="password" placeholder="Contraseña">
            </div>

            <div class="fieldset">
              <label for="">Confirme su constraseña</label>
              <input class="input-text" type="password" name="password2" placeholder="Reingrese su contraseña">
            </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>

    <footer><p>Todos los derechos reservados.</p></footer>

  </body>
</html>
