<?php
    include"../include/mysql.php";
    require("../templates/header.php");
    require("../css/style.php");

    $sql=$pdo->prepare('SELECT * FROM usuario');
    if($sql->execute()){
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);

        echo "<h1>Usuarios</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Fone</th>";
        echo "<th>Senha</th>";
        echo "<th>Administrador</th>";
        echo "<th>Alterar</th>";
        echo "<th>Excluir</th>";
        echo "</tr>";

        foreach($info as $key => $values){
            echo "<tr>";
            echo '<td>'.$values['codigo'].'</td>';
            echo '<td>'.$values['nome'].'</td>';
            echo '<td>'.$values['email'].'</td>';
            echo '<td>'.$values['fone'].'</td>';
            echo '<td>'.$values['senha'].'</td>';
            echo '<td>'.$values['administrador'].'</td>';
            echo "<td><center><a href='altUsuario.php?codigo=".$values['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delUsuario.php?codigo=".$values['codigo']."'>(-)</a></center></td>";

            echo '</tr>';
        }
        echo "<table>";
    }
    require("../templates/footer.php");
?>