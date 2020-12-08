<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$grau_escolariedade = $_POST['grau_escolariedade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$email = $_POST['email'];

$sql = "INSERT INTO `usuarios`(`nome`, `data_nascimento`, `grau_escolariedade`, `endereco`, `telefone`, `genero`, `email`)VALUES('$nome','$data_nascimento','$grau_escolariedade','$endereco','$telefone','$genero','$email')";
$salvar = mysqli_query($conexao,$sql);
 $linhas = mysqli_affected_rows($conexao);

if($nome="" && $data_nascimento="" && $grau_escolariedade="" && $endereco="" && $telefone="" && $genero="" && $email="" ){
    echo "Preecha todos os campos!";
   
}else if($linhas == 1){
   echo "Cadastro efetuado com sucesso!";
   mysqli_close($conexao);
}else{
    echo"Cadastro não efetuado!";
}

?>