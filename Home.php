<?php
 include 'header.php'; 
 include 'connection.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producten</title>
</head>
<body>

<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
                <?php
                $result = mysqli_query($conn,"SELECT * FROM `producten`");
                
                while($row = mysqli_fetch_assoc($result)){
		            echo "<div class='col-lg-4 col-md-6 text-center'>
                            <div class='single-product-item'>
								<form method='post' action=''>
						        <div class='product-image'>
							        <img src='" . $row['Foto1'] . "' alt=''></a>
						        </div>
						        <h3>" . $row['naam'] . "</h3>
                    <p class='product-price'><span>Prijs: </span>€" . $row['prijs'] . "</p>
                    <p class='vol'><span>Voltage: </span>" . $row['voltage'] . " volt</p>
                    <p class='vol'><span>Type: </span>" . $row['type'] . "</p>
                    <p class='vol'><span>Categorie: </span>" . $row['categorie'] . "</p>";			

								echo" <button type='submit' class='cart-btn'><i class='fas fa-shopping-cart'></i>  Bestel</button> </form>									
				        </div>";
                }
                mysqli_close($conn);
				?>
            </div>
		</div>
	</div>


</body>
</html>