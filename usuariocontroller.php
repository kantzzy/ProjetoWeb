<?php

include "usuarioDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$usuarios = new UsuarioDAO();
		$usuarios->nome = $_POST["nome"];
		$usuarios->email = $_POST["email"];
		$usuarios->senha = $_POST["senha"];
		$usuarios->inserir();
		break;

	case 'apagar':
		$usuarios = new UsuarioDAO();
		$id = $_GET["id"];
		$usuarios->apagar($id);
		break;

	case 'editar':
		$usuario = new UsuarioDAO();
		$usuario->id = $_POST["id"];
		$usuario->nome = $_POST["nome"];
		$usuario->email = $_POST["email"];
		$usuario->editar();
		break;

	case 'trocarsenha':
		$usuarios = new UsuarioDAO();
		$id = $_POST["id"];
		$senha = $_POST["senha"];
		$usuarios->trocarsenha($id, $senha);
		break;

	case 'logar':
		$usuarios = new UsuarioDAO();
		$usuarios->email = $_POST["email"];
		$usuarios->senha = $_POST["senha"];
		$usuarios->logar();
		break;

	case 'sair':
		$usuarios = new UsuarioDAO();
		$usuarios->sair();
		break;

	default:
		break;
}
?>