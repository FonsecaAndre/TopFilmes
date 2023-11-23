<?php 
require_once 'classes/Diretor.php';

$diretor = new Diretor();

$diretor->nome = $_POST['nome'];
$diretor->minibio = $_POST['minibio'];
$diretor->ano_nascimento = $_POST['ano_nascimento'];

$diretor->inserir();
header('Location: diretor-listar.php');
?>