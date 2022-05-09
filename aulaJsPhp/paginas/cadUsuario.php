<?php
  require("../templates/header.php");
  require("../css/style.php");
?>

<h1>Cadastro de usuario</h1>

<form action="" method="POST">
    <fieldset>
       <label for="email">Email:</label>
       <input type="mail" name="email">
       <br>
       <label for="nome">Nome:</label>
       <input type="text" name="nome">
       <br>
       <label for="fone">Fone:</label>
       <input type="text" name="fone">
       <br>
       <label for="senha">Senha: </label>
       <input type="password" name="senha">
       <br>
       <input type="checkbox" name="administrador">
       <label for="administrador">administrador</label>
    </fieldset>
    <fieldset>
       <input type="submit" value="Salvar">
       <input type="reset" value="Limpar">
    </fieldset>


</form>

<?php
  require("../templates/footer.php");
?>