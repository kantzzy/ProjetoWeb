<?php

switch ($_SERVER["PATH_INFO"]) {
	case  "/usuarios":
	case  "/usuario":
		require "usuario.php";
		break;	

	case  "/perguntas":
	case  "/pergunta":
		require "perguntas.php";
		break;	


	default:
		echo "Erro 404 - Página não encontrada";
		break;
}


?>