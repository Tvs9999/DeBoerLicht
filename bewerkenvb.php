<?php 
include 'connection.php';
?>

<link rel="stylesheet" href="toevoegen&bewerken.css">

<button id="bewerken-btn">Bewerken</button>

<div id="Bewerken" class="bewerken">

  <!-- Modal content -->
  <div class="bewerken-content">
    <span class="close2">&times;</span>
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
                    <input class='input' type='name' name='price' placeholder='".$result['prijce']."'><br>
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


<script>
// Get the modal
var modal = document.getElementById("Bewerken");

// Get the button that opens the modal
var btn = document.getElementById("bewerken-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
