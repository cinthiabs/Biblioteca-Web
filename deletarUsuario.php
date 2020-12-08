<?php
include_once("conexao.php");

$codusuario = filter_input(INPUT_GET,'codusuario',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE from usuarios where codusuario='$codusuario'";
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário deletado com sucesso!";
    header("Location:consultaUsuario.php");
}
?>