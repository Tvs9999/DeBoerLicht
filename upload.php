<?php

include "connection.php";

$id = $_POST['id'];
$naam = $_POST['productnaam'];
$prijs = $_POST['price'];
$korting = $_POST['korting'];
$type = $_POST['type'];
$voltage = $_POST['voltage'];
$catId = $_POST['catId'];
$voorraad = $_POST['voorraad'];
$target_dir = "UploadImg/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is een foto - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo  "File is geen foto.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Bestand bestaat al.";
    $uploadOk = 0;
}

if ($_FILES["file"]["size"] > 50000000) {
    echo "Bestand is te groot";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Uploaden is mislukt.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Het bestand " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    }

    $insertsql = "INSERT INTO `producten`(`id`, `naam`, `prijs`, `korting`, `type`, `voltage`, `catId`, `voorraad`, `Foto1`) VALUES ('$id','$naam','$prijs','$korting','$type','$voltage','$catId','$voorraad .','$target_file')";
    $insert = $conn->query($insertsql);
    header("Location: index.php");
    echo "<script>alert('Product heeft toegevoegd')</script>";
}
