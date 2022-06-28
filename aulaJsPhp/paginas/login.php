<?php
   include "../include/mysql.php";
   include "../include/functions.php";
   require("../css/style.php");

   session_start();
   $_SESSION['nome']="";
   $_SESSION['administrador']="";

   $email = $senha="";
   $emailErr=$senhaErr="";

   
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

     $sql = $pdo->prepare("SELECT * FROM usuariu WHERE email=? AND senha=?");
     if($sql->execute(array($email,MD5($senha)))){
        $info =$sql->fetchAll(PDO::FETCH_ASSOC);
        if(count($info)>0){
            foreach($info as $key =>$values){
              $_SESSION['nome']=$values['nome'];
              $_SESSION['administrador']=$values['administrador'];
            }

          header('location:principal.php');
        } else {
          echo '<h6>Email de Usuario não cadastrado</h6>';
        }
      }
      }
?>

<form class="jao" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <fieldset class="AA">
      <label for="email">Email:</label>
      <br>
      <input type="text" name="email" value=<?php echo $email?>>
      <span class="nanda">*<?php echo $emailErr ?></span>
      <br>

        <br>
      <label for="senha">Senha:</label>
      <br>
      <input type="text" name="senha" value=<?php echo $senha?>>
      <span class="nanda">* <?php echo $senhaErr ?></span>
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