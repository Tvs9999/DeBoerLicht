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



if (isset($_POST['submit'])) {
    $Foto1 = $_FILES['Foto1'];
    $Foto2 = $_FILES['Foto2'];

    $fileName = $_FILES['Foto1']['name'];
    $fileTmpName = $_FILES['Foto1']['tmp_name'];
    $fileSize = $_FILES['Foto1']['size'];
    $fileError = $_FILES['Foto1']['error'];
    $fileType = $_FILES['Foto1']['type'];

    $fileName2 = $_FILES['Foto2']['name'];
    $fileTmpName2 = $_FILES['Foto2']['tmp_name'];
    $fileSize2 = $_FILES['Foto2']['size'];
    $fileError2 = $_FILES['Foto2']['error'];
    $fileType2 = $_FILES['Foto2']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileExt2 = explode('.', $fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed) && in_array($fileActualExt2, $allowed)) {
        if ($fileError === 0 && $fileError2 === 0) {
            if ($fileSize < 1000000 && $fileSize2 < 1000000) {
                $fileDestination = 'UploadImg/' .$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $fileDestination2 = 'UploadImg/'.$fileName2;
                move_uploaded_file($fileTmpName2, $fileDestination2);

                $insertsql = "INSERT INTO `producten`(`id`, `naam`, `prijs`, `korting`, `type`, `voltage`, `catId`, `voorraad`, `Foto1`, `Foto2`) VALUES ('$id','$naam','$prijs','$korting','$type','$voltage','$catId','$voorraad .','$fileName','$fileName')";
                $insert = $conn->query($insertsql);
                header('Refresh: 0.01; URL = product.php?categorie='.$_GET['categorie']);
                echo "<script>alert('Product heeft toegevoegd')</script>";
            } else {
                echo "Uw foto is te groot.";
            }
        } else {
            echo "Er is een fout met het uploaden van de foto.";
        }
    }
} else {
    echo "Er is een fout met het uploaden van de foto.";
}
?>