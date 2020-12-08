<?php
include_once("conexao.php");

$codlivro = filter_input(INPUT_POST, 'codlivro', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$data_publicacao = filter_input(INPUT_POST, 'data_publicacao', FILTER_SANITIZE_NUMBER_FLOAT);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$tema = filter_input(INPUT_POST, 'tema', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE livros SET nome='$nome',autor='$autor',data_publicacao='$data_publicacao',quantidade='$quantidade',tema='$tema',categoria='$categoria' WHERE codlivro='$codlivro'";
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário editado com sucesso!";
    header("Location:consultaLivro.php");
}else{
    echo"Usuário não editado!";
    header("Location:editarLivro.php");
}
?>    