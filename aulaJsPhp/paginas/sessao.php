<?php
    session_start();

    $_SESSION['aviso']= "<br>Preencha todos os itens";

    if(isset($_SESSION['aviso'])){
        echo $_SESSION['aviso'];
        //$_SESSION['aviso']="";
    }
?>