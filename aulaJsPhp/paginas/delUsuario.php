<?php
    include '../include/mysql.php';

    if(isset($_GET['codigo'])){
        $codigo=$_GET['codigo'];
        echo "Codigo: $codigo";
    }
?>