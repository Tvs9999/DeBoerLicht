<?php
include 'connection.php';
?>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
<div class="toevoegen">

  <div class="toevoegen-content">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id"><br>
      <input type="text" name="productnaam" class="input" placeholder="Product Naam"><br>
      <input class="input" type="name" name="price" placeholder="Prijs"><br>
      <input class="input" type="name" name="korting" placeholder="Korting"><br>
      <input class="input" type="name" name="type" placeholder="Type"><br>
      <input class="input" type="name" name="voltage" placeholder="Voltage"><br>
      <input class="input" type="name" name="catId" placeholder="Categorie"><br>
      <input class="input" type="name" name="voorraad" placeholder="Voorraad"><br>
      <input class="input" type="file" name="Foto1" id="Foto1"><br>
      <input class="input" type="file" name="Foto2" id="Foto2"><br>
      <input class="toevoegen-btn" type="submit" value="Toevoegen" name="submit">
    </form>
  </div>
</div>
</body>