<?php session_start();
include "includes/header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->books;

$result = $collection->find( [  ] );
  if(isset($_SESSION["user"])){?>
    <main class="container">
      <h2>Lista de Libros Disponibles</h2>
      <div class="grid grid3">
         <?php foreach ($result as $entry) {
           if($entry["taken"] === "0"){
           ?>
          <div class="card shadow">
            <a <?php echo 'href="solicitude.php?id='.$entry["_id"].'"'?>><img class="book" <?php if(isset($entry["photo"])){echo "src='../{$entry["photo"]}'";}else{echo "src='../img/book.png'";} ?> alt=""></a>
            <h4><?php echo $entry["title"]; ?></h4>
            <p><?php echo $entry["author"]; ?></p>
            <p><?php echo $entry["isbn"]; ?></p>
          </div>

      <?php }
        }  ?>
    </div>
  </main>
<?php } else{ ?>
  <main class="container">
    <h2>Debes logearte para ver tus libros Disponibles</h2>

      <div class="flex center-flex">
        <a class="button" href="login.php">Logeate</a>
        <p> ó </p>
        <a class="button" href="register.php">Registrate</a>
      </div>
    </main>
<?php } ?>

    </body>
  </html>
