<?php
// Consulta SQL com o campo "endereco" substituído por "end_rua"
$sql = "SELECT id, value, data_geracao FROM medidas";
$stmt = $conn->query($sql);

// Verifica se há linhas retornadas
if ($stmt->rowCount() > 0) {
    // Inicializa a tabela HTML
    echo "<table class='table' id='tabela_dispositivos'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Valor</th>
                    <th>Momento</th>
                    <th>Dispositivo</th>
                </tr>
            </thead>
            <tbody>";

    // Loop através dos resultados e adiciona-os à tabela HTML
    $count = 1;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Gerar um número aleatório entre 1 e 10
        $id_dispositivo = rand(1, 10);
    
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["value"] . "</td>
        <td>" . $row["data_geracao"] . "</td>
        <td>" . $id_dispositivo . "</td>
              </tr>";
        $count++;
    }
    

    // Fecha a tabela HTML
    echo "</tbody></table>";
} else {
    echo "Nenhum evento encontrado";
}

// Fecha a conexão com o banco de dados
$conn = null;
?>
