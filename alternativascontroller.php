<?php

include "alternativasDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$alternativa = new AlternativasDAO();
		$alternativa->texto = $_POST["texto"];
		$alternativa->idQuestao = $_POST["idQuestao"];
		if (isset($_POST["verdadeiro"])) $alternativa->verdadeiro = 1;
		else $alternativa->verdadeiro = 0;
		$alternativa->inserir();
		break;

	case 'apagar':
		$alternativas = new AlternativasDAO();
		$id = $_GET["id"];
		$idQuestao = $_GET["idQuestao"];
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