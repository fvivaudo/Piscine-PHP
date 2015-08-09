<?php
	session_start();
	if (isset($_SESSION['loggued_on_user']))
		header("Location: ../index.php");
	if (isset($_POST['login']) && isset($_POST['passwd']))
	{
		if (strlen($_POST['login']) > 5 && strlen($_POST['passwd']) > 5)
		{
			if (file_exists("../private") == FALSE)
				mkdir("../private");
			if (file_exists("../private/passwd") == FALSE)
			{
			 	file_put_contents("../private/passwd", serialize(array(array("login", htmlspecialchars($_POST['login']), "passwd",
			 		hash("whirlpool", htmlspecialchars($_POST['passwd']))))));
			 	$_SESSION['create'] = 1;
			 	header("Location: login_page.php");
			}
			else
			{
			 	$tab = unserialize(file_get_contents("../private/passwd"));
			 	$i = -1;
			 	$id = 0;
			 	while (isset($tab[++$i]))
			 		if (isset($tab[$i][1]) && $tab[$i][1] == $_POST['login'])
			 			$id = 1;
			 	$tab[$i] = array("login", htmlspecialchars($_POST['login']), "passwd", hash("whirlpool", htmlspecialchars($_POST['passwd'])));
			 	$tab = serialize($tab);
			 	if ($id == 0)
			 	{
			 		sort($tab);
			 		file_put_contents("../private/passwd", $tab);
			 		$_SESSION['create'] = 1;
			 		header("Location: login_page.php");
			 	}
			 	else
			 		$_SESSION['login_already_taken'] = 1;
			}

		}
		else
			$_SESSION['invalid_size_field'] = 1;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription - Awesome Starships Battles II</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Css/Create_account.css">
	<script type="text/javascript" src="../Javascript/Create_account/Check_size.js"></script>
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
			if (isset($_SESSION['invalid_size_field']) && $_SESSION['invalid_size_field'] == 1)
			{
				include ("Create_div/Invalid_size_field.php");
				$_SESSION['invalid_size_field'] = 0;
			}
			if (isset($_SESSION['login_already_taken']) && $_SESSION['login_already_taken'] == 1)
			{
				include ("Create_div/login_already_taken.php");
				$_SESSION['login_already_taken'] = 0;
			}
		?>
		<div id="container">
			<h4>Inscription - Awesome Starships Battles II</h4>
			<form method="POST" action="create_account.php" onsubmit="return check_form(this)">
			<input type="text" placeholder="Nom de compte" name="login"/>
			<br>
			<input type="password" placeholder="Mot de passe" name="passwd"/>
			</br>
			<input type="submit" value="Inscription">
		</form>
		<a href="login_page.php"><button>annuler</button></a>
		</div>
	</body>
</html>