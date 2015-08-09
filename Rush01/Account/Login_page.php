<?php 
	session_start();
	if (isset($_SESSION['loggued_on_user']))
		header("Location: ../index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Awesome Starships Battles II</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Css/Login_page.css"/>
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
		<?php
			if (isset($_SESSION['create']) && $_SESSION['create'] == 1)
				include ("Index_div/Create.php");
			$_SESSION['create'] = 0;
			if (isset($_SESSION['Change_password']) && $_SESSION['Change_password'] == 1)
				include ("Index_div/Change_password.php");
			$_SESSION['Change_password'] = 0;
			if (isset($_SESSION['Wrong_combination']) && $_SESSION['Wrong_combination'] == 1)
				include ("Index_div/Wrong_combine.php");
			$_SESSION['Wrong_combination'] = 0;
		?>
		<div id="container">
			<h4>Login - Awesome Starships Battles II</h4>
			<form method="POST" action="login.php" onsubmit="return check_form(this)">
				<input type="text" placeholder="Nom de compte" name="login"/><br>
				<input type="password" placeholder="Mot de passe" name="passwd"/></br>
				<input type="submit" value="Connexion">
			</form>
			<a id="link1" href="Create_account.php">Créer votre compte</a>
			<a id="link2" href="Change_password.php"> Changement de mot de passe</a>
		</div>
	</body>
</html>