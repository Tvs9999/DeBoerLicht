<?php
include 'connection.php';
?>
<html>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
  <div class="toevoegen">

    <div class="toevoegen-content">
      <form action="" method="POST">
        <input type="hidden" name="id"><br>
        <input class="input" type="text" name="productnaam" value="<?php echo $_GET["naam"] ?>"><br>
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

<?php
if(isset($_POST['submit'])) {
  $id = $_POST['id'];
$naam = $_POST['productnaam'];
$prijs = $_POST['prijs'];
$korting = $_POST['korting'];
$type = $_POST['type'];
$voltage = $_POST['voltage'];
$catId = $_POST['catId'];
$voorraad = $_POST['voorraad'];
// $target_dir = "UploadImg/";
// $target_file = $target_dir . basename($_FILES["Foto1"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// if (isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["Foto1"]["tmp_name"]);
//     if ($check !== false) {
//         echo "File is een foto - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo  "File is geen foto.";
//         $uploadOk = 0;
//     }
// }

// if (file_exists($target_file)) {
//     echo "Bestand bestaat al.";
//     $uploadOk = 0;
// }

// if ($_FILES["file"]["size"] > 50000000) {
//     echo "Bestand is te groot";
//     $uploadOk = 0;
// }

// if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//     echo "Alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
//     $uploadOk = 0;
// }

// if ($uploadOk == 0) {
//     echo "Uploaden is mislukt.";
// } else {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//         echo "Het bestand " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
//     }

    $updatesql = "UPDATE `producten` SET `id`='[value-1]',`naam`='[value-2]',`prijs`='[value-3]',`korting`='[value-4]',`type`='[value-5]',`voltage`='[value-6]',`catId`='[value-7]',`voorraad`='[value-8]',`Foto1`='[value-9]',`Foto2`='[value-10]' WHERE 1";
    // header("Location: index.php");
    echo "<script>alert('Gegvens opgeslagen')</script>";
// }

}
?>