<?php
include "includes/header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->consult;
$array = [
  "name" => $_POST["name"],
  "phone" => $_POST["phone"],
  "mail" => $_POST["mail"],
  "comment" => $_POST["comment"]
];
$resultado = $collection->insertOne($array);

Header('Location: index.php?msg="Mensaje enviado correctamente"');
?>
