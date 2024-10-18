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

    // Preparar a consulta
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();

    // Obter os resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Exibir os resultados
    if ($usuarios) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>
                    <td>{$usuario['id']}</td>
                    <td>{$usuario['nome']}</td>
                    <td>{$usuario['email']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
