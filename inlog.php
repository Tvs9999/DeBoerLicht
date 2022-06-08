<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.html</title>
    <link rel="stylesheet" href="DeBoerLicht.css">
</head>
<body>
 <center>
    <div id="main">
        <h1>login</h1>
        <form method="post" action="">
            <input type="text" name="email" class="text" autocomplete="off" required placeholder="email"><br><hr><br>
            <input type="wachtwoord" name="wachtwoord" class="text" required placeholder="wachtwoord"><br><hr><br>
            <input type="submit" name="submit" id="sub"> 
      </form>
        <div class="login-button">
      
   </div>
    </center>
    </div>
</body>
</html>
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $wachtwoord=$_POST['wachtwoord'];
      
       
      
  
        $sql = "SELECT * FROM `beheerder` WHERE `email` = '".$email."' AND `wachtwoord` = '".$wachtwoord."'";
        $result = $conn->query($sql);
  
        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("location:header.php");
            exit();
          }
    else
    {
        echo  "<script>alert('email en wachtwoord kloppen niet, Probeer het opnieuw')</script>";
    }

}

         
       $conn->close();      
?>
 
        
       
        
    
   
    



