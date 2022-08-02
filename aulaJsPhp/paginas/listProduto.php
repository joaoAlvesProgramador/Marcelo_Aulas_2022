<?php
    include "../include/mysql.php";
    require("../templates/header.php");
    require("../css/style.php");

    $sql = $pdo ->prepare("SELECT * FROM produto");
    if($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($info as $key=>$values){
            echo 'Codigo: '.$values['codProduto'].'<br>';
            echo 'Descrição: '.$values['descProduto'].'<br>';
            echo 'Valor: '.$values['valorProduto'].'<br>';

            $imagem = $values['imagem'];
            echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($imagem).'"/><br>';
            echo'<hr>';
        }

    }

    
?>