<?php
// Função para criar a conexão PDO com o banco de dados
function conectarBanco() {
    $host = 'localhost'; // Nome do host
    $dbname = 'aetherius'; // Nome do banco de dados
    $usuario = 'root'; // Nome de usuário do banco de dados
    $senha = ''; // Senha do banco de dados

    // Tente se conectar ao banco de dados
    try {
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
        // Define o modo de erro do PDO como exceção
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch(PDOException $e) {
        // Em caso de erro na conexão, exibe o erro
        echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
        exit;
    }
}

// Chamando a função conectarBanco() para obter a conexão PDO
$conn = conectarBanco();
