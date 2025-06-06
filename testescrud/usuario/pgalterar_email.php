<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor
$dbname = 'bdteste';
$username = 'root';
$password = '';

$usuario = null; // Para armazenar os dados do usuário
$mensagem = ''; // Para mensagens de erro ou sucesso

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o formulário de busca foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['busca'])) {
        $busca = $_POST['busca'];
        
        // Consultar os dados do usuário pelo nome ou e-mail
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :busca OR email = :busca");
        $stmt->bindParam(':busca', $busca);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se não encontrado, mensagem de erro
        if (!$usuario) {
            $mensagem = "Usuário não encontrado.";
        }
    }

    // Verificar se o formulário foi enviado para atualizar os dados
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome'])) {
        // Captura os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Preparar a consulta para atualização
        $updateStmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        $updateStmt->bindParam(':nome', $nome);
        $updateStmt->bindParam(':email', $email);
        $updateStmt->bindParam(':id', $id);

        // Executar a consulta
        if ($updateStmt->execute()) {
            header("Location: listar_usuarios.php");
            exit();
        } else {
            $mensagem = "Erro ao atualizar usuário.";
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
    <title>Alterar Usuário</title>
</head>
<body>
    <h2>Alterar Usuário</h2>
    
    <form method="POST" action="">
        <label for="busca">Buscar Usuário (por Nome ou Email):</label>
        <input type="text" name="busca" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($mensagem): ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <?php if ($usuario): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            <br>
            <input type="submit" value="Atualizar">
        </form>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
</body>
</html>
