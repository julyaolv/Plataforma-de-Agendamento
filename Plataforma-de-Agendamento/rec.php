<?php 
    include 'db.php';

    if (isset($_post['recuperacao'])){
        $email=$_POST['email'];
        $token=bin2hex(random_bytes(50));

        $sql="update usuarios set token_rec='$token' where email='$email'";

        if($scon->query($sql)==true){
            $link="Plataforma-de-Agendamento/redsenha.html/recuperacao.php?tken=$token";
            mail($email,"Recuperação de Senha","Clique no link para recuperar sua senha: $link");

            echo"Email de recuperação enviado!";
        }
        else{
            echo "Erro ao atualizar o token de recuperação";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form class=form method="post" action="recuperacao.php">
        email: <input type="text" name="email" required><br>
        <input type="submit" name="reuperacao" value="Enviar link de recuperação">
        <a class="password" href="#">esqueceu sua senha?</a>
        <button class="btn btn-second" type="submit">entrar</button>
    </form>
</body>
</html>