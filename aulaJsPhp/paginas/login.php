<?php
   require("../templates/header.php");
   require("../css/style.php");
?>

<form class="jao">
    <fieldset class="AA">
      <legend>Login</legend>

      <label for="email">Email:</label>
      <br>
      <input type="text" name="email">

        <br>
      <label for="senha">Senha:</label>
      <br>
      <input type="text" name="senha">

       <br>
      <input class="botao" type="submit" value="Entrar">
      <br>
      <a href="cadUsuario.php">Novo Cadastro</a>
    </fieldset>

</form>
<?php
  require("../templantes/footer.php");
?>