<?php 
	session_start();
	if (!isset($_SESSION['loggued_on_user']))
		header("Location: ../index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Awesome Starships Battles II</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Css/manage.css"/>
	<script type="text/javascript" src="../Javascript/Login/Check_size.js"></script>
</head>
	<body>
		<header>
			<a id="logo" href="../index.php">Awesome Starships Battles II</a>
			<ul>
				<?php
					if ($_SESSION['loggued_on_user'])
						echo ('
							<li><a href="../lobby.php">Lobby</a></li>
							<li><a href="manage.php">'.$_SESSION['loggued_on_user'].'</a></li>
							<li><a href="logout.php">Déconnexion</a><br /></li>');
				?>
			</ul>
		</header>
		<div id="container">
			<h4>Manage - Awesome Starships Battles II</h4>
			<a href="change_password.php">Changer votre mot de passe</a>
			<a href="Delete.php">Supprimer votre compte</a>
			<a href="logout.php">Déconnexion</a>
		</div>
	</body>
</html>