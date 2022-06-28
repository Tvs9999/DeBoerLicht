<?php
include("connection.php");
include("sidebar.php"); 
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
  <title>categoriebeheer</title>
</head>
<body>
  
<div class="container1">
    <div class="categoriebeheer-container">
    <table>
      <tr>
        <th hidden>status</th>
        <th>foto</th>
        <th>naam</th>
        <th></th>

        
        							

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

                 <td><img src='UploadImg/".($result['foto'])."' class = 'categorie1-foto'></td>
                  <td>" . $result['naam'] . "</td>
                 
                  
                  
                  
                  <td>
                  <input type='submit' value='aanmaken' id='goedkeuren-btn'>
                  <input type='submit' value='wijzigen' id='goedkeuren-btn'>
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


</table>

  
</body>
<script>
function checkdelete(){
  return confirm('Weet je zeker dat je deze categorie hebt aangemaakt?');
}
function checkdelete2(){
  return confirm('Weet je zeker dat je deze bestelling wil annuleren?');
}
</script>
</html>
