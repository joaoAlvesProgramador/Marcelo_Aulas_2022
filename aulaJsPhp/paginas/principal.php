<?php
    require("../css/style.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style">
    <title>Document</title>
</head>
<body>
<?php
    require("../templates/header.php");
?>
    <h1>Pagina principal</h1>
    <h1>
        Olá <?php echo $_SESSION['nome']?>
        <br>
        Voce é admin? <?php if ($_SESSION['administrador']==1) echo "<a href='listUsuario.php'>Lista de usuarios</a>"; else echo "Não";?> 
    </h1>
    <br>
    <h2><a href="logout.php">Encerrar sessão</a></h2>
    <?php
    require("../templates/footer.php");
    ?>
</body>
</html>