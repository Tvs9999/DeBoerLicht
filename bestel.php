<?php
include "connection.php";

$Voornaam = $_POST['Voornaam'];
$Achternaam = $_POST['Achternaam'];
$Datum= date("Y-m-d h:i:sa");
$email = $_POST['email'];
$adres = $_POST['adres'];
$Woonplaats = $_POST['Woonplaats'];
$Postcode = $_POST['Postcode'];
$totaalprijs = $_POST['totaalprijs'];


if (isset($_POST['submit'])) {
  $sql = "INSERT INTO `bestellingen` (`id`, `Voornaam`, `Achternaam`, `Datum`, `email`, `adres`, `Woonplaats`, `Postcode`, `totaalprijs`) VALUES ('$id','$Voornaam','$Achternaam','$Datum','$email','$adres','$Woonplaats','$Postcode','$totaalprijs')";
  $result = $conn->query($sql);
  header("Location: Betaalpagina.php");
}