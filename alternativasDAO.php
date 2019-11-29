<?php
require_once "config.php";
class AlternativasDAO{
	public $texto;
	public $correta;
	public $idQuestao;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}
	public function apagar ($id){
		$sql = "DELETE FROM alternativas WHERE alternativas=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:/alternativas");
		else echo $this->con->error; 
	}



	public function inserir(){
		$sql = "INSERT INTO alternativas VALUES (0,'$this->texto','$this->correta','$this->idQuestao')";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:/alternativas?idQuestao=$this->idQuestao");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$sql = "SELECT * FROM alternativas WHERE idQuestao = '$this->idQuestao'";
		$rs = $this->con->query($sql);
		$listaDeAlternativas = array();
		while ($linha = $rs->fetch_object()){
			$listaDeAlternativas[] = $linha;
		}
		return $listaDeAlternativas;
	}

	

	public function trocaralternativa($id, $correta){
		$sql = "UPDATE alternativas SET correta='$correta1' WHERE alternativa=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:/alternativas");
		else echo $this->con->error; 

	}

		public function buscarPorId(){
		$sql = "SELECT * FROM alternativas WHERE questao=$this->idQuestao";
		$rs = $this->con->query($sql);
		if ($linha = $rs->fetch_object()){
			$this->texto = $linha->texto;
			$this->correta = $linha->correta;
	}

}

}
?>