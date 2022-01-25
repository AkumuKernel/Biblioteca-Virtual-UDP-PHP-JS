<?php
include 'includes/header.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->users;
$user = [
  "name" => $_POST["name"],
  "password" => $_POST["password"]
];
$result = $collection->find( $user );

$count = 0;
foreach ($result as $u) {
  $count++;
  $_SESSION["user"] = [ "mail" => $u["mail"], "name" => $u["name"]];
}

// print_r($_SESSION["user"]["name"]);
 if($count > 0 && strtolower($_SESSION["user"]["name"]) === "admin"){
   Header('Location: admin-index.php?msg="Autenticado"');
 }
 elseif($count > 0){
   Header('Location: index.php');
 }
 else{
   Header('Location: login.php?msg="Usuario o Clave Incorrecta"');
 }
