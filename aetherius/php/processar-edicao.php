<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION["email"])) {
    header("Location: ../tela-login-erro.html"); // Redireciona para a página de erro
    exit;
}

// Inclui o arquivo de conexão
require_once $_SERVER['DOCUMENT_ROOT'] . "/aetherius/aetherius/php/conexao.php"; // Caminho absoluto para o arquivo de conexão
$conn = conectarBanco();

if ($conn) {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_SESSION["email"]; // Use o email da sessão, não do formulário
    $telefone = $_POST["telefone"];

    // Query para atualizar as informações do usuário
    $sql = "UPDATE usuarios SET nome = :nome, telefone = :telefone WHERE email = :email";

    try {
        // Prepara a consulta
        $stmt = $conn->prepare($sql);
        // Executa a consulta com os novos dados
        $stmt->execute(array(':nome' => $nome, ':telefone' => $telefone, ':email' => $email));
        
        // Redireciona de volta para a página do perfil
        header("Location: ../usuario-perfil.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao editar perfil: " . $e->getMessage();
    }
} else {
    echo "Não foi possível conectar ao banco de dados.";
}
?>
