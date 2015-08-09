<html><body>
<?php
function add_command()
{
	file_put_contents("private/orderlog", "Username = " . $_SESSION['loggued_on_user'] . "\n\n", FILE_APPEND | LOCK_EX);
	foreach ($_SESSION['panier'] as $tab1)
	{
		foreach ($tab1 as $tab2)
		{
			file_put_contents("private/orderlog", $tab2.",", FILE_APPEND | LOCK_EX);
		}
		file_put_contents("private/orderlog", "\n", FILE_APPEND | LOCK_EX);
		if ($tab1[1] && $tab1[2])
			$price += $tab1[1] * $tab1[2];
	}
	file_put_contents("private/orderlog", "\nTotal = " . $price . "\n---------------------------\n", FILE_APPEND | LOCK_EX);
	unset($_SESSION['panier']);
}
function panier()
{
	echo "<table><th>Name</th><th>Price</th><th>Quantity</th><th>Category</th><th>Picture</th>";
	foreach ($_SESSION['panier'] as $tab1)
	{
		echo "<tr>";
		for ($key = 0; $key <= 3; $key++)
			echo "<td>" . $tab1[$key] . "</td>";
		if (file_exists($tab1[4]))
		{
			$img = file_get_contents($tab1[4]);
			$img = base64_encode($img);
			echo "<td>" . "<img src='data:image/jpg;base64," . ($img) . "'height='100' width=auto>" . "</td>";
		}
		else if (!filter_var($tab1[4], FILTER_VALIDATE_URL) === false)
			echo "<td>" . "<img src='" . ($tab1[4]) . "'height='100' width=auto>" . "</td>";
		else
		{
			$img = file_get_contents("inventory/no_image.png");
			$img = base64_encode($img);
			echo "<td>" . "<img src='data:image/jpg;base64," . ($img) . "'height='100' width=auto>" . "</td>";
		}
		echo "</tr>";
		if ($tab1[1] && $tab1[2])
			$price += $tab1[1] * $tab1[2];
	}
	echo "</table>";
	echo "<p>" . "Total cost = " . $price . "</p>";
	if ($_GET['buy'] == 1)
	{
		if ($_SESSION['loggued_on_user'] && $_SESSION['panier'])
		{
			add_command();
			header("location:index.php?pos_change=panier");
		}
		else if (!$_SESSION['loggued_on_user'])
			echo "Vous devez etre connecte pour pouvoir effectuer cette action";
		else
			echo "Votre panier est vide";
	}
	echo "</table>";
}
session_start();
if (isset($_SESSION['panier']))
{
	panier();
	echo "<input type=\"submit\" value=\"Valider\" id=\"buy\" name=\"buy\" onClick='location.href=\"?buy=1\"'>";
}
else
	echo "Votre panier est vide<br \>";
?>
<A HREF="index.php">Accueil</A>
</body></html>