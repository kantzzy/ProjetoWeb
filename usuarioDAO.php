<?php


class UsuarioDAO{
	public $nome;
	public $email;
	public $senha;
	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost:3308", "root", "", "projetopw");

	}

	public function inserir(){
		$sql = "INSERT INTO usuarios VALUES(0, '$this->nome', '$this->email', '$this->senha')";
		$rs = $this->con->query($sql);

		if ($rs)

			header("Location:usuario.php");

		else 
			echo $this->con->error;

	}

	public function buscar(){
		$sql = "SELECT * FROM usuarios";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while($linha = $rs->fetch_object()) {

			$listaDeUsuarios[] = $linha;

		}

		return $listaDeUsuarios;


	}

	public function apagar($id){

		$sql = "DELETE FROM usuarios WHERE usuario =$id";
		$rs = $this->con->query($sql);
		if ($rs)

			header("Location:usuario.php");

		else 
			echo $this->con->error;
	}


}


?>