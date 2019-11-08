<?php

include "alternativasDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case 'inserir':
		$alternativas = new UsuarioDAO();
		$alternativas->texto = $_POST["texto"];
		$alternativas->correta = $_POST["correta"];
		$alternativas->inserir();
		break;

	case 'apagar':
		$alternaivas = new AlternativasDAO();
		$id = $_GET["id"];
		$alternativas->apagar($id);
		break;

	case 'trocarsenha':
		$usuarios = new AlternativasDAO();
		$id = $_POST["id"];
		$senha = $_POST["senha"];
		$alternativass->trocarsenha($id, $senha);
		break;

	default:
		break;
}
?>