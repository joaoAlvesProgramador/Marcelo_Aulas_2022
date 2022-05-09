<?php
   require("../templates/header.php");
?>

<form>
    <fieldset>
      <legend>Login</legend>
      <label for="email">Email:</label>
      <input type="text" name="email">
        <br>
      <label for="senha">Senha:</label>
      <input type="text" name="senha">
       <br>
      <input type="submit" value="Entrar">
      <br>
      <a href="cadUsuario.php">Novo Cadastro</a>
    </fieldset>

</form>
<?php
  require("../templantes/footer.php");
?>