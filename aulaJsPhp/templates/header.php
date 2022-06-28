<?php
  session_start();
?>
<ul>
  <li><a href="logout.php">Sair</a></li>
  <li><?php if ($_SESSION['administrador']==1) echo "<a href='listUsuario.php'>Usuarios</a>"; else echo "";?></li>
  <li><a href="principal.php">Portifolio</a></li>  
</ul>
