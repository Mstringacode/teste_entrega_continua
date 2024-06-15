<?php
// Inclua o arquivo de conexão
require_once "../aetherius/php/conexao.php";

// Função para obter os nomes dos dispositivos
function obterNomesDispositivos() {
    // Obtenha a conexão com o banco de dados
    $conn = conectarBanco();

    // Consulta ao banco de dados para obter os nomes dos dispositivos
    $sql = "SELECT nome FROM dispositivos";
    $result = $conn->query($sql);

    // Array para armazenar os nomes dos dispositivos
    $nomes = array();

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Adiciona o nome do dispositivo ao array
            $nomes[] = $row["nome"];
        }
    } else {
        echo "Nenhum nome de dispositivo encontrado";
    }

    return $nomes;
}

// Chama a função para obter os nomes dos dispositivos
$nomesDispositivos = obterNomesDispositivos();
?>
