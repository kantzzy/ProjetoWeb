<?php

class PerguntaDAO{
	public $nome;
	public $email;
	public $senha;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect("localhost:3307", "root", "", "projetopw");
	}
	public function apagar ($id){
		$sql = "DELETE FROM perguntas WHERE questao=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:perguntas.php");
		else echo $this->con->error; 
	}



	public function inserir(){
		$con = mysqli_connect("localhost:3307","root","","projetopw");
		$sql = "INSERT INTO perguntas VALUES (0,'$this->questao','$this->enunciado', $this->tipo )";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:perguntas.php");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$con = mysqli_connect("localhost:3307", "root", "", "projetopw");
		$sql = "SELECT * FROM perguntas";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs->fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		return $listaDeUsuarios;
	}

	

	public function trocarsenha($id, $senha){
		$sql = "UPDATE perguntas SET senha=md5($senha) WHERE questao=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:usuario.php");
		else echo $this->con->error; 

	}

}


?>