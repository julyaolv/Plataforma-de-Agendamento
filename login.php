<?php 
    include 'db.php';
    if (isset($_post['login'])){
        $email=$_POST['email'];
        $senha=$_POST['senha'];

        $sql="select*from usuario where email='$email'";
        $result=$conexao->query($sql);
         if ($result->num_rows>0){
            $user=$result->fetch_assoc();
            if (password_verify($enha,$user['senha'])){
                echo "Login bem-sucedido";
            }
            else{
                echo "Erro :(";
            }
         }
         else{
            echo "Usuário não encontrado";
         }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body> 
    <div class="content second-content">
        <div class="first-column">
            <h2 class="title title-primary">Olá!</h2>
            <p class="description description-primary">Insira seus dados pessoais</p>
            <p class="description description-primary">e comece a sua jornada conosco</p>
            <button id="signup" class="btn btn-primary">criar conta</button>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Faça o login</h2>
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
                <p class="description description-second">ou use sua conta de e-mail:</p>
                <form class="form" method="post" action="http://localhost/github-clone/Plataforma-de-Agendamento/cadastro.php" >
                
                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        E-mail:<input name="email" type="email" placeholder="Email" maxlength="200">
                    </label>
                
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        Senha:<input name='senha' type="password" placeholder="Senha" maxlength="200">
                    </label>
                    <input type="submit" value="enviar">
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="js/app.js"></script>
</body>
</html>