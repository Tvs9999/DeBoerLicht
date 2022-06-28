<?php
include "Sidebar.php";
?>

<html>

<head>
  <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body>
  <div class="betaal-container">
    <div class="betaal-form">
      <form action="bestel.php" method="POST">
        <input type="text" name="Voornaam" class="bf" placeholder="Voornaam"><br>
        <input type="text" name="Achternaam" class="bf" placeholder="Achternaam"><br>
        <input type="text" name="email" class="bf" placeholder="Email adres"><br>
        <input type="text" name="adres" class="bf" placeholder="Adres"><br>
        <input type="text" name="Woonplaats" class="bf" placeholder="Plaats"><br>
        <input type="text" name="Postcode" class="bf" placeholder="postcode"><br>
        <button class="bestel-btn" type="submit" name="submit">Betaal</button>
      </form>
    </div>
  </div>

</body>

</html>