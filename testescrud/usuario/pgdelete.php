<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor
$dbname = 'bdteste';
$username = 'root';
$password = '';

$mensagem = ''; // Para mensagens de erro ou sucesso

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o formulário de deleção foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } elseif (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE nome = :nome");
            $stmt->bindParam(':nome', $nome);
        } elseif (isset($_POST['email'])) {
            $email = $_POST['email'];
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
        }

        if ($stmt->execute()) {
            $mensagem = "Usuário deletado com sucesso!";
        } else {
            $mensagem = "Erro ao deletar usuário.";
        }
    }
} catch (PDOException $e) {
    $mensagem = "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Deletar Usuário</title>
    <script>
        function confirmarDelecao() {
            return confirm("Você tem certeza que deseja excluir este registro?");
        }
    </script>
</head>
<body>
    <h2>Deletar Usuário</h2>

    <form method="POST" action="">
        <h3>Deletar por ID:</h3>
        <label for="id">ID:</label>
        <input type="number" name="id" min="1">
        <input type="submit" value="Deletar" onclick="return confirmarDelecao();">

        <h3>Ou Deletar por Nome:</h3>
        <label for="nome">Nome:</label>
        <input type="text" name="nome">
        <input type="submit" value="Deletar" onclick="return confirmarDelecao();">

        <h3>Ou Deletar por Email:</h3>
        <label for="email">E-mail:</label>
        <input type="email" name="email">
        <input type="submit" value="Deletar" onclick="return confirmarDelecao();">
    </form>

    <?php if ($mensagem): ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>
</body>
</html>
