<?php
include_once("conexao.php");

$codusuario = filter_input(INPUT_POST, 'codusuario', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_NUMBER_FLOAT);
$grau_escolariedade = filter_input(INPUT_POST, 'grau_escolariedade', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


$result_usuario = "UPDATE usuarios SET nome='$nome',data_nascimento='$data_nascimento',grau_escolariedade='$grau_escolariedade',telefone='$telefone',genero='$genero',email='$email' WHERE codusuario='$codusuario'";
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_affected_rows($conexao)){
    echo"Usuário editado com sucesso!";
    header("Location:consultaUsuario.php");
}else{
    echo"Usuário não editado!";
    header("Location:editarUsuario.php");
}
?>    