
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Document</title>
</head>
<body>
    
<form method="POST">

    <img src="img/logo3.png">
    <br>
    <input type="text" name="nome" clas="" placeholder="Nome...">
    <br>
    <input type="text" name="apelido"  placeholder="Apelido..">
    <br>
    <input type="email" name="email" placeholder="E-mail">
    <br>
    <input type="text" name="contacto" placeholder="Contacto">
    <br>
    <input type="password" name="senha" placeholder="Senha">
    <br>
    <input type="password" name="confSenha" placeholder="Comfirmar Senha">
    <br>
    <input type="date" name="data">
    <br>
    <input type="submit" name="salvar" value="Cadastrar">

    <h4>Já é cadastrado? <a href="login.html">Faça o Login</a></h4>

</form>
</body>
</html>


<?php
include("conexao.php");

if(isset($_POST['salvar'])){

    $nome=$_POST['nome'];
    $apelido=$_POST['apelido'];
    $contacto=$_POST['contacto'];
    $email=$_POST['email'];
    $senha=md5($_POST['senha']);
    $data=$_POST['data'];
    $confSenha=md5($_POST['confSenha']);
   

    if(!empty($nome) && !empty($apelido) && !empty($email) && !empty($contacto) && !empty($senha) && !empty($confSenha) && !empty($data)){

        $comando= mysqli_query($conectar, "insert into usuario(nome, apelido, contacto, email, senha, data_nasc) values ('$nome', '$apelido', '$contacto', '$email', '$senha', '$data')");

        if($senha == $confSenha){

            header("location:index.php");
        }
        else{
            echo "<script> alert('Senha E Confirmar Senha não Correspondem');</script>";
            echo "<script> window.location.href='cadastrar.php';</script>";
        }
    }
    echo "<script> alert('Preencha Todos os Campos');</script>";
    echo "<script> window.location.href='cadastrar.php';</script>";
}
?>