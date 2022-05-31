<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $name = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    $id = "SELECT id AS countid FROM users WHERE naam='".$uname."' and wachtwoord='".$password."'";
    $resultid = mysqli_query($con,$id);
    $rowid = mysqli_fetch_array($resultid);
    $countid = $rowid['countid'] ?? null;

    if($uname != "" && $password != ""){

        $sql_query = "select count(*) as Count from users where naam='".$uname."' and wachtwoord='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['Count'];
        if ($count > 0){
            //succes
            $_SESSION['id'] = $countid;
            $_SESSION['rol'] = $countrol;
            header("Location:home.php?username=$uname");
             exit();   
        }
        else {
            //failed
            echo "<script>alert('invalid password')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="NL">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="inloggenpagina.css">
    </head>

    <body>
        <div class="container3">
            <form method="post" action = "">
                <div id="div_login">
                    <h1 class="login">Log in</h1>
                        <div>
                          <h2 class="text"> Gebruikersnaam: <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Naam"/> </h2>
                        </div>
                        <div>
                            <h2 class="text"> Wachtwoord: <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Wachtwoord" /> <h2>
                        </div>
                         <div>
                            <input type="submit" value="Log in" name="but_submit" id="but_submit" /> <a href="#"class="lenen" value="Lenen">Lenen</a>
                        </div>
                </div>
            </form>
        </div>
    </body>
</html>