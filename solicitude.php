<?php include "includes/header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->books;


$array = ["_id" => new MongoDB\BSON\ObjectID($_GET["id"])];

$result = $collection->find( $array );


 foreach ($result as $libro) {
   $title = $libro["title"];
   $author = $libro["author"];
   $ISBN = $libro["isbn"];
   if(isset($libro["photo"])){
     $photo = $libro["photo"];
   }
 }
?>

  <main class=" margin container shadow">

      <div class="grid">
        <div class="container">
          <img class="book" <?php if(isset($photo)){echo "src='../{$photo}'";}else{echo "src='../img/book.png'";} ?> alt="">
        </div>

          <div class="container center">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $author; ?></p>
            <p><?php echo $ISBN; ?></p>
            <?php echo '<a class="button" href="take.php?id='.$_GET["id"].'">'?>Pide tu libro</a>
          </div>
      </div>

    </main>

    <footer><p>Todos los derechos reservados.</p></footer>

  </body>
</html>
