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
      <form action="" method="POST" enctype="multipart/form-data">
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

        <input class="toevoegen-btn" type="submit" value="Update" name="update-submit">
      </form>
    </div>
  </div>
</body>

</html>

<?php }
if (isset($_POST['update-submit'])) {
  $id = $_GET['id'];
  $naam = $_POST['naam'];
  $prijs = $_POST['prijs'];
  $korting = $_POST['korting'];
  $type = $_POST['type'];
  $voltage = $_POST['voltage'];
  $catId = $_POST['catId'];
  $voorraad = $_POST['voorraad'];
  $Foto1 = $_FILES['Foto1'];
  $Foto2 = $_FILES['Foto2'];

  $updatedfileName = $_FILES['Foto1']['name'];
  $updatedfileName2 = $_FILES['Foto2']['name'];
  $fileTmpName = $_FILES['Foto1']['tmp_name'];
  $fileTmpName2 = $_FILES['Foto2']['tmp_name'];
  $fileDestination = 'UploadImg/' .$updatedfileName;
  $fileDestination2 = 'UploadImg/'.$updatedfileName2;


  $query = "UPDATE producten SET naam='$naam',prijs='$prijs',korting='$korting',type='$type',voltage='$voltage',catId='$catId',voorraad='$voorraad',Foto1='$updatedfileName',Foto2='$updatedfileName2' WHERE id='$id'";

  if(mysqli_query($conn, $query)){    
    move_uploaded_file($fileTmpName, $fileDestination);
    move_uploaded_file($fileTmpName2, $fileDestination2);
    echo "Gegevens opgeslaan.";
}else{
  echo "Er is een fout.";
}

  header("Location: product.php?categorie=lamp");
  echo "<script>alert('Gegvens opgeslagen')</script>";
}

mysqli_close($conn);
?>