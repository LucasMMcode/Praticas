<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor
$dbname = 'bdteste';
$username = 'root';
$password = '';

$usuarios = []; // Para armazenar os resultados da consulta
$mensagem = ''; // Para mensagens de erro ou sucesso

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o formulário de busca foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome'])) {
        $nome = $_POST['nome'];

        // Preparar a consulta para buscar o usuário pelo nome
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :nome");
        $nomeParam = "%" . $nome . "%"; // Usar LIKE para busca parcial
        $stmt->bindParam(':nome', $nomeParam);
        $stmt->execute();

        // Obter os resultados
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar se o usuário foi encontrado
        if (empty($usuarios)) {
            $mensagem = "Nenhum usuário encontrado com o nome: " . htmlspecialchars($nome);
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
    <title>Consultar Usuário por Nome</title>
</head>
<body>
    <h2>Consultar Usuário por Nome</h2>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($mensagem): ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <?php if ($usuarios): ?>
        <table border="1">
            <tr><th>ID</th><th>Nome</th><th>Email</th></tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
