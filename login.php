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

  <div class="log">
      <form action="sessao.php" method="POST" >

        <img src="img/logo3.png" alt="">
        <br>
        <input type="email" name="email" placeholder="E-mail">
        <br>
        <input type="password" name="senha" placeholder="Senha">
        <br>
        
        <input type="submit" name="entrar" value="Entrar">

        <h4>Ainda não é cadastreado? <a href="cadastrar.php"> Cadastra-te Já</a></h4>
      </form>
  </div>
</body>
</html>