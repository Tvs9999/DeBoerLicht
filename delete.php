<?php
include("connection.php");
error_reporting(0);


$Voornaam = $_GET['Voornaam'];
$Achternaam =  $_GET['Achternaam'];
$Datum =  $_GET['Datum'];
$email =  $_GET['email'];
$adres = $_GET['adres'];
$totaalprijs = $_GET['totaalprijs'];


$receiver = array($email, 'yasser2004.yy@gmail.com');
$subject = "Uw bestelling heef geannuleerd";
$body = "Beste $Voornaam $Achternaam , \r\nUw bestelling op $Datum voor $totaalprijs heeft geannuleerd
Dat kan gebeuren door verkeerde informaties of een technische probleem. \r\n
U kunt met ons contact opnemen om te weten wat is gebeurd.

Met vriendelijke groet,
DeBoerLicht";

if (mail(implode(',', $receiver), $subject, $body)) {
?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=">
<?php
}

$query1 = "DELETE FROM bestellingen WHERE Voornaam='$Voornaam'";

$data1 = mysqli_query($conn, $query1);

if ($data1) {
  echo "<script>alert('Bestelling heeft geannuleerd')</script>";
?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/DeBoerLicht/besteloverzicht.php">
<?php
} else {
  echo "<script>alert('Sorry, bestelling annuleren is op het moment niet gelukt, Probeer het op een ander tijdstip weer')</script>";
}
?>