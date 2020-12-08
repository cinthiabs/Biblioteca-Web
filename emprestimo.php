<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - EMPRESTIMO</title>
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
    <h1>CADASTRO DE LIVRO EMPRESTADO</h1>
    <hr> <br>
    <form action="processaEmprestimo.php" method="POST" class="form">
        <tr>
        <td> Código do Usuário: </td> 
        <td><input type="text" name="codusuario"><br></td>
        </tr>
        <tr>
        <td> Código do Livro: </td> 
        <td><input type="text" name="codlivro"><br></td>
        </tr>        
        
        <div class="botao">
        <input type="submit" value="Adicionar" class="btn">
       <input type="reset" value="Limpar" class="btn">
        </div>
    </form>
    <?php
include_once("conexao.php");//Criando Consulta de emprestimo
$codemprestimo = filter_input(INPUT_GET, 'codemprestimo', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = "SELECT * from emprestimo where codemprestimo='$codemprestimo'";

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM emprestimo where codemprestimo like '%$filtro%'";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>

<h3 class="titulocategoria">Pesquisar registro</h3> 
            <hr><br>
            <form action="#" method="get" >
            Filtrar por Código: <input type="text" name="filtro" class="campo" required autofocus>
            <input  type="submit" value="Pesquisar" class="btn"><br>
          </form>
           <?php //MOSTRAR REGISTROS DO BANCO
           echo"Resultado da pesquisa com a palavra <strong> $filtro </strong> <br><br>";
          echo "$registros Registros encontrados.";
          echo "<br>";
          echo "<br>";
            while($exibirRegistros = mysqli_fetch_array($consulta)){
                $codemprestimo = $exibirRegistros[0];
                $codusuario = $exibirRegistros[1];
                $codlivro = $exibirRegistros[2];
               
                echo "<article>";
                echo"<hr>"; // Exibindo consulta 
                    echo "<p><strong>Código:</strong> $codemprestimo</p>";
                    echo "<p><strong>Código do Usuário:</strong> $codusuario</p>";
                    echo "<p><strong>Código do Livro:</strong> $codlivro</p>";
           
                 echo "</article>";

            }
            mysqli_close($conexao); //fecha banco
           ?>
     
  
    </section>
</body>
</html>