<?php
 $host="localhost";
 $usuario="root";
 $senha="";
 $banco="agenda";

 $conexao= mysqli_connect($host,$usuario, $senha,$banco);
 if (!$conexao){
    die("Conexão falhou: ". mysqli_connect_errno());
 } else{
   echo'deu certo';
 }
?>