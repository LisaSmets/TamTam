<?php
	session_start();
	//sessie verwijderen

	session_destroy();

	header("Location: login.php");
?>