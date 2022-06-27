<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
  <title>categories</title>
</head>
<body>
    <div class="container">
        <div class="categorie-container">
            <?php
                error_reporting(0);
                $query= "SELECT * FROM categorie";
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($total!=0){
                    while($result=mysqli_fetch_assoc($data)){ ?>
                                    <a href="product.php?categorie=<?php echo $result['naam'];?>">
                                        <div class="categorie">
                                            <div class="categorie-links">
                                                    <h2 class="categorie-naam"><?php echo $result['naam']; ?></h2>   
                                                
                                                
                                                    <?php
                                                        echo "<img src='UploadImg/".($result['foto'])."' class = 'categorie-foto'>";
                                                        ?>                            
                                                
                                                
                                            </div>
                    
                                           <?php $catId = $result['id'] ?>
                                            
                
                                            <div class="categorie-rechts">
                                               <?php  $sql= "SELECT * FROM producten WHERE catId=$catId order by korting DESC LIMIT 4";
                                            
                                               $Kevin = mysqli_query($conn,$sql);
                                               $totaleDing = mysqli_num_rows($Kevin);	

                                               if($totaleDing!=0){
                                                while($productName=mysqli_fetch_assoc($Kevin)) { ?>
                                                <div class="korting-product">
                                                <h2 class="categorie-naam"><?php echo $productName['korting']; ?></h2>
                                                <?php
                                                        echo "<img src='UploadImg/".($productName['Foto1'])."' class = 'catpro-foto'>";
                                                        ?> 

                                                </div>
                                                    
                                                
                                                <?php }
                                               }
                                                ?>





                                               
                                            </div>
                                        </div>
                                    </a>


                            
                                     

                        <?php }
                    } ?>  


                    
        </div>
        <div class="sidebar-left">
            <?php include 'sidebar.php' ?>
        </div>
    </div>
</body>
</html>
            