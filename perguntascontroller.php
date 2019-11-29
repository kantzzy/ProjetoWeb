<?php

include "perguntasDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$perguntas = new PerguntaDAO();
		$perguntas->tipo = $_POST["tipo"];
		$perguntas->enunciado = $_POST["enunciado"];
		$perguntas->inserir();
		break;

	case 'apagar':
		$perguntas = new PerguntaDAO();
		$id = $_GET["id"];
		$perguntas->apagar($id);
		break;

	case 'mudarenunciado':
		$perguntas = new PerguntaDAO();
		$id = $_POST["id"];
		$enunciado = $_POST["enunciado"];
		$perguntas->mudarenunciado($id, $enunciado);
		break;

	case 'mudaralternativas':
		$perguntas = new PerguntaDAO();
		$id = $_POST["id"];
		$texto = $_POST["texto"];
		$perguntas->mudaralternativa($id, $texto);
		break;

	default:
		break;
}
?>