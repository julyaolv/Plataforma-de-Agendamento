<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para verificar o usuário
    $query = "SELECT * FROM usuario WHERE email = ?";
    if ($stmt = $conexao->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifica a senha
            if (password_verify($senha, $row['senha'])) {
                // Login bem-sucedido
                $_SESSION['email'] = $email;
                header("Location: principal.html"); 
                exit;
            } else {
                // Senha incorreta
                echo "Senha incorreta.";
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado.";
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
}
$conexao->close();
?>