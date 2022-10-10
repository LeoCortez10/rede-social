<?php
require_once 'mindex.php';
include("conexao.php");
include("index.php");
echo" <br /> <br />";

$publicado=mysqli_query($conectar, 'SELECT *FROM publicacoes ORDER BY id DESC');

if (isset($_POST['publicar'])) {
  
  if ($_FILES['file']["error"]>0) {
    
    $texto=$_POST['texto'];
    $hoje= date("y-m-d");

    if ($texto=="") {
      echo "<script>alert('Você tem que escrever algo antes de publicar');</script>";
    }
    else{
      $comando="insert into publicacoes(usuario, texto, data) values('$email', '$texto', '$hoje')";

      $resultado=mysqli_query($conectar, $comando);

      if ($resultado) {
        header("location:mindex.php");
      }
      else{
        echo "<script> alert('Alguma coisa não correu nada bem.. </br> Tente Mais Tarde!');</script>";
      }
      
    }
    
  }
  else{
    $n= rand(0, 1000000);
    $img= $n.$_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], "fotos/" .$img);

    $texto=$_POST['texto'];
    $hoje= date("y-m-d");

    if ($texto=="") {
      echo "<script>alert('Você tem que escrever algo antes de publicar');</script>";
    }
    else{
      $comando= "insert into publicacoes(usuario, texto, imagem, data) values('$email', '$texto', '$img', '$hoje')";

      $resultado=mysqli_query($conectar, $comando);

      if($resultado){
        header("location:mindex.php");
      }
      else{
        echo "<script> alert('Alguma coisa não correu bem.. <br/> Tente Mais Tarde!');</script>";
      }
      
    }
    
  }
}
?>

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
  
<div class="corpo">
<?php
?>
<form method="POST" enctype="multipart/form-data">
  <br>
  <textarea placeholder="Insira uma nova Publicação" name="texto"></textarea>
  <label for="file-input">
    <img src="img/chat.png" title="Insira uma imagem">
  </label>
  <input type="submit" value="Publicar" name="publicar">
  <input type="file" id="file-input" name="file" hidden>
</form>
</div>

<?php

while ($publico=mysqli_fetch_assoc($publicado)) {
  $email=$publico['usuario'];
  $sabera=mysqli_query($conectar, "SELECT *FROM usuario WHERE email='$email'");
  $saber=mysqli_fetch_assoc($sabera);
  $nome= $saber['nome']. "  " .$saber['apelido'];
  $id= $publico['id'];

  if($publico['imagem']== 0){

    echo '<div class="publico" id="'.$id.'">
    <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> - '.$publico["data"].'</p>

   <span>'.$publico['texto'].'</span> <br />
    </div>';
  }
  else{
    echo '<div class="publico" id="'.$id.'">
    <p><a  href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> - '.$publico["data"].'</p>

   <span>'.$publico['texto'].'</span> <br />


   <img src="fotos/'.$publico['imagem'].'"> 
    </div>';
  }
}

?>
<br />

<div class="rodape">
  <form method="GET">
    <input type="submit" value="Terminar Sessão" name="sair">
  </form>
  <?php
  if (isset($_GET['sair'])) {

    if (isset($_SESSION)) {
       session_destroy();
    }
    
    header("location:login.php");
  }
  ?>
<h4>&copy; 2022- Todos os Direitos Reservados</h4></div>
<br />
</body>
</html>