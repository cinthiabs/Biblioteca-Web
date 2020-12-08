<?php
include_once("conexao.php");
$codcategoria= filter_input(INPUT_GET, 'codcategoria', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = "select * from categoria where codcategoria='$codcategoria'";

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM categoria where categoria like '%$filtro%'";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - LIVRO</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
<div class="container">
        <nav>
        <h1 class="titulo">MENU</h1>
            <ul class="menu">
            <a href="index.php"><li>Home</li></a>
            <a href="categoria.php"><li>Categoria</li></a>  
            <a href="livro.php"> <li>Cadastro de Livros</li></a>
            <a href="usuario.php"><li>Cadastro de Usuários</li></a>  
            <a href="consultaLivro.php"><li>Consultar Livro</li></a>  
            <a href="consultaUsuario.php"><li>Consultar Usuário</li></a>  
            <a href="emprestimo.php"><li>Emprestimo</li></a>  
            </ul>
        </nav>

        <section class="section">
    <h1>CADASTRO DE LIVRO</h1>
    <hr> <br>
    <form action="processaLivro.php" method="POST" class="form">
        <tr>
        <td> Nome do Livro: </td> 
        <td><input type="text" name="nome"><br></td>
        </tr>
        <tr>
        <td>Autor:</td>
          <td><input type="text" name="autor"><br></td>
        </tr>
        <tr>
        <td>Data da Publicação:</td>
          <td><input type="date" name="data_publicacao"><br></td>
        </tr>
        
        <tr>
        Quantidade de Cópias:<input type="number" name="quantidade"><br>
        </tr>
        <tr>
       <td>Tema:</td>
       <td><input type="text" name="tema"> <br></td>
        </tr>
        <tr>
       <td> Categoria:</td>
      <td><select name="categoria">
        <option value="0" selected="selected">Selecione a categoria</option>
          <?php

          while ($dados = mysqli_fetch_array($consulta)){
            $codcategoria = $dados[0];
            $categoria = $dados[1];
           
            echo "<option value='$codcategoria'>$categoria</option>";
          }
          
          ?>
         <!-- <option value="0"></option>
          <option value="1">Romance</option>
          <option value="2">Poesia</option>
          <option value="3">Infanto-Juvenil</option>
          <option value="4">Auto-Ajuda</option>
          <option value="5">Conto</option>
          <option value="6">Biografia</option>
          <option value="7">Crônica</option>-->
        </td>
        </select>
        </tr>
        <br><br>
        
        <div class="botao">
        <input type="submit" value="Adicionar" class="btn">
       <input type="reset" value="Limpar" class="btn">
        </div>
    </form>
  
    </section>
</body>
</html>