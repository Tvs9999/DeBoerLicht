<?php
$servername="localhost";
$username="deb85590_p42t3";
$password="F1zJc7Bdt";
$db="deb85590_p42t3";

$conn= new mysqli($servername, $username, $password, $db);
if(!$conn){
    die("Error on the Connection" . $conn->connect_error);
}
?>