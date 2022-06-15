<?php

include "connection.php";

$id = $_POST['id'];
$naam = $_POST['productnaam'];
$prijs = $_POST['price'];
$korting = $_POST['korting'];
$type = $_POST['type'];
$voltage = $_POST['voltage'];
$catId = $_POST['catId'];
$beschikbaarheid = $_POST['beschikbaarheid'];
$target_file = $fileDestination . basename($_FILES["file1"]["name"]);
$target_file2 = $fileDestination2 . basename($_FILES["file2"]["name"]);



if (isset($_POST['submit'])) {    

    $fileName = $_FILES['file1']['name'];
    $fileTmpName = $_FILES['file1']['tmp_name'];
    $fileSize = $_FILES['file1']['size'];
    $fileError = $_FILES['file1']['error'];
    $fileType = $_FILES['file1']['type'];

    $fileName2 = $_FILES['file2']['name'];
    $fileTmpName2 = $_FILES['file2']['tmp_name'];
    $fileSize2 = $_FILES['file2']['size'];
    $fileError2 = $_FILES['file2']['error'];
    $fileType2 = $_FILES['file2']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileExt2 = explode('.', $fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array( $fileActualExt, $allowed) && in_array( $fileActualExt2, $allowed)) {
        if ($fileError === 0 && $fileError2 === 0){
            if ($fileSize < 1000000 && $fileSize2 < 1000000){
                $fileNameNew = uniqid().$file1.".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $fileNameNew2 = uniqid().$file2.".".$fileActualExt2;
                $fileDestination2 = 'upload/'.$fileNameNew2;
                move_uploaded_file($fileTmpName2, $fileDestination2);

                $insertsql = "INSERT INTO `producten`(`id`, `naam`, `prijs`, `korting`, `type`, `voltage`, `catId`, `beschikbaarheid`, `file1`, `file2`) VALUES ('$id','$naam','$prijs','$korting','$type','$voltage','$catId','$beschikbaarheid .','$target_file','$target_file2')";
                $insert = $conn->query($insertsql);
                header("Location: toevoegenvb.php");
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