<?php

require_once "classes/Diretor.php";

$diretor = new Diretor();
$lista = $diretor->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Filmes</title>
</head>
<body>
    <h1>Top Filmes</h1>
    <h3>Listar Diretores</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Mini Bio</th>
            <th>Ano de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo $linha['minibio'] ?></td>
            <td><?php echo $linha['ano_nascimento'] ?></td>
            <td>
                <a href="diretor-editar.php?id=<?= $linha['id'] ?>">Atualizar</a>
                <a href="diretor-excluir.php?id=<?= $linha['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="cad_diretor.html">Cadastrar Diretor</a>
    <br><br>
        <button type="button"><a href="index.html">Menu Principal</a></button>
</body>
</html>

 
