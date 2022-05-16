<?php
   require("../templates/header.php");
   require("../css/style.php");

   $email = $senha="";

   $emailErr=$senhaErr="";
   
   if($_SERVER['REQUEST_METHOD'] == "POST"){
     if(empty($_POST['email'])){
       $emailErr = "Email é obrigatorio";
     }

   }
?>

<form class="jao" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <fieldset class="AA">
      <label for="email">Email:</label>
      <br>
      <input type="text" name="email">
      <br>

        <br>
      <label for="senha">Senha:</label>
      <br>
      <input type="text" name="senha">
      <br>

       <br>
      <input class="botao" type="submit" value="Entrar">
      <br>
      <a href="cadUsuario.php">Novo Cadastro</a>
    </fieldset>

</form>
<?php
  require("../templates/footer.php");
?>