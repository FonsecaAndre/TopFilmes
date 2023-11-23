<?php

    require_once "classes/Filme.php";

    $id = $_POST['id'];
    $filme = new Filme($id);


    $filme->titulo = $_POST['titulo'];
    $filme->img_cartaz = $_FILES['imgcartaz'];
    $filme->sinopse = $_POST['sinopse'];
    $filme->ano_lancamento = $_POST['ano_lancamento'];
    $filme->duracao = $_POST['duracao'];
    $filme->nota_imdb = $_POST['nota_imdb'];
    $filme->diretor_id = $_POST['seldiretor'];
    


    $filme->atualizar();

    header('Location: filme-listar.php');
    exit();
    
?>