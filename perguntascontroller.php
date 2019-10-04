<?php

include "perguntasDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$perguntas = new PerguntaDAO();
		$perguntas->nome = $_POST["nome"];
		$perguntas->email = $_POST["email"];
		$perguntas->senha = $_POST["senha"];
		$perguntas->inserir();
		break;

	case 'apagar':
		$perguntas = new PerguntaDAO();
		$id = $_GET["id"];
		$perguntas->apagar($id);
		break;

	case 'trocarsenha':
		$perguntas = new DAO();
		$id = $_POST["id"];
		$senha = $_POST["senha"];
		$perguntas->trocarsenha($id, $senha);
		break;

	default:
		break;
}
?>