<?php 
	session_start();
	require_once 'Ship.class.php';
	require_once 'Weapon.class.php';
	include 'build_map.php';
	include 'select_ship.php';
	include 'action.php';
	if (!isset($_SESSION['loggued_on_user']))
		header("Location: ../index.php");
	if (!$_SESSION['fleet_nb1']) {
			$_SESSION['fleet_nb1'] = 1;
	}
	if (!$_SESSION['fleet_nb2']) {
		$_SESSION['fleet_nb2'] = 1;
	}
	if ($_GET['sub1']) {
		while ($_GET["HD"] > 0 && $_SESSION['points1'] >= 200) {
			$_SESSION['points1'] -= 200;
			$_SESSION['fleet'][$_SESSION['fleet_nb1']] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE1, "POSITION" => Array(5, $_SESSION['fleet_nb1'] * 5), "ORIENTATION" => S));
			$_SESSION['fleet_nb1']++;
			$_GET["HD"]--;
		}
		while ($_GET["HotE"] > 0 && $_SESSION['points1'] >= 300) {
			$_SESSION['points1'] -= 300;
			$_SESSION['fleet'][$_SESSION['fleet_nb1']] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE2, "POSITION" => Array(5, $_SESSION['fleet_nb1'] * 5), "ORIENTATION" => S));
			$_SESSION['fleet_nb1']++;
			$_GET["HotE"]--;
		}
		while ($_GET["SoA"] > 0 && $_SESSION['points1'] >= 300) {
			$_SESSION['points1'] -= 300;
		  	$_SESSION['fleet'][$_SESSION['fleet_nb1']] = new Ship(Array("PRESET" => IMPERIAL_DESTROYER, "POSITION" => Array(5, $_SESSION['fleet_nb1'] * 5), "ORIENTATION" => S));
		  	$_SESSION['fleet_nb1']++;
		  	$_GET["SoA"]--;
		}
		while ($_GET["ID"] > 0 && $_SESSION['points1'] >= 500) {
			$_SESSION['points1'] -= 500;
		  	$_SESSION['fleet'][$_SESSION['fleet_nb1']] = new Ship(Array("PRESET" => IMPERIAL_CRUISER, "POSITION" => Array(5, $_SESSION['fleet_nb1'] * 5), "ORIENTATION" => S));
		  	$_SESSION['fleet_nb1']++;
		  	$_GET["ID"]--;
		}
	}
	if ($_GET['res1']) {
		$_SESSION['points1'] = 3000;
		unset($_SESSION['fleet']);
		unset($_SESSION['fleet_nb1']);
	}
	if ($_GET['sub2']) {
		while ($_GET["HD"] > 0 && $_SESSION['points2'] >= 200) {
			$_SESSION['points2'] -= 200;
			$_SESSION['fleet'][$_SESSION['fleet_nb2']] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE1, "POSITION" => Array(96, 150 - $_SESSION['fleet_nb2'] * 5), "ORIENTATION" => N));
			$_SESSION['fleet_nb2']++;
			$_GET["HD"]--;
		}
		while ($_GET["HotE"] > 0 && $_SESSION['points2'] >= 300) {
			$_SESSION['points2'] -= 300;
			$_SESSION['fleet'][$_SESSION['fleet_nb2']] = new Ship(Array("PRESET" => IMPERIAL_FRIGATE2, "POSITION" => Array(96, 150 - $_SESSION['fleet_nb2'] * 5), "ORIENTATION" => N));
			$_SESSION['fleet_nb2']++;
			$_GET["HotE"]--;
		}
		while ($_GET["SoA"] > 0 && $_SESSION['points2'] >= 300) {
			$_SESSION['points2'] -= 300;
		  	$_SESSION['fleet'][$_SESSION['fleet_nb2']] = new Ship(Array("PRESET" => IMPERIAL_DESTROYER, "POSITION" => Array(96, 150 - $_SESSION['fleet_nb2'] * 5), "ORIENTATION" => N));
		  	$_SESSION['fleet_nb2']++;
		  	$_GET["SoA"]--;
		}
		while ($_GET["ID"] > 0 && $_SESSION['points2'] >= 500) {
			$_SESSION['points2'] -= 500;
		  	$_SESSION['fleet'][$_SESSION['fleet_nb2']] = new Ship(Array("PRESET" => IMPERIAL_CRUISER, "POSITION" => Array(96, 150 - $_SESSION['fleet_nb2'] * 5), "ORIENTATION" => N));
		  	$_SESSION['fleet_nb2']++;
		  	$_GET["ID"]--;
		}
	}
	if ($_GET['res2']) {
		$_SESSION['points2'] = 3000;
		unset($_SESSION['fleet']);
		unset($_SESSION['fleet_nb2']);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lobby - Awesome Starships Battles II</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Css/Lobby.css"/>
	<script>
		var count;
		function ft_newtd() {
			var message = prompt("Nom de la partie");
			if (message != null) {
				var tmp_message = message;
				var var_list = document.getElementById("ft_list");
				var message = document.createElement("a");
				message.setAttribute('href', 'index.php');
				message.appendChild(document.createTextNode(tmp_message));
				var_list.insertBefore(message, var_list.childNodes[0]);
				count++;
			}
		}
	</script>
	<style type="text/css">
		#iframe1 {
			margin-bottom: 4px;
			height: 300px;
			background-color: rgba(255, 255, 255, 0.5);
		}
		#iframe2 {
			height: 50px;
		}
		iframe
		{
			display: block;
			width: 95%;
			border: 0;
			margin: 0 auto;
		}
	</style>
</head>
	<body>
		<header>
			<a id="logo" href="../index.php">Awesome Starships Battles II</a>
			<ul>
				<?php
					if ($_SESSION['loggued_on_user'])
						echo ('
							<li><a href="../lobby.php">Lobby</a></li>
							<li><a href="Account/manage.php">'.$_SESSION['loggued_on_user'].'</a></li>
							<li><a href="Account/logout.php">Déconnexion</a><br /></li>');
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
		<h4>Lobby</h4>
		<span id="ft_list">
			

		<input type="submit" value="Nouvelle partie" onclick="ft_newtd()">
		</span></div>
		<div class="ships">
			<p>[Player 1]</br></br>Points:
			<?php echo $_SESSION['points1']?>
			<form method="GET" action="" name="p1">
				Honorable Duty (200) <input type="number" name="HD" value=0></br>
				Hand Of The Emperor (300) <input type="number" name="HotE" value=0></br>
				Sword Of Absolution (300) <input type="number" name="SoA" value=0></br>
				Imperator Deus (500) <input type="number" name="ID" value=0></br>
				<input type="submit" value="Valider" name="sub1">
				<input type="submit" value="Reset" name="res1">
			</form></p>
		</div>
		<div class="ships">
			<p>[Player 2]</br ></br>Points:
			<?php echo $_SESSION['points2']?>
			<form method="GET" action="" name="p2">
				Honorable Duty (200) <input type="number" name="HD" value=0></br>
				Hand Of The Emperor (300) <input type="number" name="HotE" value=0></br>
				Sword Of Absolution (300) <input type="number" name="SoA" value=0></br>
				Imperator Deus (500) <input type="number" name="ID" value=0></br>
				<input type="submit" value="Valider" name="sub2">
				<input type="submit" value="Reset" name="res2">
			</form></p>
		</div>
		<iframe id="iframe1" name="chat" width="100%" src="Chat.php"></iframe>
		<iframe id="iframe2" width="100%"  src="Speak.php"></iframe>
	</body>
</html>