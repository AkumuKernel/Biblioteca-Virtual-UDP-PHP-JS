<?php
require 'vendor/autoload.php';
session_start();
header("Content-Type: application/json");

$route = explode("api.php/",$_SERVER["REQUEST_URI"])[1];
$route1 = explode("/", $route);
$client = new MongoDB\Client("mongodb://localhost:27017");
// print_r($route1);

switch ($route1[0]) {
  case "libros":
  $collection = $client->biblioteca->books;
    switch ($route1[1]) {
      case "visualizar":
        $result = $collection->find( [  ] );
        $json = [];
        foreach ($result as $entry) {
          unset($entry["taken"]);
          $json[] = $entry;
        }
        print(json_encode($json, JSON_PRETTY_PRINT));
        break;

      case "detalles":
        $result = $collection->find( [ "isbn" => $route1[2] ] );
        $json = [];
        foreach ($result as $entry) {
          $json[] = $entry;
        }
        echo(json_encode($json, JSON_PRETTY_PRINT));
        break;

      case "disponibles":
        $result = $collection->find( [  ] );
        $json = [];
        foreach ($result as $entry) {
          if($entry["taken"]==="0"){
            unset($entry["taken"]);
            $json[] = $entry;
          }
        }
        echo(json_encode($json, JSON_PRETTY_PRINT));
        break;

      case "pedir":
        $array = ["isbn" => $_POST["isbn"]];
        $result = $collection->findOne($array);
        if(isset($_SESSION["user"]) && isset($result) && $result["taken"] === "0"){

          $collection->updateOne(
            $array,
            ['$set' => ['taken' => $_SESSION["user"]["name"]]]
          );
          echo json_encode(["result"=>true, "msg"=>"libro solicitado"]);
        }else{
          echo json_encode(["result"=>false, "msg"=>"libro no solicitado"]);
        }
        break;

      case "pedidos":
        $result = $collection->find( [  ] );
        $json = [];
        if(isset($_SESSION["user"])){
          foreach ($result as $entry) {
            if($entry["taken"] === $_SESSION["user"]["name"]){
              $json[] = $entry;
            }
          }
          echo(json_encode($json, JSON_PRETTY_PRINT));
        }
        break;

      case "devolver":
        $array = ["isbn" => $_POST["isbn"]];
        $result = $collection->findOne($array);

        if(isset($_SESSION["user"]) && $result["taken"] === $_SESSION["user"]["name"] ){

          $collection->updateOne(
            $array,
            ['$set' => ['taken' => "0"]]
          );
          echo json_encode(["result"=>true, "msg"=>"libro devuelto"]);
        }else{
          echo json_encode(["result"=>false, "msg"=>"libro no devuelto"]);
        }
        break;

      case "agregar":
         if($_POST["password"] === "1234" && $_POST["titulo"] !== null && $_POST["autor"] !== null && $_POST["isbn"] !== null){
           $book = [
             "title" => $_POST["titulo"],
             "author" => $_POST["autor"],
             "isbn" => $_POST["isbn"],
             "taken" => "0"
           ];
           $resultado = $collection->insertOne( $book );
           echo(json_encode(["result"=> true, "msg"=>"Libro Ingresado", "success" => $resultado->getInsertedId()], JSON_PRETTY_PRINT));
         }
         else {
           echo json_encode(["result" => false, "msg" => "Libro no ingresado"], JSON_PRETTY_PRINT);
         }
        break;

      case "veradmin":
        if($_POST["password"]==="1234"  || $_SESSION["user"]["name"] === "admin"){
          $result = $collection->find( [  ] );
          $json = [];
          foreach ($result as $entry) {
            if($entry["taken"] !== "0"){
              $json[] = $entry;
              }
            }
            echo(json_encode($json, JSON_PRETTY_PRINT));
          }
          else{
            echo json_encode(["result" => false]);
          }
        break;

      default:
        echo "Pagina NO encontrada";
        break;
    }
    break;
  case "usuario":
  $collection = $client->biblioteca->users;
      switch ($route1[1]) {
        case 'login':
          $user = [
            "name" => $_POST["username"],
            "password" => $_POST["password"]
          ];
          $result = $collection->find( $user );

          $count = 0;
          foreach ($result as $u) {
            $count++;
            $_SESSION["user"] = [ "mail" => $u["mail"], "name" => $u["name"]];
          }

           if($count > 0 && strtolower($_SESSION["user"]["name"]) === "admin"){
             echo json_encode(["login"=>true, "msg"=>"ADMIN"]);
           }
           elseif($count > 0){
             echo json_encode(["login"=>true, "msg"=>"Ingreso exitoso"]);
           }
           else{
             echo json_encode(["login"=>false, "msg"=>"Ingreso fallido"]);
           }
          break;
        case 'registrar':
          $array = [ "name" => $_POST["username"], "mail" => $_POST["email"], "password" => $_POST["password"] ];
          $array2 = ["name" => $_POST["username"], "mail" => $_POST["email"]];

          if($_POST["username"] == "" || $_POST["email"]=="" || $_POST["password"]== ""){
            echo json_encode(["result"=>false, "msg"=>"rellene todos los campos"],JSON_PRETTY_PRINT);
          }
          else{
            $users = $collection->findOne($array2);

            if(isset($users) === false){
              $resultado = $collection->insertOne($array);
              echo json_encode(["result"=>true, "msg"=>"registro exitoso"],JSON_PRETTY_PRINT);
            }
            else{
              echo json_encode(["result"=>false, "msg"=>"registro fallido"],JSON_PRETTY_PRINT);
            }
          }
          break;
        case 'session':
            echo json_encode($_SESSION["user"]);
            break;

        case 'logout':
            session_destroy();
            echo json_encode(["result"=>true, "msg"=>"sesion cerrada"], JSON_PRETTY_PRINT);
            break;
        default:
        echo "Pagina NO encontrada";
        break;
      }
      break;
  default:
    echo "Pagina NO encontrada";
    break;
}
