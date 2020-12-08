<?php
$hostname ='localhost';
$user ='root';
$password ='';
$database ='biblioteca';
$conexao = mysqli_connect($hostname, $user, $password, $database);

if(!$conexao){
    echo "Falha na Conexao com o Banco de dados";
}

?>