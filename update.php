<?php
include 'connection.php';

?>

<body>
<form action="" method="GET">
<table border="0" bgcolor="black" align="center" cellspacing="20">
<tr>
<td>Productnaam</td>
<td><input type="text" value="<?php echo "$naam" ?>" name='naam' required></td>
</tr>
<tr>
<td>Prijs</td>
<td><input type="text" value="<?php echo "$price" ?>" name='prijs' required></td>
</tr>
<tr>
<td>Korting</td>
<td><input type="text" value="<?php echo "$korting" ?>" name='korting' required></td>
</tr>
<tr>
<td>Type</td>
<td><input type="text" value="<?php echo "$type" ?>" name='type' required></td>
</tr>
<tr>
<td>Voltage</td>
<td><input type="text" value="<?php echo "$voltage" ?>" name='voltage' required></td>
</tr>
<tr>
<td>Categorie</td>
<td><input type="text" value="<?php echo "$catId" ?>" name='catId' required></td>
</tr>
<tr>
<td>Voorraad</td>
<td><input type="text" value="<?php echo "$voorraad" ?>" name='voorraad' required></td>
<td>Foto</td>
<td><input type="text" value="<?php echo "$Foto1" ?>" name='Foto1' required></td>

</tr>
<tr><td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Gegevens opslaan"></a></td>
</tr>
</form>
</table>
</body>

<?php
if($_GET['submit']){

$naam = $_POST['naam'];
$price = $_POST['price'];
$korting = $_POST['korting'];
$type = $_POST['type'];
$voltage = $_POST['voltage'];
$catId = $_POST['catId'];
$voorraad = $_POST['voorraad'];
$target_file = $fileDestination . basename($_FILES["file"]["name"]);


$quary = "UPDATE `producten` SET `id`='[$id]',`naam`='[$naam]',`prijs`='[$prijs]',`korting`='[$korting]',`type`='[$type]',`voltage`='[$voltage]',`categorie`='[$categorie]',`voorraad`='[$voorraad]',`file`='[$target_file]' WHERE 1";

$data = mysqli_query($conn,$query);

if($data){
  echo "<script>alert('gegevens opgeslagen')</script>";

}else{
  echo "<script>alert('Het is niet gelukt om uw gegevens te wijzigen, Probeer later opnieuw')</script>";
}
}


?>