<?php
$Servidor = 'localhost';
$bancodedados = 'db_login';
$Usuario = 'root';
$senha = '';

try {
    $conn = new PDO("mysql:host=$Servidor;dbname=$bancodedados;charset=utf8", $Usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "A conexão está funcionando!";
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}
?>
