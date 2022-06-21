<?php
include("connection.php");
//include("header.php"); 
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
                                            <div class="categorie-top">
                                                <h2 class="categorie-naam"><?php echo $result['naam']; ?></h2>   
                                            </div>
                                            <div class="categorie-bottom">
                                                <?php
                                                    echo "<img src='UploadImg/".($result['foto'])."' class = 'categorie-foto'>";
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
