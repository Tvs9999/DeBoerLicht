<?php
include 'connection.php';
$leCatNaam = $_GET['categorie'];
$getCatId = "SELECT * FROM categorie WHERE naam = '$leCatNaam'";
$cat = mysqli_query($conn, $getCatId);
$catRow = mysqli_fetch_array($cat);

$catId = $catRow['id'];

$query = "SELECT naam FROM categorie 
WHERE id = $catId";
$catNaam = mysqli_query($conn, $query);
$categorie = mysqli_fetch_array($catNaam);

?>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
  <div class="toevoegen">

    <div class="toevoegen-content">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"><br>
        <input type="text" name="productnaam" class="input" placeholder="Product Naam" require><br>
        <input class="input" type="name" name="price" placeholder="Prijs"require><br>
        <input class="input" type="name" name="korting" placeholder="Korting" require><br>
        <input class="input" type="name" name="type" placeholder="Type" require><br>
        <input class="input" type="name" name="voltage" placeholder="Voltage" require><br>
        <input type="text" naam="catId" value="<?php $catId ?>">
        <p class="input">Categorie: <?php echo $categorie['naam'] ?></p>
        <input class="input" type="name" name="voorraad" placeholder="Voorraad" require><br>
        <input class="input" type="file" name="Foto1" id="Foto1" require><br>
        <input class="input" type="file" name="Foto2" id="Foto2" require><br>
        <input class="toevoegen-btn" type="submit" value="Toevoegen" name="submit">
      </form>
    </div>
  </div>
</body>