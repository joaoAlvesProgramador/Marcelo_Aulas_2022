<?php
    include "../include/mysql.php";
    include "../include/functions.php";
    require("../templates/header.php");
    require("../css/style.php");

    $codigo="";
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

    if(isset($_GET['codigo'])){
        $codigo=$_GET['codigo'];
        $sql=$pdo->prepare('SELECT * FROM usuariu WHERE codigo=?');
        if($sql->execute(array($codigo))){
            $info=$sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($info as $key => $value){
                $codigo = $value ['codigo'];
                $nome = $value ['nome'];
                $email = $value ['email'];
                $fone = $value ['fone'];
                $senha = "";//$value ['senha'];
                $administrador = $value ['administrador'];
            }
        }
    }

    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
        if(isset($_POST['codigo'])){
            $codigo=$_POST['codigo'];
        }
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
        $administradorErr = false;
    } else {
        $administrador = true;
    }

    //Verificar se existe um usuariu
    if($email && $nome && $senha && $fone){
        $sql=$pdo->prepare("SELECT * FROM usuariu WHERE email = ? AND codigo <> ?");
            if($sql->execute(array($email,$codigo))){
                if($sql->rowCount()>0){
                    $msgErr="Email ja cadastrado para outro usuario";
                } else {
                    $sql=$pdo->prepare("UPDATE usuariu SET nome=?, email=?, senha=?, fone=?, administrador=? WHERE codigo=?");
                    if($sql->execute(array($nome,$email,MD5($senha),$fone,$administrador,$codigo))){
                        $msgErr="Dados alterados com sucesso!";
                        header('location: listUsuario.php');
                    } else {
                        $msgErr="Dados não alterados!";
                    }
                }
    

            }                  
        } else {
        $msgErr="Dados não informados";
        }
    }

?>
oi
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="jao">
    <fieldset>
        <label for="codigo">Codigo: </label>
        <input type="text" name="codigo" value="<?php echo $codigo ?>" readonly>
        <br>
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