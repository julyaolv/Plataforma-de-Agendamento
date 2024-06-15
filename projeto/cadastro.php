<?php 
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Hash da senha para armazenamento seguro
    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara a consulta SQL com bind parameters para evitar SQL Injection
    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("sss", $nome, $email, $senha_hashed);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>
<body>
    <div>
         <p><strong>Cadastro realizado com sucesso!</strong><br><br>Clique para se direcionar à tela principal</p>
         <a href="principal.html"><button id="btn">IR PARA A AGENDA</button></a>
    </div>
</body>
</html>