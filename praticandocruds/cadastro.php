<?php
// conectadb.php está incluído aqui para a conexão
include('conectadb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $password= $_POST['senha'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuarios (nome, senha, email) VALUES ('$nome', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
    echo "Novo usuário criado com sucesso!";
    } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST">
Nome: <input type="text" name="nome" required> <br><br>
Email: <input type="email" name="email" required> <br><br>
Senha: <input type="password" name="senha" rquired> <br><br>
    <input type="submit" value="Criar Usuário">
</form>
<a href="mostrausuarios.php"> USUARIOS <a>