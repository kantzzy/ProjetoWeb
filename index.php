<?php

if(!isset($_SERVER["PATH_INFO"])) {
	require "login.php"; 
	exit();
}

switch ($_SERVER["PATH_INFO"]) {
	case  "/usuarios":
	case  "/usuario":
		require "usuario.php";
		break;	

	case  "/perguntas":
	case  "/pergunta":
		require "perguntas.php";
		break;

	case  "/alternativas":
	case  "/alternativa":
		require "alternativas.php";
		break;		

	case "/login";
		require "login.php";
		break;

	default:
		echo "Erro 404 - Página não encontrada";
		break;
}


?>