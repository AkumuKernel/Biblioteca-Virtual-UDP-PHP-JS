<?php
include "includes/admin-header.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->biblioteca->consult;

$result = $collection->find( [  ] );

?>
  <main class="container">
  <div class="grid grid3">

  <?php
  foreach ($result as $entry) {
    ?><div class="card shadow"><?php
      ?> <p><?php echo $entry["name"]; ?></p> <?php
      ?><p><?php echo $entry["phone"]; ?></p><?php
      ?><p><?php echo $entry["mail"]; ?></p><?php
      ?><p><?php echo $entry["comment"]; ?></p></div><?php
  }
  ?>
</div>

  </main>
