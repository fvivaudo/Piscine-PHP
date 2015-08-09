<?php
	include 'auth.php';
	session_start();
	$user = $user[['login', 'passwd']];
	if ($_GET['passwd'])
		$user['passwd'] = hash("whirlpool", $_GET['passwd']);
	$user['login'] = $_GET['login'];
	$data = $data[[['passwd', 'login']]];
	if (file_exists ("../private/passwd"))
		$data = unserialize(file_get_contents('../private/passwd'));
	if (auth($user['login'], $user['passwd']))
	{
		$_SESSION['loggued_on_user'] = $user['login'];
		echo("OK\n");
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo("ERROR\n");
	}

?>