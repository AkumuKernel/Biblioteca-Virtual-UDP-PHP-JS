
<?php
include 'includes/admin-header.php';

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$colection = $cliente->biblioteca->books;

$book = [
  "title" => $_POST["title"],
  "author" => $_POST["author"],
  "isbn" => $_POST["isbn"],
  "taken" => "0"
];

$target_dir = "img/";
$target_file = $target_dir . rand() .basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    ?><h2><?php echo "File is an image - " . $check["mime"] . "."; ?></h2><?php
    $uploadOk = 1;
  } else {
    ?><h2><?php echo "File is not an image."; ?></h2><?php
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  ?><h2><?php echo "Sorry, file already exists.";?></h2><?php
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  ?><h2><?php echo "Sorry, your file is too large.";?></h2><?php
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "webp") {
  ?><h2><?php echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; ?></h2><?php
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  ?><h2><?php echo "Sorry, your file was not uploaded."; ?></h2><?php
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
  ?><h2><?php  echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";?></h2><?php
      $book += [
        "photo" => $target_file
      ];
  } else {
  ?><h2><?php  echo "Sorry, there was an error uploading your file."; ?></h2><?php
  }
}
$resultado = $colection->insertOne( $book );
?> <h2><?php echo "Inserted with Object ID '{$resultado->getInsertedId()}'"; ?></h2>
