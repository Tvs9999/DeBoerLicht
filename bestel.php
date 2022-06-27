<?php
include "connection.php";

$Voornaam = $_POST['Voornaam'];
$Achternaam = $_POST['Achternaam'];
$Datum= date("Y-m-d h:i:sa");
$email = $_POST['email'];
$adres = $_POST['adres'];
$Woonplaats = $_POST['Woonplaats'];
$Postcode = $_POST['Postcode'];


if (isset($_POST['submit'])) {
  $sql = "INSERT INTO `bestellingen` (`Voornaam`, `Achternaam`, `Datum`, `email`, `adres`, `Woonplaats`, `Postcode`) VALUES ('$Voornaam','$Achternaam','$Datum','$email','$adres','$Woonplaats','$Postcode')";
  $result = $conn->query($sql);
  header("Location: Betaalpagina.php");
}