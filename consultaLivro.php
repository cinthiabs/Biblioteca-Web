<?php
include_once("conexao.php");//Criando Consulta de usuario
$codlivro = filter_input(INPUT_GET, 'codlivro', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = "SELECT * from livros where codlivro='$codlivro'";

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM livros where nome like '%$filtro%'";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA - CONSULTA</title>
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
        <section>
            <h1>CONSULTA DE LIVROS CADASTRADOS</h1>
            <hr><br>
            <form action="#" method="get" >
            Filtrar por Nome do Livro: <input type="text" name="filtro" class="campo" required autofocus>
            <input  type="submit" value="Pesquisar" class="btn"><br>
          </form>
           <?php //MOSTRAR REGISTROS DO BANCO
           echo"Resultado da pesquisa com a palavra <strong> $filtro </strong> <br><br>";
          echo "$registros Registros encontrados.";
          echo "<br>";
          echo "<br>";
            while($exibirRegistros = mysqli_fetch_array($consulta)){
                $codlivro = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $autor = $exibirRegistros[2];
                $data_publicacao = $exibirRegistros[3];
                $quantidade = $exibirRegistros[4];
                $tema =$exibirRegistros[5];
                $categoria  = $exibirRegistros[6];
                echo "<article>";
                echo"<hr>"; // Exibindo consulta de Cliente
                    echo "<p><strong>Codigo:</strong> $codlivro</p>";
                    echo "<p><strong>Nome do Livro:</strong> $nome</p>";
                    echo "<p><strong>Autor:</strong> $autor</p>";
                    echo "<p><strong>Data da Publicação:</strong> $data_publicacao</p>";
                    echo "<p><strong>Quantidade:</strong> $quantidade</p>";
                    echo "<p><strong>Tema:</strong> $tema</p>";
                    echo "<p><strong>Categoria:</strong> $categoria</p>";
                
                    echo "<a href='alterarLivro.php?codlivro=".$exibirRegistros['codlivro']."'>Editar</a> ";
                    echo "<a href='deletarLivro.php?codlivro=".$exibirRegistros['codlivro']."'>Excluir</a><br>";
                 echo "</article>";

            }
            mysqli_close($conexao); //fecha banco
           ?>
          
        </section>
    </div>
</body>
</html>