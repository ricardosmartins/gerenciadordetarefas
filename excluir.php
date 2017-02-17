<?php
function __autoload($class_name){
	require_once 'classes/' . $class_name . '.php';
}

$id = $_POST['id'];
$tarefa = new Tarefas();
$delete = $tarefa->delete($id);


echo $delete;