<?php
// Inclui o arquivo de conexão com o banco de dados
include '../php/conexao.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $end_rua = $_POST["end_rua"];

    // Cria uma nova conexão PDO
    $conexao = conectarBanco();

    try {
        // Prepara a query de inserção
        $sql = "INSERT INTO dispositivos (nome, cep, end_rua, numero) VALUES (:nome, :cep, :end_rua, :numero)";
        $stmt = $conexao->prepare($sql);

        // Substitui os parâmetros na query pelos valores dos campos do formulário
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':end_rua', $end_rua);
        $stmt->bindParam(':numero', $numero);

        // Executa a query
        $stmt->execute();

        header("Location: ../usuario-dispositivos-sucesso.html");
    } catch(PDOException $e) {
        // Em caso de erro na execução da query, exibe o erro
        echo 'Erro ao inserir dados: ' . $e->getMessage();
    }
}
?>
