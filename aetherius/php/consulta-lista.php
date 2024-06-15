<?php
// Consulta SQL com o campo "endereco" substituído por "end_rua"
$sql = "SELECT id, nome, end_rua, numero FROM dispositivos";
$stmt = $conn->query($sql);

// Verifica se há linhas retornadas
if ($stmt->rowCount() > 0) {
    // Inicializa a tabela HTML
    echo "<table class='table' id='tabela_dispositivos'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>";

    // Loop através dos resultados e adiciona-os à tabela HTML
    $count = 1;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . $count . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["end_rua"] . "</td>
                <td>" . $row["numero"] . "</td>
                <td>
                    <form action='../aetherius/php/excluir-dispositivo.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn btn-danger'>Excluir</button>
                    </form>
                </td>
            </tr>";
        $count++;
    }

    // Fecha a tabela HTML
    echo "</tbody></table>";
} else {
    echo "Nenhum dispositivo encontrado";
}

// Fecha a conexão com o banco de dados
$conn = null;
?>
