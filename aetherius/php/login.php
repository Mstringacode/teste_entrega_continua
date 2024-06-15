<?php
// Inclua o arquivo de conexão
include '../php/conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    try {
        // Conecta ao banco de dados
        $conexao = conectarBanco();
        
        // Consulta para verificar se o usuário existe
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();
        
        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Autenticação bem-sucedida, define as variáveis de sessão
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            
            // Redireciona para a página de perfil do usuário
            header("Location: ../usuario-painel.php");
            exit;
        } else {
            // Autenticação falhou, exiba uma mensagem de erro
            header("Location: ../tela-login-erro.html");
        }
    } catch(PDOException $e) {
        // Em caso de erro, exibe o erro
        echo 'Erro ao autenticar o usuário: ' . $e->getMessage();
    }
}
?>