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
  <title>besteloverzicht</title>
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
                            <div class="categorie">
                                <div class="categorie-links">
                              
                                    <img src="UploadImg/no-image.png" alt="" class="categorie-foto">
                                    <h2 class="categorie-naam"><?php echo $row['naam']; ?></h2>
                                </div>                               
                            </div>
                        <?php }
                    } ?>            
        </div>
        <div class="sidebar-left">
            <?php include 'header.php' ?>
        </div>
    </div>
</body>
</html>
