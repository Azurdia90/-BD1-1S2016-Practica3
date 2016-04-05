<?php
	session_start();
	unset($_SESSION["ss_user"]);
	session_destroy();
	header("Location: index.php");
	exit;
?>