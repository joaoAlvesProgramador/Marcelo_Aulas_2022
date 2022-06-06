<?php
    include"../include/mysql.php";

    $sql=$pdo->prepare('SELECT * FROM usuario');
    if($sql->execute()){
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);

        foreach($info as $key => $values){
            echo 'codigo: '.$values['codigo'].'<br>';
            echo 'nome: '.$values['nome'].'<br>';
            echo 'email: '.$values['email'].'<br>';
            echo 'fone: '.$values['fone'].'<br>';
            echo 'administrador: '.$values['administrador'].'<br>';

            echo '<hr>';
        }
    }
?>