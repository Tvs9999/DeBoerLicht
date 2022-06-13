<?php
include 'connection.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="DeBoerLicht.css">


<body class="">
    <div class="container">
        <div class="product-container">
            <?php 
            $sql = "SELECT * FROM producten";
            $results = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($results);

            if($resultCheck > 0) { ?>
                <?php while ($row = mysqli_fetch_array($results)){ ?>
                    <div class="product">
                        <div class="product-links">
                            <img src="UploadImg/no-image.png" alt="" class="product-foto">
                        </div>
                        <div class="product-rechts">
                            <h2 class="product-naam"><?php echo $row['naam']; ?></h2>
                            <div class="product-info">
                                <div class="info-links">
                                    <p class="info-type">Type:</p>
                                    <p class="info-voltage">Voltage:</p>
                                    <p class="info-categorie">Categorie:</p>                                
                                </div>
                                <div class="info-rechts">
                                    <p class="type-inhoud"><?php echo $row['type'] ?></p>
                                    <p class="voltage-inhoud"><?php echo $row['voltage'] ?> V</p>
                                    <p class="categorie-inhoud"><?php echo $row['categorie'] ?></p>
                                </div>
                            </div>
                            <p class="product-voorraad">Voorraad: <?php echo $row['voorraad'] ?></p>
                            <h2 class="product-prijs"><?php echo "€ ".$row['prijs']; ?></h2>
                            <div class="voeg-toe">
                                <button class="voeg-toe-button">Voeg toe</button>
                                <input type="text" class="aantal-input">                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>            
        </div> 
        <div class="sidebar-left">
            <?php include 'header.php'?>
        </div>
    </div>
</body>
</html>