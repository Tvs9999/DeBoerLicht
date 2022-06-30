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
  <link rel="stylesheet" href="DeBoerLicht.php">
  <title>categoriebeheer</title>
</head>

<body>

  <div class="container">
    <div class="categoriebeheer-container">
      <div class="besteloz-tabel">
        <table>
          <tr>

            <th hidden>status</th>
            <th>foto</th>
            <th>naam</th>
            <th colspan="2" align="center">Opties</th>



          </tr>
          <?php
          error_reporting(0);
          $query = "SELECT * FROM categorie";
          $data = mysqli_query($conn, $query);
          $total = mysqli_num_rows($data);
          if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {

              echo "
              
                <tr>

                 <td><img src='UploadImg/" . ($result['foto']) . "' class = 'categorie1-foto'></td>
                  <td>" . $result['naam'] . "</td>                  
                  <td>
                  <a href='bewerken2.php?id=$result[id]&naam=$result[naam]&foto=$result[foto] class='delete-btn'><i class='fa-solid fa-pen-to-square'></i>Wijzigen</a>                                    </a>
                  <a href='verwijderen2.php?id=$result[id]' onclick='return checkdelete3()'>Verwijderen</a>

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
    <div class="sidebarleft">
      <?php include "Sidebar.php"; ?>
    </div>
    <div class="categorie_add add-btn">
      <a href="toevoegen2.php">
        <button>
          <i class="fas fa-plus"></i>
        </button>
      </a>
    </div>

</body>
<script>
  function checkdelete() {
    return confirm('Weet je zeker dat je deze categorie hebt aangemaakt?');
  }

  function checkdelete2() {
    return confirm('Weet je zeker dat je deze bestelling wil annuleren?');
  }

  function checkdelete3() {
    return confirm('Weet je zeker dat je deze product wil verwijderen?');
  }
</script>

</html>