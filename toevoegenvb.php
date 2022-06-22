<?php
include 'connection.php';

?>

<head>
  <link rel="stylesheet" href="toevoegen&bewerken.css">
</head>

<body>

<!-- Trigger/Open The Modal -->
<button id="toevoegen-btn">Toevoegen</button>

<!-- The Modal -->
<div id="Toevoegen" class="toevoegen">

  <!-- Modal content -->
  <div class="toevoegen-content">
    <span class="close">&times;</span>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id"><br>
      <input type="text" name="productnaam" class="input" placeholder="Product Naam"><br>
      <input class="input" type="name" name="price" placeholder="Prijs"><br>
      <input class="input" type="name" name="korting" placeholder="Korting"><br>
      <input class="input" type="name" name="type" placeholder="Type"><br>
      <input class="input" type="name" name="voltage" placeholder="Voltage"><br>
      <input class="input" type="name" name="catId" placeholder="Categorie"><br>
      <input class="input" type="name" name="voorraad" placeholder="Voorraad"><br>
      <input class="bestand" type="file" name="Foto1" id="file1"><br>
      <input class="bestand" type="file" name="Foto2" id="file2"><br>
      <input class="upload" type="submit" value="Toevoegen" name="submit">
    </form>
  </div>

</div>




<script>
// Get the modal
var modal = document.getElementById("Toevoegen");

// Get the button that opens the modal
var btn = document.getElementById("toevoegen-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

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

</body>