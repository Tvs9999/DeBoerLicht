<?php
include 'connection.php';
session_start();

$currentId = $_GET['id'];
$sql = "SELECT * FROM categorie WHERE id = $currentId";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);

if ($resultCheck > 0) {
  $categorie = mysqli_fetch_assoc($results);
}
?>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
<div class="toevoegen">

    <div class="toevoegen-content">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id"><br>
        <input class="input" type="text" name="naam" value="<?php echo $categorie['naam'] ?>"><br>
        <input class="input" type="file" name="foto" value="<?php echo $categorie['foto'] ?>"><br>
        

        <input class="toevoegen-btn" type="submit" value="Update" name="update-submit">
      </form>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST['update-submit'])) {
  $id = $_GET['id'];
  $naam = $_POST['naam'];
  $Foto1 = $_FILES['foto'];


  $updatedfileName = $_FILES['foto']['name'];
  $fileTmpName = $_FILES['foto']['tmp_name'];
  $fileDestination = 'UploadImg/' .$updatedfileName;


  $query = "UPDATE categorie SET naam='$naam',foto='$updatedfileName' WHERE id='$id'";

  if(mysqli_query($conn, $query)){    
    move_uploaded_file($fileTmpName, $fileDestination);
    echo "Gegevens opgeslaan.";
}else{
  echo "Er is een fout.";
}

  header("Location: categoriebeheer.php");
  echo "<script>alert('Gegvens opgeslagen')</script>";
}

mysqli_close($conn);
?>