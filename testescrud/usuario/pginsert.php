<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor
$dbname = 'bdteste';
$username = 'root';
$password = '';
try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Preparar a consulta para inserção
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Usuário inserido com sucesso!";
        } else {
            echo "Erro ao inserir usuário.";
        }
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inserir Usuário</title>
</head>
<body>
    <h2>Inserir Novo Usuário</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Inserir">
    </form>
</body>
</html>
