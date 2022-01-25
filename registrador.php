
<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->users;
$array = [ "name" => $_POST["name"], "mail" => $_POST["mail"], "password" => $_POST["password"] ];
$array2 = ["name" => $_POST["name"], "mail" => $_POST["mail"]];

if($_POST["name"] == "" || $_POST["mail"]=="" || $_POST["password"]== ""){
  Header('Location: register.php?msg="Rellene todos los datos"');
}
else{
  $users = $collection->find($array2);

  $count = 0;
  foreach ($users as $user) {
    $count++;
  }

  if($count === 0){
    $resultado = $collection->insertOne($array);
    echo "El usuario ha sido registrado correctamente";
    Header('Location: index.php');
  }
  else{
    Header('Location: register.php?msg="El usuario ya está registrado"');
  }
}
