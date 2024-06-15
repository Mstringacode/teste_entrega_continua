<?php
require_once '../aetherius/php/busca-nomes.php';

// Obtenha a conexão com o banco de dados
$conn = conectarBanco();

// Consulta ao banco de dados para obter os dispositivos
$sql = "SELECT cep, end_rua, numero FROM dispositivos";
$result = $conn->query($sql);

// Array para armazenar os endereços
$addresses = array();

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Concatena CEP e número para formar o endereço completo
        $address = $row["cep"] . " " . $row["end_rua"] . " " . $row["numero"];
        array_push($addresses, $address);
    }
} else {
    echo "Nenhum resultado encontrado";
}

?>

