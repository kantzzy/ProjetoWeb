<?php

function mostrarAlerta($tipo) {

	if(isset($_SESSION[$tipo])){
			echo "<div class='alert alert-success'>";
			echo $_SESSION["success"];
			echo "</div>";
			unset($_SESSION["success"]);
		}
	else{			
			echo "<div class='alert alert-danger'>";
			echo $_SESSION["danger"];
			echo "</div>";
			unset($_SESSION["danger"]);
		}

	
}

?>