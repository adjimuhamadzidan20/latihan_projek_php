<?php  
	session_start();

	// destroy session
	$_SESSION = [];
	session_unset();
	session_destroy();

	header('Location: ../login_user.php');
	exit;

?>