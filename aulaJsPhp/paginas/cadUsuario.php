<?php
  include "../include/mysql.php";




  require("../templates/header.php");
  require("../css/style.php");

  if(isset($_COOKIE['nome'])){
    echo "<br> Ola ".$_COOKIE['nome']."</h2>";
  } else{
    echo "<h2>Não tem informação no cookie</h2>";
  }

  $email ="";
  $nome ="";
  $fone = "";
  $senha="";
  $administrador="";

  $emailErr="";
  $nomeErr="";
  $foneErr="";
  $senhaErr="";
  $administradorErr="";
  $msgErr="";


  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
  if (empty($_POST['email'])){
      $emailErr = "Email é obrigatório!";
  } else {
      $email = test_input($_POST["email"]);
  }
  if (empty($_POST['senha'])){
      $senhaErr = "Senha é obrigatório!";
  } else {
      $senha = test_input($_POST["senha"]);
  }
  if (empty($_POST['nome'])){
      $nomeErr = "Nome é obrigatório!";
  } else {
      $nome = test_input($_POST["nome"]);
  }
  if (empty($_POST['fone'])){
      $foneErr = "Telefone é obrigatório!";
  } else {
      $fone = test_input($_POST["fone"]);
  }
  if (empty($_POST['administrador'])){
      $administrador = false;
  } else {
      $administrador = true;
  }

  //Verificar se existe um usuariu
  if($email && $nome && $senha && $fone){
    $sql=$pdo->prepare("SELECT * FROM USUARIU WHERE email = ?");
    

      //Inserir no banco de dados
      $sql = $pdo->prepare("INSERT INTO USUARIU (codigo, nome, email, senha, fone, administrador)
                            VALUES (null, ?, ?, ?, ?, ?)");
      if ($sql->execute(array($nome, $email, $senha, $fone, $administrador))){
          $msgErr = "Dados cadastrados com sucesso!";  
      } else {
          $msgErr = "Dados não cadastrados!";
      }                      
  } else {
    $msgErr="Dados não informados";
  }

}

?>
oi
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="jao">
    <fieldset>
       <label for="email">Email:</label> <br>
       <input type="mail" name="email" value=<?php echo $email?>>
       <span class="nanda">*<?php echo $emailErr ?></span>
       

       <br>
       <label for="nome">Nome:</label> <br>
       <input type="text" name="nome" value=<?php echo $nome?>>
       <span class="nanda">*<?php echo $nomeErr ?></span>
       

       <br>
       <label for="fone">Fone:</label> <br>
       <input type="text" name="fone"  value=<?php echo $fone?>>
       <span class="nanda">*<?php echo $foneErr ?></span>
       

       <br>
       <label for="senha">Senha: </label> <br>
       <input type="password" name="senha" value=<?php echo $senha?>>
       <span class="nanda">*<?php echo $senhaErr ?></span>

       <br>
       <input type="checkbox" name="administrador">
       <label for="administrador">administrador</label>

       <br>
       <input class="botao" type="submit" value="Salvar" name="cadastro">
       <br>
       <span class="obrigatorio"><?php echo $msgErr ?></span>
    </fieldset>



</form>

<?php
  require("../templates/footer.php");
?>