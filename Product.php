<?php
session_start();
$product_ids = array();
include 'connection.php';


$sql = "SELECT * FROM producten";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);


if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action'] == 'add') {
        //Voeg toe
        if (filter_input(INPUT_POST, 'add_to_cart')) {
            if (isset($_SESSION['shopping_cart'])) {
                $count = count($_SESSION['shopping_cart']);

                $product_ids = array_column($_SESSION['shopping_cart'], 'id');

                if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
                    $_SESSION['shopping_cart'][$count] = array(
                        'quantity' => filter_input(INPUT_POST, 'quantity'),
                        'id' => filter_input(INPUT_GET, 'id'),
                    );
                } else {
                    for ($i = 0; $i < count($product_ids); $i++) {
                        if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                            $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                        }
                    }
                }
            } else {
                $_SESSION['shopping_cart'][0] = array(
                    'quantity' => filter_input(INPUT_POST, 'quantity'),
                    'id' => filter_input(INPUT_GET, 'id'),
                );
            }
        }
        //header redirect
        header("Location: Product.php?categorie=" . $_GET['categorie']);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f1bb87abfd.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b453093fd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="DeBoerLicht.css">
</head>

<body class="">
    <div class="container">
        <div class="product-container">
            <?php

            $leCatNaam = $_GET['categorie'];
            $getCatId = "SELECT * FROM categorie WHERE naam = '$leCatNaam'";
            $cat = mysqli_query($conn, $getCatId);
            $catRow = mysqli_fetch_array($cat);

            $catId = $catRow['id'];

            $sort_option = "";
            if (isset($_GET['sort_alphabet'])) {
                if ($_GET['sort_alphabet'] == "A-Z") {
                    $sql = "SELECT * FROM producten WHERE catId = $catId ORDER BY naam ASC";
                } 

                else if ($_GET['sort_alphabet'] == "Z-A") {
                    $sql = "SELECT * FROM producten WHERE catId = $catId ORDER BY naam DESC";
                }

                else if ($_GET['sort_alphabet'] == "HoogsteKorting") {
                    $sql = "SELECT * FROM producten WHERE catId = $catId ORDER BY korting DESC";
                }

                else{
                    $sql = "SELECT * FROM producten WHERE catId = $catId"; 
                }
            }
            else{
                $sql = "SELECT * FROM producten WHERE catId = $catId"; 
            }

            $results = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($results);


            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_array($results)) {
                    $query = "SELECT naam FROM categorie 
                    WHERE id = $catId";
                    $catNaam = mysqli_query($conn, $query);
                    $categorie = mysqli_fetch_array($catNaam);
                    ?>
                    <form method="post" action="Product.php?categorie=<?php echo $_GET['categorie'] ?>&action=add&id=<?php echo $row['id']; ?>">
                        <div class="product">
                            <div class="product-links">
                                <?php
                                echo "<img src='UploadImg/" . (htmlspecialchars($row['Foto1'])) . "' class = 'product-foto'>";
                                ?>
                            </div>
                            <div class="product-rechts">
                                <?php
                                if ($row['korting'] > 0) { ?>
                                    <div class="ribbon">
                                        <p>-<?php echo $row['korting']; ?>%</p>
                                    </div>

                                <?php }
                                ?>
                                <h2 class="product-naam"><?php echo $row['naam']; ?></h2>
                                <div class="product-info">
                                    <div class="info-links">
                                        <p class="info-type">Type:</p>
                                        <p class="info-voltage">Voltage:</p>
                                        <p class="info-categorie">categorie:</p>
                                    </div>
                                    <div class="info-rechts">
                                        <p class="type-inhoud"><?php echo $row['type'] ?></p>
                                        <p class="voltage-inhoud"><?php echo $row['voltage'] ?> V</p>
                                        <p class="categorie-inhoud"><?php echo $categorie['naam'] ?></p>
                                    </div>
                                </div>
                                <div class="voorraad">
                                    <?php

                                    if ($row["voorraad"] >= 5) { ?>
                                        <p class="op-voorraad"><i class="fa fa-circle fa-xs"></i> Op voorraad</p>
                                    <?php } else if ($row["voorraad"] > 0 && $row["voorraad"] < 5) { ?>
                                        <p class="product-voorraad"><i class="fa fa-circle fa-xs"></i> Nog maar <?php echo $row['voorraad'] ?> op voorraad</p>
                                    <?php } else if ($row["voorraad"] == 0) { ?>
                                        <p class="geen-voorraad"><i class="fa fa-times"></i> Niet meer op voorraad</p>
                                    <?php }
                                    ?>
                                </div>
                                <?php
                                $prijsNaKorting = $row['prijs'] - ($row['prijs'] * ($row['korting'] / 100));
                                if ($row['korting'] > 0) { ?>
                                    <div class="korting-prijs">
                                        <s class="discount">
                                            <h2><?php echo "€ " . number_format($row['prijs'], 2, ",", "."); ?></h2>
                                        </s>
                                        <h2 class="product-prijs"><?php echo "€ " . number_format($prijsNaKorting, 2, ",", "."); ?></h2>
                                    </div> 
                                <?php } else { ?>
                                    <h2 class="product-prijs"><?php echo "€ " . number_format($row['prijs'], 2, ",", "."); ?></h2>
                                <?php } ?>

                                <div class="voeg-toe">
                                <?php if (isset($_SESSION['email']) || isset($_SESSION['wachtwoord'])) { ?> 
                                        <a href='bewerken.php?id=<?php echo $row['id']?>&categorie=<?php echo $_GET['categorie']?>' class='voeg-toe-button'>Wijzig</a>
                                        <a href='verwijderen.php?id=<?php echo $row['id']?>&categorie=<?php $_GET['categorie']?>' class='delete-btn' onclick='return checkdelete()'><i class='bx bx-trash-alt'></i></a>
                                    </form>
                                <?php }
                                else{ ?>
                                    <input class='voeg-toe-button' type='submit' name='add_to_cart' value='Voeg toe'></input>
                                    <input type='text' name='quantity' class='aantal-input' value='1'>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>

        
                <div class="sorteren">
                    <div class="dropup">
                        <div class="dropup-content">
                                <a class="top sort-optie" href="Product.php?categorie=<?php echo $_GET['categorie'] ?>&sort_alphabet=A-Z">A-Z</a>
                                <a class="sort-optie" href="Product.php?categorie=<?php echo $_GET['categorie'] ?>&sort_alphabet=Z-A">Z-A</a>
                                <a class="bottom sort-optie" href="Product.php?categorie=<?php echo $_GET['categorie'] ?>&sort_alphabet=HoogsteKorting">Hoogste korting</a>
                        </div>
                        <div class="dropup_btn">
                            <button class="dropbtn">
                                <i class="fas fa-sort"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="add-btn">
                    <a href="toevoegen.php?categorie=<?php echo $_GET['categorie'] ?>">
                        <button>
                            <i class="fas fa-plus"></i>
                        </button>
                    </a>
                </div>
                <?php 
            } 
            
            else { ?>
                <div class=" geen-producten">
                    <h1>er zijn geen producten gevonden in deze categorie</h1>
                </div>
            <?php } ?>
        </div>
        <div class="sidebar-left">
            <?php include 'Sidebar.php' ?>
        </div>
    </div>
</body>

</html>

<script>
      function checkdelete() {
    return confirm('Weet je zeker dat je deze product wil verwijderen?');
  }
</script>