<?php
	session_start();
	if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw']))
	{
		if (strlen($_POST['login']) > 5 && strlen($_POST['oldpw']) > 5 && strlen($_POST['newpw']) > 5)
		{
			if (file_exists("../private/passwd"))
			{
				$tab = unserialize(file_get_contents("../private/passwd"));
				$i = -1;
			 	while (isset($tab[++$i]))
			 		if ($tab[$i][1] == $_POST['login'])
			 		{
			 			if ($tab[$i][3] == hash("whirlpool", $_POST['oldpw']))
			 			{
			 				if (hash("whirlpool", $_POST['newpw']) != $tab[$i][3])
			 				{
				 				$tab[$i][3] = hash("whirlpool", htmlspecialchars_decode($_POST['newpw']));
						 		file_put_contents("../private/passwd", serialize($tab));
						 		$_SESSION['Change_password'] = 1;
								header("Location: ../Index.php");
							}
							else
								$_SESSION['same_passwd'] = 1;
					 	}
					 	else
					 		$_SESSION['wrong_passwd'] = 1;
			 		}
			 	if ((!isset($_SESSION['wrong_passwd']) || $_SESSION['wrong_passwd'] == 0))
			 		if ((!isset($_SESSION['same_passwd']) || $_SESSION['same_passwd'] == 0))
			 		$_SESSION['id_unknown'] = 1;
		 	}
		}
		else
			$_SESSION['field_size'] = 1;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Changement de mot de passe - Awesome Starships Battles II</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Css/Change_password.css">
	<script type="text/javascript" src="../Javascript/Change_account/Check_size.js"></script>
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
							<li><a href="login_page.php">Connexion</a><br /></li>');
				?>
			</ul>
		</header>
		<?php
			if (isset($_SESSION['id_unknown']) && $_SESSION['id_unknown'] == 1)
				include ("Change_div/id_unknown.php");
				$_SESSION['id_unknown'] = 0;
			if (isset($_SESSION['wrong_passwd']) && $_SESSION['wrong_passwd'] == 1)
				include ("Change_div/wrong_passwd.php");
				$_SESSION['wrong_passwd'] = 0;
			if (isset($_SESSION['same_passwd']) && $_SESSION['same_passwd'] == 1)
				include ("Change_div/Same_passwd.php");
				$_SESSION['same_passwd'] = 0;
			if (isset($_SESSION['field_size']) && $_SESSION['field_size'] == 1)
				include ("Change_div/field_size.php");
				$_SESSION['field_size'] = 0;
		?>
		<div id="container">
			<h4>Changement de mot de passe - Awesome Starships Battles II</h4>
			<form method="POST" action="Change_password.php" onsubmit="return check_form(this)">
			<input type="text" placeholder="Nom de compte" name="login"/>
			<br>
			<input type="password" placeholder="Ancien mot de passe" name="oldpw"/>
			</br>
			<input type="password" placeholder="Nouveau mot de passe" name="newpw"/>
			</br>
			<input type="submit" value="Modifier">
		</form>
			<a href="login_page.php"><button>Annuler</button></a>
		</div>
	</body>
</html>
