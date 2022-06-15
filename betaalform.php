<html>
  <head>
    <link rel="stylesheet" href="bestel.css">
  </head>
  <body>
    <div class="betaal-form">
      <form action="bestel.php" method="POST">
        <input type="text" name="Voornaam" class="bp" placeholder="Voornaam"><br>
        <input type="text" name="Achternaam" class="bp" placeholder="Achternaam"><br>
        <input type="text" name="email" class="bp" placeholder="Email adres"><br>
        <input type="text" name="adres" class="bp" placeholder="Adres"><br>
        <input type="text" name="Woonplaats" class="bp" placeholder="Plaats"><br>
        <input type="text" name="Postcode" class="bp" placeholder="postcode"><br>
        <input class="bestel-btn" type="submit" name="submit" value="Bestel" >
      </form>
    </div>
  </body>
</html>