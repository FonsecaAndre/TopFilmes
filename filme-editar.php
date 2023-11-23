<?php
  
    
    require_once "classes/Filme.php";
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    

    if ($id !== null && $id !== "") {
        $filme = new Filme($id);
    }
    else {
        echo "Id não fornecido ou  invalido.";
    }
    


    require 'classes/Diretor.php';
    $diretor = new Diretor();
    $lista = $diretor->listar();
    
    
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Top Filmes - Editar</title>
</head>
<body>

    <h1>Top Filmes</h1>
    <h3>Atualizar Filme</h3>

    <form action="filme-editar-gravar.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $filme->id ?>">

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $filme->titulo ?>">
        <br><br>
        
        <label for="cartaz"> Imagem: </label>
        <input type="file" name="imgcartaz" id="imgcartaz">
        <br><br>

        <label for="sinopse">Sinopse:</label>
        <textarea name="sinopse" id="sinopse" rows="4" cols="30"><?= $filme->sinopse ?></textarea>
        <br><br>

        <label for="ano_lancamento">Ano de Lançamento:</label>
        <input type="number" name="ano_lancamento" id="ano_lancamento" value="<?= $filme->ano_lancamento  ?>">
        <br><br>

        <label for="duracao"> Duração em minutos: </label>
        <input type="number" name="duracao" id="duracao" value="<?= $filme->duracao ?>">
        <br><br>

        <label for="nota_imdb"> Nota IMDB: </label>
        <input type="text" name="nota_imdb" id="nota_imdb"  value="<?= $filme->nota_imdb ?>">
        <br><br>

        <label for="seldiretor">Diretor: </label>
        <select name="seldiretor" id="seldiretor">
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

        
        <input type="submit" value="Atualizar">
        <button type="button"><a href="filme-listar.php">Cancelar</a></button>

    </form>

</body>

</html>