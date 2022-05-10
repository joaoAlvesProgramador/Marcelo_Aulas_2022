<?php

     echo "<h1>Exemplo cookie</h1>";

     $nome= "Marcelo Petri";

     setcookie("nome", $nome, time()+(86400*30));
     setcookie("idade", 43, time() +60);

?>
