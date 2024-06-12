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

