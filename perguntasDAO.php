<?php
require_once "config.php";
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
		session_start();
		if ($rs){ 
			$_SESSION["success"] = "Questão apagada com sucesso";
		}
		else{
			$_SESSION["danger"] = "Erro ao apagar questão";
		}
		header("Location:/perguntas");
	}



	public function inserir(){
		$sql = "INSERT INTO perguntas VALUES (0,'$this->tipo','$this->enunciado')";
		$rs = $this->con->query($sql);
		session_start();
		if ($rs){ 
			$_SESSION["success"] = "Questão inserida com sucesso";
		}
		else{
			$_SESSION["danger"] = "Erro ao inserir questão";
		}
		header("Location:/perguntas");
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
		session_start();
		if ($rs){ 
			$_SESSION["success"] = "Questão editada com sucesso";
		}
		else{
			$_SESSION["danger"] = "Erro ao editar questão";
		}
		header("Location:/perguntas");

	}

	public function mudaralternativa($id, $texto){
		$sql = "UPDATE alternativas SET texto='$texto' WHERE questao=$id";
		session_start();
		$rs = $this->con->query($sql);
		if ($rs){ 
			$_SESSION["success"] = "Alternativa alterada com sucesso";
		}
		else{
			$_SESSION["danger"] = "Erro ao alterar alternativa";
		}
		header("Location:/perguntas");

	}

	public function buscarPorId(){
		$sql = "SELECT * FROM perguntas WHERE questao=$this->questao";
		$rs = $this->con->query($sql);
		if ($linha = $rs->fetch_object()){
			$this->enunciado = $linha->enunciado;
			$this->tipo = $linha->tipo;
	}



}
}
?>
