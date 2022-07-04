<?php
include "connection.php";
session_start();

$Voornaam = $_POST['Voornaam'];
$Achternaam = $_POST['Achternaam'];
$Datum= date("Y-m-d h:i:sa");
$email = $_POST['email'];
$adres = $_POST['adres'];
$Woonplaats = $_POST['Woonplaats'];
$Postcode = $_POST['Postcode'];

if (isset($_POST['submit'])) {
  $bestelling = "INSERT INTO bestellingen (Voornaam, Achternaam, Datum, email, adres, Woonplaats, Postcode) VALUES ('$Voornaam','$Achternaam','$Datum','$email','$adres','$Woonplaats','$Postcode')";
  mysqli_query($conn, $bestelling);

  $bestellingId = mysqli_insert_id($conn);
  if($_SESSION['shopping_cart']){
    foreach($_SESSION['shopping_cart'] as $product){
      
      // per product id
      // insert op de koppel tabel met hierin:
      // - het prod.id 
      // - bestelling id
      // - aantal bestelde produten
      $sql = "INSERT INTO bestellingproducten (bestelId, prodId, quantity) VALUES (".$bestellingId.", ".$product['id'].", ".$product['quantity'].")"; 
      mysqli_query($conn, $sql);
    }
  }
  session_unset();
  session_destroy();
  header("Location: index.php");
}