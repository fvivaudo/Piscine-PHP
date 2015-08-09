<html><body>
<?php
function display()
{
	$inventory = explode(PHP_EOL, file_get_contents("inventory/inventory.txt"));
	if (!$inventory[0])
		return (0);
	echo "<table><th>Name</th><th>Price</th><th>Quantity</th><th>Picture</th><th></th>";
	foreach ($inventory as $key => $value)
	{
		echo "<tr>";
		$value = trim($value);
		$path = "inventory/items/";
		$path = $path.$value;
		$path = $path.".txt";
		$item = explode(PHP_EOL,file_get_contents($path));
		if ($item[3] == $_GET['pos_change'] || $_GET['pos_change'] == "all")
		{
		echo "<td>" . $item[0] . "</td>";
		echo "<td>" . $item[1] . "</td>";
		echo "<td>" . $item[2] . "</td>";
	//	echo "<td>" . $item[3] . "</td>";
		if (file_exists($item[4]))
		{
			$img = file_get_contents($item[4]);
			$img = base64_encode($img);
			echo "<td>" . "<img src='data:image/jpg;base64," . ($img) . "'height='100' width=auto>" . "</td>";
		}
		else if (!filter_var($item[4], FILTER_VALIDATE_URL) === false)
			echo "<td>" . "<img src='" . ($item[4]) . "'height='100' width=auto>" . "</td>";
		else
		{
			$img = file_get_contents("inventory/no_image.png");
			$img = base64_encode($img);
			echo "<td>" . "<img src='data:image/jpg;base64," . ($img) . "'height='100' width=auto>" . "</td>";
		}
		echo ($_GET['pos_change']);
		echo "<td><input type=\"submit\" value=\"Add\" name=\"buy\" onClick='location.href=\"add_panier?pos_change=" . $_GET['pos_change'] . "&name=" . $item[0] . "&value=" . $item[1] . "&quantity=" . $item[2] . "&category=" . $item[3] . "&pic=" . $item[4] . "\"'></td>";
		echo "</tr>";
		}
	}
	echo "</tr>" . "</table>";
	
	return (0);
}
session_start();
if ($_GET['pos_change'])
{
	$_SESSION['center'] = $_GET['pos_change'];
	echo ($_GET['pos_change']);
}
if (!$_SESSION['center'])
	$_SESSION['center'] = "all";
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="doft.css" />
        <title>Demon's shop</title>
    </head>
    <body>
		<div id="banniere">
			<img src="banniere.jpg" title="banniere" alt="banniere">
		</div>
		<div id="log">
			<?php
			if (isset($_SESSION['loggued_on_user']))
				echo "<span>Bienvenue ".$_SESSION['loggued_on_user']." </span>
				<a href='logout.php'>Se deconnecter</a> <a href='delete.php'>Se desinscrire</a>";
			else
				echo "<form action='login_create.php' method='post'>
				Identifiant: <input type='text' name='login'/>
				Mot de passe: <input type='password' name='passwd'/>
				<input type='submit' name='submit' value='connexion'/>
				<input type='submit' name='submit' value='inscription'/></form>";
			?>
		</div>
		<div id="gauche">
			<ul id="categorie">
				<li><a href="?pos_change=all">All</a></li>
				<li><a href="?pos_change=cat1">Categorie1</a></li>
				<li><a href="?pos_change=cat2">Categorie2</a></li>
				<li><a href="?pos_change=cat3">Categorie3</a></li>
				<li><a href="?pos_change=cat4">Categorie4</a></li>
				<li><a href="?pos_change=cat5">Categorie5</a></li>
				<li><a href="?pos_change=panier">Panier</a></li>
				<li><a href="?pos_change=admin">Admin</a></li>
				<li><a href="?pos_change=install">install</a></li>
			</ul>
		</div>
		<div id="article">
<?php if ($_SESSION['center'] == "all" || $_SESSION['center'] == "cat1" || $_SESSION['center'] == "cat2" || $_SESSION['center'] == "cat3" || $_SESSION['center'] == "cat4" || $_SESSION['center'] == "cat5")
{
	display();
}
else if ($_SESSION['center'] == "panier")
	include('panier.php');
else if ($_SESSION['center'] == "admin")
	include('admin.php');
else
	include('install.php');
?>
  </div>
    </body>
    </html>
