<?php
//Inclui o arquivo que  contem a  classe Turma
require_once "classes/Filme.php";
$filme = new Filme();

//Chamao  metodo "listar" e  armazena o resultado em  uma variável
$listaFilmes = $filme->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Filmes </title>
</head>
<body>

<h1>Top Filmes</h1>
    <h3>Listar Filmes</h3>

    <table border ="1">
        <tr> 
            <th>Código</th>
            <th>Titulo</th>
            <th>Imagem</th>
            <th>Sinopse</th>
            <th>Ano de Lançamento</th>
            <th>Duração em Minutos</th>
            <th>Nota IMDB</th>
            <th>Diretor</th>
            <th>Açôes</th>   
            
        </tr>
        <?php foreach ($listaFilmes as $linha ): ?>

            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha['titulo'] ?></td>
                <td><img src="img/<?php echo $linha['img_cartaz'] ?>" alt="Foto do Filme" height="100"></td>
                <td><?php echo $linha['sinopse'] ?></td>
                <td><?php echo $linha['ano_lancamento']?></td>
                <td><?php echo $linha['duracao']?></td>
                <td><?php echo $linha['nota_imdb']?></td> 
                <th><?php echo $linha['nome'] ?></td>
                <td>
                    
                    <a href="filme-editar.php?id=<?= $linha['id'] ?>">Atualizar</a></a>
                    <a href="filme-excluir.php?id=<?= $linha['id'] ?>">Excluir</a>
                </td>
            </tr>

          

        <?php endforeach ?>
        </table>
        <br>
        <a href="cad_filme.php">Cadastrar Filme</a>
        <br><br>
        <button type="button"><a href="index.html">Menu Principal</a></button>


        
</body>
</html>
