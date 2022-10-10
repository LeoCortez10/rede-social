<?php
include("conexao.php");
include("index.php");

$id=$_GET['id'];

$sabera=mysqli_query($conectar, "SELECT *FROM usuario WHERE id='$id'");
$saber=mysqli_fetch_assoc($sabera);
$email= $saber['email'];



$publicado=mysqli_query($conectar, 'SELECT *FROM publicacoes ORDER BY id DESC');

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
    <?php
if($saber['img']==""){
    echo "<img src='img/perfil.png' class='perfil'>";
}
else{ 
    echo '<img src="fotos/'.$saber['img'].'" class="perfil">';
}
?>
<div class="menu-perfil">
    <h2><?php echo $saber['nome']." ".$saber['apelido']; ?></h2>

    <input type="submit" name="add" value="Adicionar Amigo"> &nbsp; <input type="submit" name="denunciar" value="Denunciar">
</div>

 
<?php

while ($publico=mysqli_fetch_assoc($publicado)) {
  $email=$publico['usuario'];
  $sabera=mysqli_query($conectar, "SELECT *FROM usuario WHERE email='$email'");
  $saber=mysqli_fetch_assoc($sabera);
  $nome= $saber['nome']. " " .$saber['apelido'];
  $id= $publico['id'];

  if($publico['imagem']== 0){

    echo '<div class="publico" id="'.$id.'">
    <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> - '.$publico["data"].'</p>

   <span>'.$publico['texto'].'</span> <br />
    </div>';
  }
  else{
    echo '<div class="publico" id="'.$id.'">
    <p><a href="perfil.php?id='.$saber['id'].'">'.$nome.'</a> - '.$publico["data"].'</p>

   <span>'.$publico['texto'].'</span> <br />


   <img src="fotos/'.$publico['imagem'].'"> 
    </div>';
  }
}

?>
<br />

<div class="rodape"> <h4>&copy; 2022- Todos os Direitos Reservados</h4></div>
<br />
</body>
</html>