<?php
  include "../include/mysql.php";
  include "../include/functions.php";
  require("../templates/header.php");
  require("../css/style.php");

  $msgErro="";
  $descricao=$nome="";
  $valor="";

  if(isset($_POST["submit"])){
    if(!empty($_FILES["image"]["name"])){
        //Pegar informações
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        //Permitir somente alguns formatos
        $allowTypes = array('jpg','png','jpeg','gif');

        if(in_array($fileType,$allowTypes)){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);

            if(isset($_POST['nome'])){
                $nome=$_POST['nome'];
            }else{
                $nome="";
            }
            if(isset($_POST['descicao'])){
                $descricao=$_POST['descricao'];
            }else{
                $descricao="";
            }
            if(isset($_POST['valor'])){
                $valor=$_POST['valor'];
            }else{
                $valor="";
            }

            //gravar no banco
            $sql=$pdo->prepare("Insert INTO PRODUTO(codProduto,nomeProduto,descProduto,valorProduto,imagem)
            VALUES (null,?,?,?,?");

            if($sql->execute(array($nome,$descricao,$valor,$imgContent))){
                $msgErro="Dados cadastrados com sucesso!";
            }else{
                $msgErro="Dados não cadastrados!";
            }

        }else{
            $msgErro="Desculpe, mas somente JPG, JPEG, PNG e GIF são permitidos";
        }

    }else{
        $msgErro="Selecione uma imagem para upload";
    }

  }
?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            Nome: <input type="text" name="nome"><br>
            Descrição: <input type="textarea" name="descrição"><br>
            Valor: <input type="text" name="valor"><br>
            Imagem: <br>
            <input type="file" name="image" /> <br>

            <input type="submit" name="submit" value="Salvar" />
        </form>
    </body>
</html>
<?php
  require("../templates/footer.php");
?>