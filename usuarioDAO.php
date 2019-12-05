<?php

require "config.php";

class UsuarioDAO{
	public $nome;
	public $email;
	public $senha;
	private $con;

	function __construct(){
		$rs = $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}
	public function apagar ($id){
		$sql = "DELETE FROM usuarios WHERE usuario=$id";
		$rs = $this->con->query($sql);
		session_start();
		if ($rs){ 
			$_SESSION["success"] = "usuário apagado com sucesso";
		}
		else{
			$_SESSION["danger"] = "erro ao apagar usuário";
		}
		header("Location:/usuarios");
	}



	public function inserir(){
		$sql = "INSERT INTO usuarios VALUES (0,'$this->nome','$this->email', md5('$this->senha') )";
		$rs = $this->con->query($sql);
		if($rs)
			header ("Location:/usuarios");
		else 
			echo $this->con->error;
	}



	public function buscar(){
		$sql = "SELECT * FROM usuarios";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs->fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		return $listaDeUsuarios;
	}


	public function editar(){
		$sql = "UPDATE usuarios SET nome='$this->nome', email='$this->email' WHERE usuario=$this->id";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location:/usuarios");
		else 
			echo $this->con->error;
	}

	public function trocarsenha($id, $senha){
		$sql = "UPDATE usuarios SET senha=md5('$senha1') WHERE usuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location:/usuarios");
		else
		 echo $this->con->error; 

	}

	public function logar () {
		$sql = "SELECT * FROM usuarios WHERE 
		email='$this->email' AND senha=md5('$this->senha')";
		$rs = $this->con->query($sql);
		if($rs->num_rows>0){
			session_start();
			$_SESSION["logado"]= true;
			header("Location:/usuarios");
		} 
		else {
			header("Location:/login");
		}
	}

	public function sair () {
		session_start();
		session_destroy();
		header("Location:/");
		
	}


}


?>