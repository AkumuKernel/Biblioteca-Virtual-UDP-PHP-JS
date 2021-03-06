<?php
require 'vendor/autoload.php';

session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Biblioteca Virtual Ahoy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="/css/style.css" as="style">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <header>
      <h1 class="title">Biblioteca Virtual <span>Ahoy</span></h1>
    </header>

    <div class="nav-bg">
      <nav class="principal-nav container">
        <a href="index.php">Inicio</a>
        <a href="books.php">Libros Disponibles</a>
        <a href="mybooks.php">Tus libros</a>
        <?php if(isset($_SESSION["user"])){ ?>
          <a href="logout.php">Cerrar Sesion</a>
        <a href="#"><?php echo $_SESSION["user"]["name"] ?></a>
      <?php }else{ ?>
        <a href="login.php">Logeate</a>
        <a href="register.php">Registrate</a>
      <?php } ?>
      </nav>
    </div>
