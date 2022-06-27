<?php 
include 'connection.php';
?>

<link rel="stylesheet" href="DeBoerLicht.css">

<div id="Bewerken" class="bewerken">

  <!-- Modal content -->
  <div class="bewerken-content">
    <?php
      if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql= "SELECT * FROM producten WHERE 1";
        $res = $conn->query($sql);
        if ($res) {
          foreach ($res as $result) {
            echo"
              <div class='container form-popup' id='bewerk'>
                <div class='form'>
                  <form action='update.php?id=$id' method='post' enctype='multipart/form-data'>
                    <input type='text' name='naam' class='input' placeholder='".$result['naam']."'><br>
                    <input class='input' type='name' name='price' placeholder='".$result['prijs']."'><br>
                    <input class='input' type='name' name='korting' placeholder='".$result['korting']."'><br>
                    <input class='input' type='name' name='type' placeholder='".$result['type']."'><br>
                    <input class='input' type='name' name='voltage' placeholder='".$result['voltage']."'><br>
                    <input class='input' type='name' name='catId' placeholder='".$result['catId']."'><br>
                    <input class='input' type='name' name='voorraad' placeholder='".$result['voorraad']."'><br>
                    <img src='".$result['file1']."' alt=''>
                    <img src='".$result['file2']."' alt=''>
                    <input class='bestand' type='file' name='file1' id='file1'><br>
                    <input class='bestand' type='file' name='file2' id='file2'><br>
                    <input class='upload cart-btn' type='submit' value='Bewerk' name='submit'>
                    <a type='button' class='close' href='#'>&times;</a>
                  </form>
                </div>
              </div>";
          }
       }
  }  
?>
</div>

</div>