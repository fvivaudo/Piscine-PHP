<?php
	session_start();
	include("Auth.php");
	if (isset($_POST['login']) && isset($_POST['passwd']) && !isset($_SESSION['loggued_on_user']))
	{
		if ($_POST['login'] == "admin" && $_POST['passwd'] == "admin")
		{
			$_SESSION['loggued_on_user'] = "admin";
			header("Location: ../Php/chat.php");
		}
		else if (auth($_POST['login'], $_POST['passwd']) == TRUE)
		{
			$_SESSION['loggued_on_user'] = htmlspecialchars($_POST['login']);
			header("Location: ../lobby.php");
			$_SESSION['points1'] = 3000;
			$_SESSION['points2'] = 3000;
		}
		else
		{
			$_SESSION['Wrong_combination'] = 1;
			header("Location: login_page.php");
		}
	}
	else
		header("Location: login_page.php");
?>