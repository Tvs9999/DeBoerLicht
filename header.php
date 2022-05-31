<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
  <div class="topnav">
    <?php if (isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) { ?>
      <ul>
        <li><a href="">Producten</a></li>
        <li><a href="">Bestellingen</a></li>
        <li><a href="">Orders</a></li>
        <li><a href="">loguit</a></li>
      </ul>
    <?php } else { ?>
      <ul>
        <li class="left"><a href="">Producten</a></li>
        <img src="https://www.deboerlicht.nl/wp-content/uploads/2020/02/De-Boer-Licht-Logo-Wit-1024x771.png">
        <li class="right"><a href="">Beheerder</a></li>
      </ul>
    <?php } ?>
  </div>
</body>

</html>