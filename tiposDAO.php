<?php

class TiposDAO{
	public $nome;
	public $email;
	public $senha;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}
	public function apagar ($id){
		$sql = "DELETE FROM tiposquestoes WHERE tipos=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:tipos.php");
		else echo $this->con->error; 
	}



	public function inserir(){
		$sql = "INSERT INTO tiposquestoes VALUES (0,'$this->nome','$this->email', md5('$this->senha') )";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:tipos.php");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$sql = "SELECT * FROM tiposquestoes";
		$rs = $this->con->query($sql);
		$listaDeTipos = array();
		while ($linha = $rs->fetch_object()){
			$listaDeTipos[] = $linha;
		}
		return $listaDeTipos;
	}

	

	public function trocartipo($id, $tipos){
		$sql = "UPDATE tiposquestoes SET tipos='$tipos1' WHERE tipos=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:tipos.php");
		else echo $this->con->error; 

	}

}


?>