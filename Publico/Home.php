<?php 

defined('CONTROL') or die('Acesso bloqueado');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA PRINCIPAL</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <h2>PAGINA PRINCIPAL</h2>
        
    <div class="container">
        <div class="usuario">Usuário: <?= $_SESSION['Usuario'] ?></div>
        <a href="index.php?Caminho=Logout" class="botao-sair">SAIR</a>

    </div>

</body>
</html>