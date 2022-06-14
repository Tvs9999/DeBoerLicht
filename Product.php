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
    <script src="https://kit.fontawesome.com/f1bb87abfd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="DeBoerLicht.css">


<body class="">
    <div class="container">
        <div class="product-container">
            <?php 
            $sql = "SELECT * FROM producten";
            $results = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($results);

            if($resultCheck > 0) 
            {
                while ($row = mysqli_fetch_array($results))
                { ?>
                    <div class="product">
                        <div class="product-links">
                            <?php
                                echo "<img src='UploadImg/".($row['Foto1'])."' class = 'product-foto'>";
                            ?>
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
                            <div class="voorraad">
                                <?php 
                                
                                    if($row["voorraad"] > 5)
                                    { ?>
                                        <p class="op-voorraad"><i class="fa fa-circle fa-xs"></i> Op voorraad</p>
                                    <?php }

                                    else if($row["voorraad"] > 0 && $row["voorraad"] < 5) 
                                    { ?>
                                        <p class="product-voorraad"><i class="fas fa-circle fa-xs"></i> Nog maar <?php echo $row['voorraad'] ?> op voorraad</p>
                                    <?php }

                                    else if($row["voorraad"] == 0)
                                    { ?>
                                        <p class="geen-voorraad"><i class="fas fa-times"></i> Niet meer op voorraad</p>
                                    <?php }
                                ?>
                            </div>
                            <h2 class="product-prijs"><?php echo "€ ".$row['prijs']; ?></h2>
                            <div class="voeg-toe">
                                <button class="voeg-toe-button">Voeg toe</button>
                                <input type="text" class="aantal-input">                                
                            </div>
                        </div>
                    </div>
                <?php } 
            } ?>            
        </div> 
        <div class="sidebar-left">
            <?php include 'header.php'?>
        </div>
    </div>
</body>
</html>