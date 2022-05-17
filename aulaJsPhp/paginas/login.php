<?php
   require("../templates/header.php");
   require("../css/style.php");

   $email = $senha="";

   $emailErr=$senhaErr="";

   function test_input($data){
     $data=trim($data);
     $data=stripslashes($data);
     $data=htmlspecialchars($data);

     return $data;
   }
   
   if($_SERVER['REQUEST_METHOD'] == "POST"){
     if(empty($_POST['email'])){
       $emailErr = "Email é obrigatorio";
     } else {
       $email=$_POST["email"];
     }
     if(empty($_POST['senha'])){
       $senhaErr="Senha é obrigatoria";
     } else {
       $senha=$_POST['senha'];
     }

   }
?>

<form class="jao" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <fieldset class="AA">
      <label for="email">Email:</label>
      <br>
      <input type="text" name="email" value=<?php echo $email?>>
      <span>*<?php echo $emailErr ?></span>
      <br>

        <br>
      <label for="senha">Senha:</label>
      <br>
      <input type="text" name="senha" value=<?php echo $senha?>>
      <span>* <?php echo $senhaErr ?></span>
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