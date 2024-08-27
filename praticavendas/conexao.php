
<?php
    $conn = new mysqli('localhost', 'root', '', 'bdVendas');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $search = isset($_POST['search']) ? $_POST['search'] : '';?>