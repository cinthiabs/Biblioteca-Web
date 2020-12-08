<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - USUÁRIO</title>
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

        <section class="sectionUsuario">
        <h1>CADASTRO DE USUÁRIOS</h1>
    <hr> <br>
    <form action="processaUsuario.php" method="POST" class="form">
        <tr>
        <td> Nome Completo: </td> 
        <td><input type="text" name="nome"><br></td>
        </tr>
        <tr>
        <td>Data de Nascimento:</td>
          <td><input type="date" name="data_nascimento"><br></td>
        </tr>
        <tr>
       <td> Grau de Escolaridade:</td>
        <input type="text" name="grau_escolariedade"><br>
        </tr>
        <tr>
       <td>Endereço:</td>
       <td><input type="text" name="endereco"> <br></td>
        </tr>
        <tr>
       <td> Telefone:</td>
      <td><input type="fone" name="telefone"><br> </td>
        </tr>
        <tr>
       <td> Gênero:</td>
      <td><select name="genero">
          <option value="0">Selecione</option>
          <option value="1">Masculino</option>
          <option value="2">Feminino</option>
        </td>
        </select>
        </tr><br>
        <tr>
        <td>E-mail</td>
        <td><input type="e-mail" name="email"> <br></td>
        </tr>
        <div class="botao">
       <input type="submit" value="Adicionar" class="btn">
       <input type="reset" value="Limpar" class="btn">
        <div>
</form>      
  
    </section>
</body>
</html>