<?php
include 'auth.php';
function login()
{
	session_start();
	if (!$_POST['login'] && !$_POST['passwd'])
	{
		return (2);
	}
	else if (auth($_POST['login'], hash("whirlpool", $_POST['passwd'])))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo '<iframe src="http://www.w3schools.com" hgt=></iframe>';
		return (1);
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
	//	header("Location: index.php");
	//	echo("Votre login/mot de passe est incorrect.\n");
		return (0);
	}
}
?>