<?php

     echo "<h1>Exemplo cookie</h1>";

     $nome= "Marcelo Petri";

     setcookie("nome", $nome, time()+(86400*30));
     setcookie("idade", 43, time() +60);

     $email="";

     if(isset($_COOKIE['email'])){
          $email=$_COOKIE['email'];
     }
     
     if(isset($_GET['email'])){
          $email=$_GET['email'];

          $expiracao = time()+(86400*30);
          setcookie('email',$email,$expiracao);
     }
     echo "ola $email";

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <form action="GET">
     <label for="email">Email</label>
     <input type="text" name="email" value="<?php echo $email?>">
     <br>
     <input type="submit" value="enviar">
     </form>
</body>
</html>
