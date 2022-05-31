<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.html</title>
    <link rel="stylesheet" href="DeBoerLicht">
</head>
<body>
 <center>
    <div id="main">
        <h1>login</h1>
        <form method="post" action="">
            <input type="text" name="email" class="text" autocomplete="off" required placeholder="emailadress"><br><hr><br>
            <input type="wachtwoord" name="wachtwoord" class="text" required placeholder="wachtwoord"><br><hr><br>
            <input type="submit" name="submit" id="sub"> 
      </form>
        <div class="login-button">
      <a href="bestel(particulier).php"> <button type="submit">particulier klik hier</button></a>
   </div>
    </center>
    </div>
</body>
</html>
<?php
}
if (isset($_POST['submit'])) {
    $emailadress=$_POST['email'];
    $wachtwoord=$_POST['wachtwoord'];
      
       
      }
  
        $sql = "SELECT * FROM `beheerder` WHERE `emailadress` = '".$emailadress."' AND `password` = '".$wachtwoord."'";
        $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          $_SESSION['emailadress'] = $emailadress;
          header("location:Producten.php");
          exit();
      }
      else{
          echo  "<script>alert('emailadress en wachtwoord kloppen niet, Probeer opnieuw')</script>";
        }
    }
    $conn->close();
    
?>


