<?php

session_start();

if(!isset($_SESSION['senha']) || !isset($_SESSION['email'])){
    
    header("location:login.php");
}
else{
$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
$apelido=$_SESSION['apelido'];
$contacto=$_SESSION['contacto'];
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
$data = $_SESSION['data'];

}

Será que modificou..? "Baka"
?>
