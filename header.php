<?php 
session_start(); 
include '';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="topnav">
    <?php if(isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])  ){?>
     <ol>
       <li><a href="">Producten</a></li>
       <li><a href="">Bestellingen</a></li>
       <li><a href="">Orders</a></li>
       <li><a href="">loguit</a></li> 
      </ol>
    <?php } else { ?>
      <ol>
        <li><a href="">Producten</a></li>
        <img src="" alt="">
        <li><a href="">Beheerder</a></li> 
      </ol>
      <?php } ?>
  </div>
</body>
</html>