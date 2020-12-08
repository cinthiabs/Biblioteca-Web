<?php
 include_once("conexao.php");
$codusuario=filter_input(INPUT_GET, 'codusuario',FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM usuarios where codusuario='$codusuario'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);  
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - USUÁRIO</title>
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
    <h1>EDITAR USUÁRIOS</h1>
    <hr> <br>
    <form action="editarUsuario.php" method="POST" class="form">
        <input type="hidden" name="codusuario"value="<?php echo $row_usuario['codusuario']; ?>">
        <tr>
        <td> Nome Completo: </td> 
        <td><input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>"><br></td>
        </tr>
        <tr>
        <td>Data de Nascimento:</td>
          <td><input type="date" name="data_nascimento" value="<?php echo $row_usuario['data_nascimento']; ?>" ><br></td>
 
        Grau de Escolaridade:<input type="text" name="grau_escolariedade" value="<?php echo $row_usuario['grau_escolariedade']; ?>" ><br>
    
       <td>Endereço:</td>
       <td><input type="text" name="endereco" value="<?php echo $row_usuario['endereco']; ?>" > <br></td>
        </tr>
        <tr>
       <td> Telefone:</td>
      <td><input type="fone" name="telefone" value="<?php echo $row_usuario['telefone']; ?>" ><br></td>
        </tr>
        <tr>
       <td> Gênero:</td>
      <td><select name="genero"value="<?php echo $row_usuario['genero']; ?>"  >
          <option value="0"></option>
          <option value="1">Masculino</option>
          <option value="2">Feminino</option>
        </td>
        </select>
        </tr><br>
        <tr>
        <td>E-mail</td>
        <td><input type="e-mail" name="email" value="<?php echo $row_usuario['email']; ?>" > <br></td>
        </tr>
        <div class="botao">
       <input type="submit" value="Editar" class="btn">
       
        <div>
</form>      
    </section>
</div>
</body>
</html>
