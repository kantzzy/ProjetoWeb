<?php
require "config.php";
class PerguntaDAO{
	public $questao;
	public $tipo;
	public $enunciado;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}
	public function apagar ($id){
		$sql = "DELETE FROM perguntas WHERE questao= $id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:/perguntas");
		else echo $this->con->error;
	}



	public function inserir(){
		$sql = "INSERT INTO perguntas VALUES (0,'$this->tipo','$this->enunciado')";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:/perguntas");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$sql = "SELECT * FROM perguntas";
		$rs = $this->con->query($sql);
		$listaDePerguntas = array();
		while ($linha = $rs->fetch_object()){
			$listaDePerguntas[] = $linha;
		}
		return $listaDePerguntas;
	}

	

	public function mudarenunciado($id, $enunciado){
		$sql = "UPDATE perguntas SET enunciado='$enunciado' WHERE questao=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:/perguntas");
		else echo $this->con->error; 

	}

}


?>