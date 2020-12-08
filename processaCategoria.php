<?php
include_once("conexao.php");

$categoria = $_POST['categoria'];


$sql = "INSERT INTO `categoria`(`categoria`)VALUES('$categoria') ";
$salvar = mysqli_query($conexao,$sql);
$linhas = mysqli_affected_rows($conexao);

if($categoria=""){
    echo"Preencha o campo!";
    header("Location:categoria.php");
}else if($linhas == 1){
    echo "Cadastro efetuado com sucesso!";
    header("Location:categoria.php");
     mysqli_close($conexao);
}else{
     echo"Cadastro não efetuado!";
     header("Location:categoria.php");
}

?>