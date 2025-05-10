<?php
// Inicia sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexão com o banco de dados
require_once '../DB/Conector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura e sanitiza os dados
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $idade = intval($_POST['idade'] ?? 0);
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validação simples
    if (empty($nome) || empty($cpf) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit();
    }

    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Corrija o nome da tabela conforme seu banco real (usuario ou usuarios)
        $stmt = $conn->prepare("INSERT INTO usuario (Nome, CPF, Idade, Email, Telefone, Senha) 
                                VALUES (:nome, :cpf, :idade, :email, :telefone, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->execute();

        // Login automático após cadastro
        $_SESSION['Usuario'] = $email;

        // Redireciona para a home
        header("Location: index.php?Caminho=Home");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="/../Sistema de Login/CSS/style.css">
</head>
<body>
    <div class="container_cadastro">
        <h2>Cadastro</h2>
        <form action="Cadastro.php" method="post">
            <div>
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" required><br><br>
            </div>
            <div>
                <label for="cpf">CPF:</label><br>
                <input type="number" id="cpf" name="cpf" required><br><br>
            </div>
            <div>
                <label for="idade">Idade:</label><br>
                <input type="number" id="idade" name="idade" required><br><br>
            </div>
            <div>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
            </div>
            <div>
                <label for="telefone">Telefone:</label><br>
                <input type="number" id="telefone" name="telefone" required><br><br>
            </div>
            <div>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" required><br><br>
            </div>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
