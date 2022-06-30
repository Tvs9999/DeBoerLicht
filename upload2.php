<?php

include "connection.php";

$id = $_POST['id'];
$naam = $_POST['naam'];
// $foto = $_POST['foto'];




if (isset($_POST['submit'])) {
    $foto = $_FILES['foto'];

    $fileName = $_FILES['foto']['name'];
    $fileTmpName = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileType = $_FILES['foto']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileDestination = 'UploadImg/' .$fileName;
                move_uploaded_file($fileName, $fileDestination);
               

                $insertsql = "INSERT INTO `categorie`(`id`, `naam`, `foto`) VALUES ('$id','$naam','$fileName')";
                $insert = $conn->query($insertsql);
                header("Location: categoriebeheer.php");
                echo "<script>alert('categorie is toegevoegd')</script>";
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