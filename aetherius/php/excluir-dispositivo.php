<?php
// Verifica se o ID do dispositivo foi enviado via POST
if(isset($_POST['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once '../php/conexao.php';

    // Prepara a consulta SQL para excluir o dispositivo com o ID fornecido
    $sql = "DELETE FROM dispositivos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    // Liga o parâmetro :id ao valor do ID do dispositivo
    $stmt->bindParam(':id', $_POST['id']);
    
    // Executa a consulta
    if($stmt->execute()) {
        // Redireciona de volta para a página anterior se o ID do dispositivo não foi fornecido
        header("Location: ../usuario-painel.php");
        exit;
    } else {
        echo "Erro ao excluir dispositivo.";
    }
}
?>
