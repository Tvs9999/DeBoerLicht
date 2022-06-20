<?php
session_start();
$product_ids = array();
include 'connection.php';  

$sql = "SELECT * FROM producten";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);

if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'naam' => filter_input(INPUT_POST, 'naam'),
                'prijs' => filter_input(INPUT_POST, 'prijs'),
                'quantity' => filter_input(INPUT_POST, 'quantity'),
                'Foto1' => filter_input(INPUT_POST, 'Foto1'),
                'type' => filter_input(INPUT_POST, 'type'),
                'voltage' => filter_input(INPUT_POST, 'voltage'),
                'categorie' => filter_input(INPUT_POST, 'categorie'),
                'voorraad' => filter_input(INPUT_POST, 'voorraad'),
            );
        }
        else {
            for($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    }

    else{
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'naam' => filter_input(INPUT_POST, 'naam'),
            'prijs' => filter_input(INPUT_POST, 'prijs'),
            'quantity' => filter_input(INPUT_POST, 'quantity'),
            'Foto1' => filter_input(INPUT_POST, 'Foto1'),
            'type' => filter_input(INPUT_POST, 'type'),
            'voltage' => filter_input(INPUT_POST, 'voltage'),
            'categorie' => filter_input(INPUT_POST, 'categorie'),
            'voorraad' => filter_input(INPUT_POST, 'voorraad'),
        );
    }
}

// pre_r($_SESSION);

// function pre_r($array){
//     echo '<pre>';
//     print_r($array);
//     echo '</pre>';
// }


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
</head>

<body class="">
    <div class="container">
        <div class="product-container">
            <?php 

            // wat is het id van de huidige cat. 
            // catId = 2.
            $catId = $_GET['categorie'];
            $sql = "SELECT * FROM producten where catId = $catId";
            $results = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($results);

            if($resultCheck > 0) 
            {
                while ($row = mysqli_fetch_array($results))
                { ?>
                <form method="post" action="Product.php?actioin=add&id=<?php echo $row['id']; ?>">
                    <div class="product">
                        <div class="product-links">
                            <?php
                                echo "<img src='UploadImg/".(htmlspecialchars($row['Foto1']))."' class = 'product-foto'>";
                            ?>
                        </div>
                        <div class="product-rechts">
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
                                <input class="voeg-toe-button" type="submit" name="add_to_cart" value="Voeg toe"></input>
                                <input type="hidden" name="prijs" value="<?php echo $row['prijs']; ?>">
                                <input type="hidden" name="naam" value="<?php echo $row['naam']; ?>">
                                <input type="hidden" name="Foto1" value="<?php echo $row['Foto1']; ?>">
                                <input type="hidden" name="type" value="<?php echo $row['type']; ?>">
                                <input type="hidden" name="voltage" value="<?php echo $row['voltage']; ?>">
                                <input type="hidden" name="categorie" value="<?php echo $row['categorie']; ?>">
                                <input type="hidden" name="voorraad" value="<?php echo $row['voorraad']; ?>">
                                <input type="text" name="quantity" class="aantal-input" value="1">                                
                            </div>
                        </div>
                    </div>
                </form>
                <?php } 
            } ?>            
        </div> 
        <div class="sidebar-left">
            <?php include 'Sidebar.php'?> 
        </div>
    </div>
</body>
</html>