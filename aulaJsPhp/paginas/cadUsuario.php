<?php
  require("../templates/header.php");
  require("../css/style.php");

  if(isset($_COOKIE['nome'])){
    echo "<br> Ola ".$_COOKIE['nome']."</h2>";
  } else{
    echo "<h2>Não tem informação no cookie</h2>";
  }
?>

<h1>Cadastro de usuario</h1>

<form action="" method="POST" class="jao">
    <fieldset>
       <label for="email">Email:</label> <br>
       <input type="mail" name="email">

       <br>
       <label for="nome">Nome:</label> <br>
       <input type="text" name="nome">

       <br>
       <label for="fone">Fone:</label> <br>
       <input type="text" name="fone">

       <br>
       <label for="senha">Senha: </label> <br>
       <input type="password" name="senha">

       <br>
       <input type="checkbox" name="administrador">
       <label for="administrador">administrador</label>

       <br>
       <input class="botao" type="submit" value="Salvar">
       <input class="botao" type="reset" value="Limpar">

    </fieldset>



</form>

<?php
  require("../templates/footer.php");
?>