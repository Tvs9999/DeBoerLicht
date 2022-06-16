<?php
include("connection.php");
include("header.php"); 
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
  
  <div class="apparatuuroverzicht-tabel">
    <table>
      <tr>
        <th hidden>status</th>
        <th>Voornaam</th>
        <th>Achternaam	</th>
        <th>Datum</th>
        <th>email</th>
        <th>adres</th>
        <th>Woonplaats</th>
        <th>Postcode</th>
        <th>totaalprijs	</th>
        <th colspan="2" align="center" >Opties</th>
    
        							

      </tr>
      <?php
       error_reporting(0);
       $query= "SELECT * FROM bestellingen";
       $data = mysqli_query($conn,$query);
       $total = mysqli_num_rows($data);
       if($total!=0){
         while($result=mysqli_fetch_assoc($data)){
           
              echo "
            
              <tr>
                <td hidden>".$result['status']."</td>
                <td>".$result['Voornaam']."</td>
                <td>".$result['Achternaam']."</td>
                <td>".$result['Datum']."</td>
                <td>".$result['email']."</td>
                <td>".$result['adres']."</td>
                <td>".$result['Woonplaats']."</td>
                <td>".$result['Postcode']."</td>
                <td>".$result['totaalprijs']."</td>
                
                
                <td>
                <a href='mail.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete()'><input type='submit' value='Goedkeuren' id='deletebtn'></a>
                <a href='delete.php?Voornaam=$result[Voornaam]&Achternaam=$result[Achternaam]&Datum=$result[Datum]&email=$result[email]&adres=$result[adres]&totaalprijs=$result[totaalprijs]' onclick='return checkdelete2()'><input type='submit' value='Annuleren' id='annuleren-btn'></a>
                </td>                     
              </tr>
              ";
          }
        }else{
            echo "
            <tr>
            <td>geen bestellingen</td>
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
  return confirm('Weet je zeker dat je deze bestelling hebt verzonden?');
}
function checkdelete2(){
  return confirm('Weet je zeker dat je deze bestelling wil annuleren?');
}
</script>
</html>
