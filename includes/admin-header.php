<?php
require 'vendor/autoload.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Tools</title>
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
        <a href="admin-index.php">Inicio</a>
        <a href="admin-books.php">Ve libros disponibles</a>
        <a href="admin-mybooks.php">Ve libros prestados</a>
        <a href="find.php">Consultas</a>
        <a href="#">Admin Tools</a>
      </nav>

    </div>
