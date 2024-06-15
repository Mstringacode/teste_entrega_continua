<?php
// Inclua o arquivo de conexão
include '../php/conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    
    // Verifica se todos os campos foram preenchidos
    if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha)) {
        // Hash da senha para armazenamento seguro
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        
        try {
            // Conecta ao banco de dados
            $conexao = conectarBanco();
            
            // Prepara a declaração SQL para inserção
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $telefone, $senha_hash]);
            
            header("Location: ../tela-login.html");
        } catch(PDOException $e) {
            // Em caso de erro, exibe o erro
            echo 'Erro ao registrar o usuário: ' . $e->getMessage();
        }
    } else {
        header("Location: ../tela-registro-erro.html");
    }
}
?>