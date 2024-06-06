<?php 
    include 'agenda.senha';
    
     if (isset($_POST['redsenha'])){
        $nova_senha=password_hash ($_POST['nova_senha'], PASSWORD_BCRYPT);
        $token = $_POST ['token'];

        $sql="update usuario set senha='$nova_senha',token_rec=null where token_rec='$token'";

        if ($conexao->query($sql)===true){
            echo "Senha redefinida com sucesso!";
        }
        else{
            echo "Erro ao redefinir a senha :/"
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
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
    <form method="post" action="redsenha.php">
        Nova senha: <input type="password" name="novasenha" required><br>
        Confirmar senha: <input type="password" name="confirmarsenha" required><br>
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="submit" name="redsenha" value="Redefinir senha">
    </form>
</body>
</html>