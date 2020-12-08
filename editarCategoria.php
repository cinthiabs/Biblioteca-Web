<?php
include_once("conexao.php");

$codcategoria = filter_input(INPUT_POST, 'codcategoria', FILTER_SANITIZE_NUMBER_INT);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE categoria SET categoria='$categoria'where codcategoria='$codcategoria'";

$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário editado com sucesso!";
    header("Location:categoria.php");
}else{
    echo"Usuário não editado!";
    header("Location:editarCategoria.php");
}
?>