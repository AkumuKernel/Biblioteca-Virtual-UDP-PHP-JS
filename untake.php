<?php include "includes/header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->books;


$array = ["_id" => new MongoDB\BSON\ObjectID($_GET["id"])];

$collection->updateOne(
  $array,
  ['$set' => ['taken' => "0"]]
);

Header("Location: books.php?msg='Libro Pedido de forma correcta'");
?>
