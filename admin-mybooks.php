<?php session_start();
if($_SESSION["user"]["name"]==="admin"){
include "includes/admin-header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->books;

$result = $collection->find( [  ] );
?>


    <main class="container">
      <h2>Lista de Libros Prestados</h2>
      <div class="grid grid3">
         <?php foreach ($result as $entry) {
           if($entry["taken"] !== "0"){
           ?>
           <div class="card shadow">
             <a href="#"><img class="book" <?php if(isset($entry["photo"])){echo "src='../{$entry["photo"]}'";}else{echo "src='../img/book.png'";} ?> alt=""></a>
             <h4><?php echo $entry["title"]; ?></h4>
             <p><?php echo $entry["author"]; ?></p>
             <p><?php echo $entry["isbn"]; ?></p>
             <p><?php echo $entry["taken"]; ?></p>
           </div>


      <?php }
      } ?>
    </div>
  </main>
<?php } else{
  include "includes/header.php";
  echo "<center><h2>ACCESSO DENEGADO</h2></center>";
} ?>

    </body>
  </html>
