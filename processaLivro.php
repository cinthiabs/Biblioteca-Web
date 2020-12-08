<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$autor = $_POST['autor'];
$data_publicacao = $_POST['data_publicacao'];
$quantidade = $_POST['quantidade'];
$tema = $_POST['tema'];
$categoria = $_POST['categoria'];


$sql = "INSERT INTO `livros`(`nome`,`autor`, `data_publicacao`, `quantidade`, `tema`, `categoria`)VALUES('$nome','$autor','$data_publicacao','$quantidade','$tema','$categoria')";
$salvar = mysqli_query($conexao,$sql);
 $linhas = mysqli_affected_rows($conexao);

if($nome="" && $autor=""&& $data_publicacao=""&& $quantidade="" && $tema="" && $categoria=""){
    echo "Preecha todos os campos!";
   
}else if($linhas == 1){
   echo "Cadastro efetuado com sucesso!";
  
}else{
    echo"Cadastro não efetuado!";
}

?>