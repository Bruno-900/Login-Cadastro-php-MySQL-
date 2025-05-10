<?php
// Inicia sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Constante de controle
define('CONTROL', true);

// Verifica se o usuário está logado
$Usuario_Logado = $_SESSION['Usuario'] ?? null;

// Define o caminho da página com base na sessão e no parâmetro da URL
$Caminho = 'Login'; // padrão

if (isset($_GET['Caminho']) && $_GET['Caminho'] === 'Cadastro') {
    $Caminho = 'Cadastro';
} elseif (empty($Usuario_Logado)) {
    $Caminho = 'Login';
} else {
    $Caminho = $_GET['Caminho'] ?? 'Home';
}

// Lista de caminhos válidos
$Caminhos = [
    'Login' => 'Login.php',
    'Home' => 'Home.php',
    'Logout' => 'Logout.php',
    'Cadastro' => 'Cadastro.php'
];

if (!array_key_exists($Caminho, $Caminhos)) {
    die('Acesso Bloqueado');
}

// Carrega a página correspondente
require_once $Caminhos[$Caminho];
?>
