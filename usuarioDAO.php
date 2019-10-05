<?php

class UsuarioDAO{
	public $nome;
	public $email;
	public $senha;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect("localhost:3306", "root", "", "projetopw");
	}
	public function apagar ($id){
		$sql = "DELETE FROM usuarios WHERE usuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:usuario.php");
		else echo $this->con->error; 
	}



	public function inserir(){
		$con = mysqli_connect("localhost:3306","root","","projetopw");
		$sql = "INSERT INTO usuarios VALUES (0,'$this->nome','$this->email', md5('$this->senha') )";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:usuario.php");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$con = mysqli_connect("localhost:3306", "root", "", "projetopw");
		$sql = "SELECT * FROM usuarios";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs->fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		return $listaDeUsuarios;
	}

	

	public function trocarsenha($id, $senha){
		$sql = "UPDATE usuarios SET senha=md5('$senha1') WHERE usuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location:usuario.php");
		else echo $this->con->error; 

	}

}


?>