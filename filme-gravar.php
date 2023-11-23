<?php
//Inclui o arquivo que  contem a  definição da  classe Turma
require_once "classes/Filme.php";
//Cria um novo objeto turma
$filme = new Filme();

//define as  propriedades descTurma e ano do objeto turma
//com valores  enviados pelo formulario
$filme->titulo = $_POST['titulo'];
$filme->img_cartaz = $_FILES['imgcartaz'];
$filme->sinopse = $_POST['sinopse'];
$filme->ano_lancamento = $_POST['ano_lancamento'];
$filme->diretor_id = $_POST['seldiretor'];
$filme->duracao = $_POST['duracao'];
$filme->nota_imdb = $_POST['nota_imdb'];

//Chama o metodo inserir() no objeto Turma para  inserir
//os  dados da  nova turma no banco de  dados
$filme->inserir();

header('Location: filme-listar.php');
?>

