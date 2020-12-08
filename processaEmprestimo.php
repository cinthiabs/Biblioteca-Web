<?php
include_once("conexao.php");

$codusuario = $_POST['codusuario'];
$codlivro = $_POST['codlivro'];
$sql = "INSERT INTO `emprestimo`(`codusuario`,`codlivro`) VALUES ('$codusuario','$codlivro')";

$salvar = mysqli_query($conexao,$sql);
 $linhas = mysqli_affected_rows($conexao);

if($codusuario=""&& $codlivro=""){
    echo"Preencha o campo!";
}else if($linhas == 1){
    echo "Cadastro efetuado com sucesso!";
    mysqli_close($conexao);
}else{
     echo"Cadastro não efetuado!";
}

?>