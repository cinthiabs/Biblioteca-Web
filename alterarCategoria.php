<?php
 include_once("conexao.php");
$codcategoria=filter_input(INPUT_GET, 'codcategoria',FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM categoria where codcategoria='$codcategoria'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);  
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - CATEGORIA</title>
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
    <h1>EDITAR CATEGORIA</h1>
    <hr> <br>
    <form action="editarCategoria.php" method="POST" class="form">
        <input type="hidden" name="codcategoria"value="<?php echo $row_usuario['codcategoria']; ?>">
        <tr>
        <td> Nome da Categoria: </td>
        <td><input type="text" name="categoria" value="<?php echo $row_usuario['categoria']; ?>"><br></td>
        </tr>
        <div class="botao">
       <input type="submit" value="Editar" class="btn">
      
        <div>
        <div>
</form>      
    </section>
</div>
</body>
</html>
