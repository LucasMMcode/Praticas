<?php
include('conectadb.php');
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row ["id"].
    "<br> Nome: " . $row["nome"].
    "<br> Email: " . $row["email"]. 
    "<br> Senha: " . $row["senha"].
    "<br> Criado em: " . $row["created_at"]. 
    "<br><br>";
    }
}
else {
    echo "0 resultados";
}
?>
