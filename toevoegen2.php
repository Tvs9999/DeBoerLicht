<?php
include 'connection.php';
?>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
<div class="toevoegen">

  <div class="toevoegen-content">
    <form action="upload2.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id"><br>
      <input type="text" name="naam" class="input" placeholder="categorie naam"><br>
      <input class="input" type="file" name="foto" id="foto"><br>
      <input class="toevoegen-btn" type="submit" value="Toevoegen" name="submit">
    </form>
  </div>
</div>
</body>