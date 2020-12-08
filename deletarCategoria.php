<?php
include_once("conexao.php");

$codcategoria = filter_input(INPUT_GET,'codcategoria',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE from categoria where codcategoria='$codcategoria'";
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário deletado com sucesso!";
    header("Location:categoria.php");
}
?>