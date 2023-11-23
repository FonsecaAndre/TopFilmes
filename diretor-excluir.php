<?php
require_once "classes/Diretor.php";
$id = $_GET['id'];

$diretor = new Diretor($id);

$diretor->excluir();

header('Location: diretor-listar.php');

?>