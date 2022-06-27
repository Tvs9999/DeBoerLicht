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
  
  <div class= "">
    <table>
      <tr>
        <th hidden>status</th>
        <th>foto</th>
        <th>naam</th>
        <th colspan="2" align="center" >Opties</th>
    
        							

      </tr>
      
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
