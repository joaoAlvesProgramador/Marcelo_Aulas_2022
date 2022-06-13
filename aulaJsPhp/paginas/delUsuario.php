<?php
    include '../include/mysql.php';

    if(isset($_GET['codigo'])){
        $codigo=$_GET['codigo'];
        
        $sql=$pdo->prepare("DELETE FROM usuariu WHERE codigo=?");
        if($sql->execute(array($codigo))){
            echo 'Usuario excluido com sucesso.';
            header('Location:listUsuario.php');
        }else{
            echo "Erro: Dados não foram excluidos <br>";
            echo "Comando: $sql. <br>";
        }
    }
?>