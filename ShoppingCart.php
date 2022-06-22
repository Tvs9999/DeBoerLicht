<?php
session_start();
include 'connection.php';  

if(isset($_SESSION['shopping_cart'])){
    $total = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/f1bb87abfd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="DeBoerLicht.css">
        <title>ShoppingCart</title>
    </head>
    <body>
        <div class="container">
            <div class="cart-container">
                <div class="cart">
                    <div class="uw-winkelmandje">
                        <h1>Uw Winkelmandje <i class="bx bx-cart"></i></h1>
                    </div>
                    <div class="cart-product">
                        <?php 
                        if(!empty($_SESSION['shopping_cart'])){
                            
                                
                            
                            foreach($_SESSION['shopping_cart'] as $sessionId){
                                $id = $sessionId['id'];
                                $sql = "SELECT * FROM producten WHERE id = $id";
                                $results = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($results);
                                
                                if($resultCheck > 0){
                                    
                                    while($product = mysqli_fetch_array($results)){ 
                                        $catId = $product['catId'];
                                        $cat = "SELECT naam FROM categorie WHERE id = $catId";
                                        $getCatNaam = mysqli_query($conn, $cat);
                                        $categorie = mysqli_fetch_array($getCatNaam);
                                        ?>
                                        <div class="in-cart-product">
                                            <div class="in-cart-left">
                                                <?php echo "<img class='cart-foto' src='UploadImg/".(htmlspecialchars($product['Foto1']))."'>"; ?>
                                            </div>
                                            <div class="in-cart-right">
                                                <div class="right-main">
                                                    <div class="in-cart-naam">
                                                        <h2><?php echo $product['naam']; ?></h2>

                                                    </div>
                                                    <div class="right-info">
                                                        <div class="right-info-text">
                                                            <p>Type:</p>

                                                        </div>
                                                        <div class="right-info-text">
                                                            <p class="in-cart-type"><?php echo $product['type']; ?></p>
                                                            
                                                        </div>
                                                        <div class="right-info-text">
                                                            <p>Categorie:</p>
                                                            
                                                        </div>
                                                        <div class="right-info-text">
                                                            <p class="in-cart-categorie"><?php echo $categorie['naam']; ?></p>
                                                            
                                                        </div>
                                                        <div class="right-info-text">
                                                            <p>Voltage:</p>
                                                            
                                                        </div>
                                                        <div class="right-info-text">
                                                            <p class="in-cart-voltage"><?php echo $product['voltage']; ?> V</p>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="right-info-voorraad">
                                                        <?php 
                                                            if($product["voorraad"] > 5)
                                                            { ?>
                                                                <p class="op-voorraad"><i class="fa fa-circle fa-xs"></i> Op voorraad</p>
                                                            <?php }
                        
                                                            else if($product["voorraad"] > 0 && $product["voorraad"] < 5) 
                                                            { ?>
                                                                <p class="product-voorraad"><i class="fa fa-circle fa-xs"></i> Nog maar <?php echo $product['voorraad'] ?> op voorraad</p>
                                                            <?php }

                                                            else if($product["voorraad"] == 0)
                                                            { ?>
                                                                <p class="geen-voorraad"><i class="fa fa-times"></i> Niet meer op voorraad</p>
                                                            <?php }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="right-price">
                                                    <div class="price">
                                                        
                                                        <?php 
                                                            $prijsNaKorting = $product['prijs'] - ($product['prijs'] * ($product['korting'] / 100));
                                                            if($product['korting'] > 0){ ?>
                                                                <div class="cart-korting">
                                                                    <div class="cart-ribbon">
                                                                        <p>-<?php echo $product['korting']; ?>%</p>
                                                                    </div>
                                                                    <s class="discount"><h2><?php echo "€ ".number_format($product['prijs'], 2, ",", "."); ?></h2></s>
                                                                    <div class="filler"></div>
                                                                    <h2><?php echo "€ ".number_format($prijsNaKorting , 2, ",", "."); ?></h2>
                                                                </div>
                                                            <?php }

                                                            else{ ?>
                                                                <h2><?php echo "€ ".number_format($product['prijs'], 2, ",", "."); ?></h2>
                                                            <?php }
                                                        ?>
                                                    </div>
                                                    <div class="hoeveelheid">
                                                        <input type="text" name="quantity" class="cart-aantal" value="<?php echo $sessionId['quantity']?>">
                                                        <button class="delete-btn"><i class='bx bx-trash-alt' ></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                <?php }
                                }
                            }
                            

                        }
                        
                        else{ ?>
                            <div class="geen-items">
                                <p>Op het moment zit er niks in uw winkelmand</p>
                            </div>
                        <?php }
                    ?> 
                </div>
            </div>
            <div class="total">
                <div class="totaalprijs">
                    <h1>Totaalprijs</h1>
                </div>
                
            </div>
        </div>
        <div class="sidebar-left">
            <?php include 'Sidebar.php' ?>
        </div>
    </div>
</body>
</html>