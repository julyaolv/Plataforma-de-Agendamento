<?php 
    include ('conexao.php');
    $nome=$_POST ['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $sql = "INSERT INTO usuario (nome,email,senha) values ('$nome','$email','$senha')";

    if (mysqli_query($conexao,$sql)){
        echo "Registro bem-sucedido!";
    }
    else{
        echo ("Erro:" .$sql . "<br>" . mysqli_error($conexao));
    }
?>


