<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/f1bb87abfd.js" crossorigin="anonymous"></script>
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>

<body>
  <div class="sidebar">
    <?php if (isset($_SESSION['email']) || isset($_SESSION['wachtwoord'])) { ?>
      <div class="logo_content">
        <div class="logo">
          <img src="https://www.deboerlicht.nl/wp-content/uploads/2020/02/De-Boer-Licht-Logo-Wit-1024x771.png">
        </div>
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <ul class="nav_list">

        <li>
          <a href="index.php">
            <i class='bx bx-home'></i>
            <span class="links-name">Home</span>
          </a>
        </li>

        <li>
          <a href="besteloverzicht.php">
            <i class='bx bx-list-check'></i>
            <span class="links-name">Bestellingen</span>
          </a>
        </li>

        <li>
          <a href="categoriebeheer.php">
            <i class='bx bx-category'></i>
            <span class="links-name">Categorieën</span>
          </a>
        </li>

        <div class="logout">
          <li>
            <a href="logout.php">
              <i class='bx bx-log-out'></i>
              <span class="links-name">Uitloggen</span>
            </a>
          </li>
        </div>
      </ul>
    <?php } else { ?>
      <div class="logo_content">
        <div class="logo">
          <img src="https://www.deboerlicht.nl/wp-content/uploads/2020/02/De-Boer-Licht-Logo-Wit-1024x771.png">
        </div>
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <ul class="nav_list">

        <li>
          <a href="index.php">
            <i class='bx bx-home'></i>
            <span class="links-name">Home</span>
          </a>
        </li>

        <li>
          <a href="ShoppingCart.php">
            <i class='bx bx-cart'></i>
            <span class="links-name">Winkelmandje</span>
          </a>
        </li>
        
        <div class="login">
          <li>
            <a href="inlog.php">
              <i class="far fa-user"></i>
              <span class="links-name">Beheerder</span>
            </a>
          </li>
        </div>
      </ul>
    <?php } ?>
  </div>
  </div>
</body>

</html>

<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".sidebar");
  let login = document.querySelector(".login");
  let searchbtn = document.querySelector(".bx-search");

  btn.onclick = function() {
    sidebar.classList.toggle("active");
  }
</script>