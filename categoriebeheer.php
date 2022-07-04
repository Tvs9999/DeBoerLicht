<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="DeBoerLicht.css">
  <title>categoriebeheer</title>
</head>

<body>

  <div class="container">
    <div class="categoriebeheer-container">
      <div class="categoriebeheer">
        <h1>Categoriebeheer <i class='bx bx-category'></i></h1>
      </div>
          <?php
          $query = "SELECT * FROM categorie";
          $data = mysqli_query($conn, $query);
          $total = mysqli_num_rows($data);
          if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {?>
              <div class="cat">
                <div class = 'categoriebeheer-foto'>
                  <img src='UploadImg/<?php echo ($result['foto'])?>'>
                </div>
                <div class="catbeheer-naam">
                  <h1>
                    <?php echo $result['naam'] ?>                  
                  </h1>
                </div>
                <div class="catbeheer-opties">
                  <a href='CategorieBewerken.php?id=<?php echo $result['id']?>' class = "bottom20 delete-btn">
                    <i class='bx bx-edit'></i>
                  </a>
                  <a href='verwijderen2.php?id=<?php echo $result['id']?>' onclick='return checkdelete3()' class = "delete-btn">
                    <i class='bx bx-trash-alt'></i>
                  </a>
                </div>
              </div>
          <?php  }
          } else {
            echo "
              <tr>
              <td colspan='9' align='center' style='font-size: 20px;'>Geen Bestellingen</td>
              </tr>
              ";
          }
          ?>
    </div>
    <div class="sidebarleft">
      <?php include "Sidebar.php"; ?>
    </div>
    <div class="categorie_add add-btn">
      <a href="toevoegen2.php">
        <button>
          <i class="fas fa-plus"></i>
        </button>
      </a>
    </div>

</body>
<script>
  function checkdelete3() {
    return confirm('Weet je zeker dat je deze product wil verwijderen?');
  }
</script>

</html>