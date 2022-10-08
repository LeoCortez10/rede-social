<?php
include("conexao.php");

if(isset($_POST['entrar'])){

    $email=$_POST['email'];
    $senha=md5($_POST['senha']);

    if(!empty($email) && !empty($senha)){

        $comando=mysqli_query($conectar, "SELECT *FROM usuario WHERE senha='$senha' and email='$email'");

        $total=mysqli_num_rows($comando);

        if($total>0){

            $dados=mysqli_fetch_assoc($comando);

            if(!isset($_SESSION)){
                session_start();

            }

            $_SESSION['id']=$dados['id'];
            $_SESSION['nome']=$dados['nome'];
            $_SESSION['apelido']= $dados['apelido'];
            $_SESSION['contacto']=$dados['contacto'];
            $_SESSION['email']=$dados['email'];
            $_SESSION['senha']=$dados['senha'];
            $_SESSION['data']=$dados['data_nasc'];

           header("location:index.php");
        }
        else{

            echo "<script> alert('Senha ou Email não Corresponde');</script>";
            echo "<script> window.location.href='login.php';</script>";
        }

    }
    else{
        echo "<script> alert('Preencha todos os Campos');</script>";
        echo "<script> window.location.href='login.php';</script>";
    }
}

?>