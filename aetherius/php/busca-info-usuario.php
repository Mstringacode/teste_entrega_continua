<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION["email"])) {
    header("Location: ../aetherius/tela-login-erro.html"); // Redireciona para a página de erro
    exit;
}

// Inclui o arquivo de conexão
require_once '../aetherius/php/conexao.php';

// Query para buscar as informações do usuário
$email = $_SESSION["email"];
$sql = "SELECT nome, email, telefone FROM usuarios WHERE email = :email";

try {
    // Prepara a consulta
    $stmt = $conn->prepare($sql);
    // Executa a consulta com o email como parâmetro
    $stmt->execute(array(':email' => $email));
    
    // Verifica se houve resultados
    if ($stmt->rowCount() > 0) {
        // Preenche as informações do usuário
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $row["nome"];
        $email = $row["email"];
        $telefone = $row["telefone"];
    } else {
        echo "Nenhum usuário encontrado.";
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
?>
