<?php
$host="Localhost";
$usuario="root";
$senha="";
$banco="agendapj";

$conexao= mysqli_connect($host,$usuario,$senha,$banco);
if (!$conexao){
    die("Conexão falhou:". mysqli_connect_erno());

} else{
    echo"deu certo";
    }

?>