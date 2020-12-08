<?php
include_once("conexao.php");

$codlivro = filter_input(INPUT_GET,'codlivro',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE from livros where codlivro='$codlivro'";
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário deletado com sucesso!";
    header("Location:consultaUsuario.php");
}
?>