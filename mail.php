<?php

$Voornaam= $_GET['Voornaam'];
$Achternaam=  $_GET['Achternaam'];
$Datum=  $_GET['Datum'];
$email =  $_GET['email'];
$adres = $_GET['adres'];
//$woonplaats= $_GET['woonplaats'];
//$Postcode =  $_GET['Postcode'];
$totaalprijs = $_GET['totaalprijs'];


$receiver = array($email, 'kevinka1239@gmail.com');
$subject="Uw bestelling is onderweg";
$body = "Beste $Voornaam $Achternaam , \r\nUw bestelling op $Datum voor $totaalprijs is onderweg
U krijgt het binnen 1 dag.
Veel plezier!

Met vriendelijke groet,
DeBoerLicht";

if(mail(implode(',',$receiver), $subject, $body)){
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=">
  <?php
}


include("connection.php");
error_reporting(0);

$query1 = "DELETE FROM bestelling WHERE naam='$naam' && aantal='$aantal' && telef='$telef' && email='$email'";

$data1=mysqli_query($conn, $query1);

if($data1){
    echo "<script>alert('Bestelling is verzonden')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=">
    <?php
}else{
    echo "<script>alert('Sorry, bestelling versturen is op het moment niet gelukt, Probeer het op een ander tijdstip weer')</script>";
}
?>


