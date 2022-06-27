<?php
include("connection.php");
session_start();
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

  <div class="besteloz-container">
    <div class="overzicht-container">
      <div class="besteloz-tabel">
        <table>
          <tr>
            <th>Voornaam</th>
            <th>Achternaam </th>
            <th>Datum</th>
            <th>Email</th>
            <th>Adres</th>
            <th>Woonplaats</th>
            <th>Postcode</th>
            <th>Totaalprijs </th>
            <th colspan="2" align="center">Opties</th>



          </tr>
          <?php
          error_reporting(0);
          $query = "SELECT * FROM bestellingen WHERE Datum < time'16:00:00'";
          $data = mysqli_query($conn, $query);
          $total = mysqli_num_rows($data);
          if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {

              echo "
              
                <tr>
                  <td hidden>" . $result['status'] . "</td>
                  <td>" . $result['Voornaam'] . "</td>
                  <td>" . $result['Achternaam'] . "</td>
                  <td>" . $result['Datum'] . "</td>
                  <td>" . $result['email'] . "</td>
                  <td>" . $result['adres'] . "</td>
                  <td>" . $result['Woonplaats'] . "</td>
                  <td>" . $result['Postcode'] . "</td>
                  <td>" . $result['totaalprijs'] . "</td>
                  
                  
                  <td>
                  <a href='mail.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete()'><input type='submit' value='Goedkeuren' id='goedkeuren-btn'></a>
                  <a href='delete.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete2()'><input type='submit' value='Annuleren' id='annuleren-btn'></a>
                  </td>                     
                </tr>
                ";
            }
          } else {
            echo "
              <tr>
              <td colspan='9' align='center' style='font-size: 20px;'>Geen Bestellingen</td>
              </tr>
              ";
          }
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