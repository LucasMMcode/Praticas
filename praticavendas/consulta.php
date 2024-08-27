


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Clientes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Consulta de Clientes</h1>
    
    <form method="POST" action="consulta.php" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Digite o nome ou e-mail do cliente" aria-label="Search" aria-describedby="search-button">
            <button class="btn btn-primary" type="submit" id="search-button">Buscar</button>
        </div>
    </form>
    <?php include "conexao.php"?>
    <?php

    // Consulta SQL
    $sql = "SELECT * FROM clientes WHERE telefone LIKE '%$search%' OR email LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>   
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['nome'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['telefone'] . "</td>
                  </tr>";
        }
        
        echo "</tbody>
              </table>";
    } else {
        echo "<div class='alert alert-warning'>Nenhum cliente encontrado</div>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
