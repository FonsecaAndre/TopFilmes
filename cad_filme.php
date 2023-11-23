<?php
    require_once "classes/Diretor.php";
    $diretor = new Diretor();
    $lista = $diretor->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Filmes</title>
</head>
<body>

    <h1>Top Filmes</h1>

    <h3> Novo Filme </h3>
    


    <form enctype="multipart/form-data" action="filme-gravar.php" method="POST">

        <label for="titulo"> Titulo : </label>
        <input type="text" name="titulo">
        <br><br>

        <label for="cartaz"> Imagem : </label>
        <input type="file" name="imgcartaz">
        <br><br>

        <label for="sinopse"> Sinopse : </label><br>
        <textarea type="text" name="sinopse" rows="6" cols="45"></textarea>
        <br><br>

        <label for="ano_lancamento"> Ano de Lançamento : </label>
        <input type="number" name="ano_lancamento">
        <br><br>

        <label for="seldiretor">Diretor : </label>
        <select name="seldiretor">
            <option value="">Selecione...</option>
            <?php
            
                foreach ($lista as $linha):
                    echo "<option value='{$linha['id']}'>
                                          {$linha['nome']}
                           </option>";
                endforeach
            ?>
        </select> 
       
        <br><br>                 

        <label for="duracao"> Duração em minutos : </label>
        <input type="number" name="duracao">
        <br><br>

        <label for="nota_imdb"> Nota IMDB : </label>
        <input type="text" name="nota_imdb">
        <br><br>     



        <input type="submit" value="Gravar">
        <br><br>
        <button type="button"><a href="filme-listar.php">Listar Filmes</a></button>
        <br><br>
        <button type="button"><a href="index.html">Menu Principal</a></button>

        
    </form>

</body>
</html>
