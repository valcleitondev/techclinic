<?php
	if (!isset($_SESSION)) {
		session_start();
	}if (!isset($_SESSION['id'])) {
		session_destroy();
		header("location: modulos/login/login.php");
	}

?>