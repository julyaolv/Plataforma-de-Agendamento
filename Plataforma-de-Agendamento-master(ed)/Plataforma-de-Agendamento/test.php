<?php
 $host='localhost';
 $usuario='root';
 $senha='';
 $banco='agenda';

 $conexao=new mysqli($localhost,$root,$agenda);
 if ($conexao->connect_error){
    die("Conexão falhou: ". $conexao->connect_error);
 }

?>