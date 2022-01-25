<?php
require 'vendor/autoload.php';
session_start();
header("Content-Type: application/json");

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->books;
$json = [];
$books = $collection->find();

foreach ($books as $book) {
  $json[] = $book;
}

echo (json_encode($json, JSON_PRETTY_PRINT));
