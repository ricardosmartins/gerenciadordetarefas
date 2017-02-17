<?php

require_once 'Crud.php';

class Tarefas extends Crud{
	
	protected $table = 'tarefas';
	private $titulo;
	private $descricao;

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (titulo, descricao) VALUES (:titulo, :descricao)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo);
		$stmt->bindParam(':descricao', $this->descricao);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET titulo = :titulo, descricao = :descricao WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}