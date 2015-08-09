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
					else
						echo ('
							<li><a href="Create_account.php">Inscription</a></li>
							<li><a href="#">Connexion</a><br /></li>');
				?>
			</ul>
		</header>
		<div id="container">
			<h4>Manage - Awesome Starships Battles II</h4>
			<p>Êtes-vous sûr ?</p>
			<form method="POST" action="Change_password.php">
				<a href="Delete_account.php">Oui</a>
				<a href="Manage.php">Non</a>
			</form>
		</div>
	</body>
</html>