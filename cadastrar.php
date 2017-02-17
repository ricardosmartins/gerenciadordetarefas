<?php
function __autoload($class_name){
	require_once 'classes/' . $class_name . '.php';
}
$tarefa = new Tarefas();

$tarefa->setTitulo( utf8_decode($_POST['titulo']) );
$tarefa->setDescricao( utf8_decode($_POST['descricao']) );
$result = $tarefa->insert();


echo $result;