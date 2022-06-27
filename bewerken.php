<?php
include 'connection.php';
?>

<link rel="stylesheet" href="DeBoerLicht.css">

<div id="Bewerken" class="bewerken">

  <!-- Modal content -->
  <div class="bewerken-content">
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM producten WHERE id='$id'";
      $res = $conn->query($sql);
      if ($res) {
        foreach ($res as $result) { ?>

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
                <tr>
                  <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Gegevens opslaan"></a></td>
                </tr>
            </form>
            </table>
          </body>
    <?php
        }
      }
    }
    ?>
  </div>

</div>