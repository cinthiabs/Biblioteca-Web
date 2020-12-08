<?php
 include_once("conexao.php");
$codlivro=filter_input(INPUT_GET,'codlivro',FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM livros where codlivro='$codlivro'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);  
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

//categoria
$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM categoria where codcategoria like '%$filtro%'";

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
    <script src="https://kit.fontawesome.com/52a2376f49.js" crossorigin="anonymous"></script>
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
    <section class="sectionUsuario"> 
    <h1>EDITAR LIVROS</h1>
    <hr> <br>
    <form action="editarLivro.php" method="POST" class="form">
        <input type="hidden" name="codlivro"value="<?php echo $row_usuario['codlivro']; ?>">
        <tr>
        <td> Nome Completo: </td> 
        <td><input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>"><br></td>
        </tr>
        <tr>
        <td>Autor:</td>
          <td><input type="text" name="autor" value="<?php echo $row_usuario['autor']; ?>" ><br></td>
 
        Data da Publicacao:<input type="text" name="data_publicacao" value="<?php echo $row_usuario['data_publicacao']; ?>" ><br>
    
       <td>Quantidade:</td>
       <td><input type="number" name="quantidade" value="<?php echo $row_usuario['quantidade']; ?>" > <br></td>
        </tr>
        <tr>
       <td> Tema:</td>
      <td><input type="text" name="tema" value="<?php echo $row_usuario['tema']; ?>" ><br></td>
      <tr>
       <td> Categoria:</td>
      <td><select name="categoria"value="<?php echo $row_usuario['categoria']; ?>"  >
      <?php

while ($dados = mysqli_fetch_array($consulta)){
  $codcategoria = $dados[0];
  $categoria = $dados[1];
 
  echo "<option value='$codcategoria'>$categoria</option>";
}
?>
        </td>
        </select>
        </tr><br>
       
        <div class="botao">
       <input type="submit" value="Editar" class="btn">
       
        <div>
</form>      
    </section>
</div>
</body>
</html>
