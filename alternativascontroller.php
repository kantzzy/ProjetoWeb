<?php

include "alternativasDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$alternativas = new AlternativasDAO();
		$alternativas->texto = $_POST["texto"];
		$alternativas->idQuestao = $_POST["idQuestao"];
		if (isset($_POST["verdadeiro"])) $alternativas->verdadeiro = 1;
		else $alternativas->verdadeiro = 0;
		$alternativas->inserir();
		break;

	case 'apagar':
		$alternaivas = new AlternativasDAO();
		$id = $_GET["id"];
		$idQuestao = $_GET["idQuestao"]
		$alternativas->apagar($id, $idQuestao);
		break;

	case 'alterar':
		$alternativas = new AlternativasDAO();
		$alternativas->texto = $_POST["texto"];
		$alternativas->tipo = $_POST["tipo"];
		$alternativas->alterar();
		break;

	default:
		break;
}
?>