<?php
require_once "classes/Diretor.php";
$id = $_GET['id'];

$diretor = new Diretor($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Top Filmes</title>
</head>
<body>
    <h1>Top Filmes</h1>
    <h3>Atualizar Diretor</h3>
    <form action="diretor-editar-gravar.php" method="POST">

        <input type="hidden" name="id" value="<?= $diretor->id ?>">
        <label for="nome">Nome : </label>        
        <input type="text" name="nome" value="<?= $diretor->nome ?>">
        <br><br>

        <label for="minibio">Mini Bio : </label>
        <input type="text" name="minibio" value="<?= $diretor->minibio ?>">
        <br><br>

        <label for="ano_nascimento">Ano de ano_nascimento : </label>
        <input type="number" name="ano_nascimento" value="<?= $diretor->ano_nascimento ?>">
        <br><br>



        <input type="submit" value="Gravar">
        <button type="button"><a href="diretor-listar.php">Cancelar</a></button>
    </form>
</body>
</html>