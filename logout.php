<?php
ob_start();
session_start();
 session_destroy();
	unset($_SESSION['UNameName']);
	unset($_SESSION['UNameEmail']);
	header("Location: index.php");

?>