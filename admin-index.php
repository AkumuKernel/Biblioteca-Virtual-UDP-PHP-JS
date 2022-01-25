<?php session_start();
if($_SESSION["user"]["name"]==="admin"){
include "includes/admin-header.php" ?>
    <main>
      <form class="formulary margin" action="insertone.php" enctype=multipart/form-data method="post">
        <fieldset>

          <legend>Ingrese datos</legend>

            <div class="fieldset">
              <label for="">Titulo</label>
              <input class="input-text" type="text" name="title" placeholder="Title">
            </div>

            <div class="fieldset">
              <label for="">Autor</label>
              <input class="input-text" type="text" name="author" placeholder="Author">
            </div>

            <div class="fieldset">
              <label for="">ISBN</label>
              <input class="input-text" type="text" name="isbn" placeholder="ISBN">
            </div>

            <div class="fieldset">
              <label for="image">Imagen</label>
              <input id="image" class="input-text" type="file" name="image" placeholder="image">
            </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="submit" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>

    <footer><p>Todos los derechos reservados.</p></footer>

  </body>
</html>
<?php } else{
  include "includes/header.php";
  echo "<center><h2>ACCESSO DENEGADO</h2></center>";
} ?>
