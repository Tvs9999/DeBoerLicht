<?php
include("connection.php");
session_start();

$totaal = 0;
$totaleKortingPrijs = 0;
$totaalZonderKorting = 0;
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
  <title>besteloverzicht</title>
</head>

<body>
  <div class="container">
    <div class="besteloz-container">
      <div class="besteloz-tabel">
        <table>
          <tr>
            <th>Naam</th>
            <th>Datum</th>
            <th>Email</th>
            <th>Adres</th>
            <th>Producten</th>
            <th>Totaalprijs </th>
            <th colspan="2" align = "center">Opties</th>
          </tr>
          <?php
          $query = "SELECT * FROM bestellingen WHERE Datum < time'16:00:00'";
          $data = mysqli_query($conn, $query);
          $total = mysqli_num_rows($data);
          
          if ($total > 0) {
            while ($result = mysqli_fetch_assoc($data)) {
              $thisId = $result['id'];
              ?>
              <tr>
                <td hidden><?php $result['status'] ?></td>
                <td><?php echo $result['Voornaam'] ?> <?php echo $result['Achternaam'] ?></td>
                <td> <?php echo $result['Datum'] ?> </td>
                <td> <?php echo $result['email'] ?> </td>
                <td> <?php echo $result['adres'] ?><br><?php echo $result['Postcode']?>, <?php echo $result['Woonplaats'] ?></td>
                <td> 
                  <?php 
                    $sql = "SELECT * FROM bestellingproducten INNER JOIN producten ON bestellingproducten.prodId=producten.id WHERE bestelId = $thisId";
                    $executeSql = mysqli_query($conn, $sql);
                    $sqlRows = mysqli_num_rows($executeSql);

                    if($sqlRows > 0){
                      while ($product = mysqli_fetch_assoc($executeSql)){ ?>
                        <div class="bestel_product">
                          <p><?php echo $product['naam']?></p>
                          <p><?php echo $product['quantity']?>x</p>
                        </div>
                      <?php }
                    }
                  ?>
                </td>
                <td> 
                
                <?php
                $sql = "SELECT * FROM bestellingproducten INNER JOIN producten ON bestellingproducten.prodId=producten.id WHERE bestelId = $thisId";
                $executeSql = mysqli_query($conn, $sql);
                $sqlRows = mysqli_num_rows($executeSql);

                  if($sqlRows > 0){
                    while ($product = mysqli_fetch_assoc($executeSql)){ 
                      if($product['korting'] > 0){
                        $prijsNaKorting = $product['prijs'] - ($product['prijs'] * ($product['korting'] / 100));
                        $totaleKortingPrijs = $totaleKortingPrijs + ($prijsNaKorting * $product['quantity']);                
                      }
                      else{
                        $totaalZonderKorting = $totaalZonderKorting + ($product['prijs'] * $product['quantity']);
                      }
                      $totaal = $totaalZonderKorting + $totaleKortingPrijs; 
                    }
                  } 
                ?>
                <p>€ <?php echo number_format($totaal, 2, ",", ".") ?></p>
                </td>  
                <td>
                  <a href='mail.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete()'><input type='submit' value='Goedkeuren' id='goedkeuren-btn'></a>
                  <a href='delete.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete2()'><input type='submit' value='Annuleren' id='annuleren-btn'></a>
                </td>                     
              </tr><?php      
            }
          } 
          else { ?>
              <tr>
              <td colspan='9' align='center' style='font-size: 20px;'>Geen Bestellingen</td>
              </tr>
              
          <?php }
          ?>
        </table>
      </div>
    </div>
    <div class="sidebar-left">
      <?php include("Sidebar.php"); ?>
    </div>
  </div>


</body>
<script>
  function checkdelete() {
    return confirm('Weet je zeker dat je deze bestelling hebt verzonden?');
  }

  function checkdelete2() {
    return confirm('Weet je zeker dat je deze bestelling wil annuleren?');
  }
</script>

</html>