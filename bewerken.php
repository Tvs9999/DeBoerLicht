<?php
include 'connection.php';
$sql = "SELECT * FROM producten WHERE 1";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);

if ($resultCheck > 0) {
?>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
  <div class="toevoegen">

    <div class="toevoegen-content">
      <form action="" method="POST">
        <input type="hidden" name="id"><br>
        <input class="input" type="text" name="naam" value="<?php echo $_GET["naam"] ?>"><br>
        <input class="input" type="text" name="prijs" value="<?php echo $_GET["prijs"] ?>"><br>
        <input class="input" type="text" name="korting" value="<?php echo $_GET["korting"] ?>"><br>
        <input class="input" type="text" name="type" value="<?php echo $_GET["type"] ?>"><br>
        <input class="input" type="text" name="voltage" value="<?php echo $_GET["voltage"] ?>"><br>
        <input class="input" type="text" name="catId" value="<?php echo $_GET["catId"] ?>"><br>
        <input class="input" type="text" name="voorraad" value="<?php echo $_GET["voorraad"] ?>"><br>
        <input class="input" type="file" name="Foto1" value="<?php echo $_GET["Foto1"] ?>"><br>
        <input class="input" type="file" name="Foto2" value="<?php echo $_GET["Foto2"] ?>"><br>

        <input class="toevoegen-btn" type="submit" value="Update" name="submit">
      </form>
    </div>
  </div>
</body>

</html>

<?php }
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $naam = $_POST['naam'];
  $prijs = $_POST['prijs'];
  $korting = $_POST['korting'];
  $type = $_POST['type'];
  $voltage = $_POST['voltage'];
  $catId = $_POST['catId'];
  $voorraad = $_POST['voorraad'];

  $query = "UPDATE producten SET naam='$naam',prijs='$prijs',korting='$korting',type='$type',voltage='$voltage',catId='$catId',voorraad='$voorraad' WHERE id='$id'";

  if(mysqli_query($conn, $query)){
    echo "Gegevens opgeslaan.";
}else{
  echo "Er is een fout.";
}

  header("Location: product.php?categorie=lamp");
  echo "<script>alert('Gegvens opgeslagen')</script>";
}

mysqli_close($conn);
?>