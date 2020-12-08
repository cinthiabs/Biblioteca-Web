<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - CATEGORIA</title>
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
    <h1>CADASTRO DE CATEGORIA</h1>
    <hr> <br>
    <form action="processaCategoria.php" method="POST" class="form">
        <tr>
        <td> Nome da categoria: </td> 
        <td><input type="text" name="categoria"><br></td>
        </tr>
        
        <div class="botao">
        <input type="submit" value="Adicionar" class="btn">
       <input type="reset" value="Limpar" class="btn">
        </div>
        <br>

    </form>
 
 <?php
include_once("conexao.php");//Criando Consulta de categoria
$codcategoria = filter_input(INPUT_GET, 'codcategoria', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = "SELECT * from categoria where codcategoria='$codcategoria'";

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM categoria where categoria like '%$filtro%'";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>

<h3 class="titulocategoria">Pesquisar registro</h3> 
            <hr><br>
            <form action="#" method="get" >
            Filtrar por Nome da Categoria: <input type="text" name="filtro" class="campo" required autofocus>
            <input  type="submit" value="Pesquisar" class="btn"><br>
          </form>
           <?php //MOSTRAR REGISTROS DO BANCO
           echo"Resultado da pesquisa com a palavra <strong> $filtro </strong> <br><br>";
          echo "$registros Registros encontrados.";
          echo "<br>";
          echo "<br>";
            while($exibirRegistros = mysqli_fetch_array($consulta)){
                $codcategoria = $exibirRegistros[0];
                $categoria = $exibirRegistros[1];
               
                echo "<article>";
                echo"<hr>"; // Exibindo consulta 
                    echo "<p><strong>Codigo:</strong> $codcategoria</p>";
                    echo "<p><strong>Nome da Categoria:</strong> $categoria</p>";
                    echo "<a href='alterarCategoria.php?codcategoria=".$exibirRegistros['codcategoria']."'>Editar</a> ";
                    echo "<a href='deletarCategoria.php?codcategoria=".$exibirRegistros['codcategoria']."'>Excluir</a><br>";
                 echo "</article>";

            }
            mysqli_close($conexao); //fecha banco
           ?>
     
    </div>

  
    </section>
</body>
</html>