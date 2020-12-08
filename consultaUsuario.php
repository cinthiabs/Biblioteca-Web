<?php
include_once("conexao.php");//Criando Consulta de usuario
$codusuario = filter_input(INPUT_GET, 'codusuario', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = "SELECT * from usuarios where codusuario='$codusuario'";

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql ="SELECT *FROM usuarios where nome like '%$filtro%'";

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
            <h1>CONSULTA DE USUÁRIOS CADASTRADOS</h1>
            <hr><br>
            <form action="#" method="get" >
            Filtrar por Nome do Usuário: <input type="text" name="filtro" class="campo" required autofocus>
            <input  type="submit" value="Pesquisar" class="btn"><br>
          </form>
           <?php //MOSTRAR REGISTROS DO BANCO
           echo"Resultado da pesquisa com a palavra <strong> $filtro </strong> <br><br>";
          echo "$registros Registros encontrados.";
          echo "<br>";
          echo "<br>";
            while($exibirRegistros = mysqli_fetch_array($consulta)){
                $codusuario = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $data_nascimento = $exibirRegistros[2];
                $grau_escolariedade = $exibirRegistros[3];
                $endereço = $exibirRegistros[4];
                $telefone =$exibirRegistros[5];
                $genero  = $exibirRegistros[6];
                $email  = $exibirRegistros[7];
                echo "<article>";
                echo"<hr>"; // Exibindo consulta de Cliente
                    echo "<p><strong>Codigo:</strong> $codusuario</p>";
                    echo "<p><strong>Nome Completo:</strong> $nome</p>";
                    echo "<p><strong>Data de Nascimento:</strong> $data_nascimento</p>";
                    echo "<p><strong>Escolariedade:</strong> $grau_escolariedade</p>";
                    echo "<p><strong>Endereço:</strong> $endereço</p>";
                    echo "<p><strong>Telefone:</strong> $telefone</p>";
                    echo "<p><strong>Gênero:</strong> $genero</p>";
                    echo "<p><strong>E-mail:</strong> $email</p>";
                    echo "<a href='alterarUsuario.php?codusuario=".$exibirRegistros['codusuario']."'>Editar</a> ";
                    echo "<a href='deletarUsuario.php?codusuario=".$exibirRegistros['codusuario']."'>Excluir</a><br>";
                 echo "</article>";

            }
            mysqli_close($conexao); //fecha banco
           ?>
          
        </section>
    </div>
</body>
</html>