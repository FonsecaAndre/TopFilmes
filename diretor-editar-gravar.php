<?php
require_once "classes/Diretor.php"; 

$id = $_POST['id'];
$diretor = new Diretor($id);

$diretor->nome = $_POST['nome'];
$diretor->minibio = $_POST['minibio'];
$diretor->ano_nascimento = $_POST['ano_nascimento'];


$diretor->atualizar();

header('Location: diretor-listar.php');
?>