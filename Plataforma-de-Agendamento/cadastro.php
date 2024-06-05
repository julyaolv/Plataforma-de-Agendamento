<?php 
    include 'db.php';
     if (isset($_POSTER["registro"])){
        $nome=$_POST ['nome'];
        $email=$_POST['email'];
        $senha=password_hash($_POST['senha'],PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuario (nome,email,senha) value ($nome,$email,$senha)";

        if ($conexao->query($sql)==TRUE){
            echo "Registro bem-sucedido!";
        }
        else{
            echo "Erro:" .$sql . "<br>" . $conexao->error;
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
<div class="content first-content">
    <div class="first-column">
            <h2 class="title title-primary">Bem vindo de volta!</h2>
            <p class="description description-primary">Para se manter conectado conosco</p>
            <p class="description description-primary">por favor faça login com suas informações pessoais</p>
            <button id="signin" class="btn btn-primary">entrar</button>
        </div>    
            <div class="second-column">
                <h2 class="title title-second">criar conta</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">ou use seu e-mail para inscrição:</p>
                <form class="form" method="post" action="registro.php">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        Nome: <input type="text" placeholder="Nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        E-mail:<input type="email" placeholder="Email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        Senha: <input type="password" placeholder="Senha">
                    </label>
                    
                    
                    <button class="btn btn-second">criar</button>        
                </form>
            </div><!-- second column -->
</body>
</html>