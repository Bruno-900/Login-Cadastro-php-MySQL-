<?php
defined('CONTROL') or die('Acesso Bloqueado');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexão com o banco de dados
require_once '../DB/Conector.php';

$erro = null;

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos!";
    } else {
        try {
            // Corrigido: faltava o nome da tabela
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE Email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['Senha'])) {
                // Login bem-sucedido
                $_SESSION['Usuario'] = $usuario['Nome'];
                header("Location: index.php?Caminho=Home");
                exit;
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        } catch (PDOException $e) {
            $erro = "Erro ao logar: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuário</title>
    <link rel="stylesheet" type="text/css" href="/../Sistema de Login/CSS/style.css">
</head>
<body>
    <div class="container">
        <h2>Login Usuário</h2>
        <form action="index.php?Caminho=Login" method="post">
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br><br>

            <?php if (!empty($erro)): ?>
                <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <input type="submit" value="Entrar">
            <a href="index.php?Caminho=Cadastro" class="botao-criar">Criar Conta</a>
        </form>
    </div>
</body>
</html>
