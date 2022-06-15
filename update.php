<?php

include 'connection.php';

$naam = $_GET['naam'];
$prijs = $_POST['prijs'];
$korting = $_POST['korting'];
$type = $_POST['type'];
$voltage = $_POST['voltage'];
$categorie = $_POST['categorie'];
$beschikbaarheid = $_POST['beschikbaarheid'];
$target_file = $fileDestination . basename($_FILES["file1"]["name"]);
$target_file2 = $fileDestination2 . basename($_FILES["file2"]["name"]);



$quary = "UPDATE `producten` SET `id`='[$id]',`naam`='[$naam]',`prijs`='[$prijs]',`korting`='[$korting]',`type`='[$type]',`voltage`='[$voltage]',`categorie`='[$categorie]',`beschikbaarheid`='[$beschikbaarheid]',`file1`='[$target_file]',`file2`='[$target_file2]' WHERE 1";

$data = mysqli_query($conn,$query);

if($data){
  echo "<script>alert('gegevens opgeslagen')</script>";

}else{
  echo "<script>alert('Het is niet gelukt om uw gegevens te wijzigen, Probeer later opnieuw')</script>";
}



?>