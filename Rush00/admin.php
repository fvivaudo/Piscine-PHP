<html><body><meta charset="UTF-8">
<?php

function delete_product()
{
	$inventory = explode(PHP_EOL, file_get_contents("inventory/inventory.txt"));
	foreach ($inventory as $key => $value)
	{
		if ($key == ($_GET['delete'] - 1))
		{
			echo ($value);
			$replace = array("\n".$value, $value."\n", $value);
			file_put_contents("inventory/inventory.txt", str_replace($replace, "", file_get_contents("inventory/inventory.txt")));
			$path = "inventory/items/";
			$path = $path.$value;
			$path = $path.".txt";
			unlink($path);
			return (0);
		}
		$value = trim($value);
		$path = "inventory/items/";
		$path = $path.$value;
		$path = $path.".txt";
		$item = explode(PHP_EOL,file_get_contents($path));
	}
	return (0);
}
function modif_product()
{
	$inventory = explode(PHP_EOL, file_get_contents("inventory/inventory.txt"));
	foreach ($inventory as $key => $value)
	{
		$value = trim($value);
		$path = "inventory/items/";
		$path = $path.$value;
		$path = $path.".txt";
		$item = explode(PHP_EOL,file_get_contents($path));
		echo $_GET[$inventory[$key]."|0"];
		for ($key1 = 0; $key1 <= 3; $key1++)
		{
			if ($inventory[$key][$key1] != $_GET[$inventory[$key]."|".$key1])
			{
				$data = $_GET[$inventory[$key]."|0"] . PHP_EOL . $_GET[$inventory[$key]."|1"] . PHP_EOL . $_GET[$inventory[$key]."|2"] . PHP_EOL . $_GET[$inventory[$key]."|3"] . PHP_EOL . $_GET[$inventory[$key]."|4"];
				file_put_contents("inventory/items/" . $inventory[$key] . ".txt", $data);
			}
		}
	}
	return (0);
}

function add_product()
{
	if (!ctype_digit($_GET['prod_price']) || !ctype_digit($_GET['prod_quantity']))
	{
		echo "Certains paramatres sont incorrects.";
		return (0);	
	}
	$inventory = explode(PHP_EOL, file_get_contents("inventory/inventory.txt"));
	foreach ($inventory as $key => $value)
	{
		$value = trim($value);
		$path = "inventory/items/";
		$path = $path.$value;
		$path = $path.".txt";
		$item = explode(PHP_EOL,file_get_contents($path));
		if ($inventory[$key] == $_GET['prod_name'])
		{
			echo ($inventory[$key][0]);
			echo "Ce produit existe deja";
			return (0);
		}
	}
	$data = $_GET['prod_name'] . PHP_EOL . $_GET['prod_price'] . PHP_EOL . $_GET['prod_quantity'] . PHP_EOL . $_GET['prod_cat'] . PHP_EOL . $_GET['prod_img'];
	file_put_contents("inventory/items/" . $_GET['prod_name'] . ".txt", $data);
	file_put_contents("inventory/inventory.txt", PHP_EOL .$_GET['prod_name'], FILE_APPEND | LOCK_EX);
	return (0);
}

function get_invent()
{
	$inventory = explode(PHP_EOL, file_get_contents("inventory/inventory.txt"));
	//if (!$inventory[0])
	//	return (0);
	echo "<form action=\"admin.php\" method=\"get\">";
	echo "<table><th>Name</th><th>Price</th><th>Quantity</th><th>Category</th><th>Img path</th><th>Picture</th><th></th>";
	foreach ($inventory as $key => $value)
	{
		echo "<tr>";
		$value = trim($value);
		$path = "inventory/items/";
		$path = $path.$value;
		$path = $path.".txt";
		$item = explode(PHP_EOL,file_get_contents($path));
		echo "<td><input type=\"text\" name=\"" . $inventory[$key]."|0" . "\"value=\"" . $item[0] . "\"></td>";
		echo "<td><input type=\"text\" name=\"" . $inventory[$key]."|1" . "\"value=\"" . $item[1] . "\"></td>";
		echo "<td><input type=\"text\" name=\"" . $inventory[$key]."|2" . "\"value=\"" . $item[2] . "\"></td>";
		echo "<td><input type=\"text\" name=\"" . $inventory[$key]."|3" . "\"value=\"" . $item[3] . "\"></td>";
		echo "<td><input type=\"text\" name=\"" . $inventory[$key]."|4" . "\"value=\"" . $item[4] . "\"></td>";
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
		
		echo "<td><button name=\"" . "delete" . "\" value=\"" . ($key + 1) . "\" >Delete</button></td>";
		echo "</tr>";
	}
	echo "</tr>" . "</table>";
	echo "</tr><input type=\"submit\" value=\"modif\" name=\"modif\"'\></form>";
	return (0);
}

function switch_account()
{
	if (!file_exists ("private"))
		mkdir("private");
	$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	foreach ($data as $key => $value)
	{
		if ($key == ($_GET['switch'] - 1))
		{
			if ($data[$key]['perm'] == 1)
				$data[$key]['perm']--;
			else
				$data[$key]['perm']++;
			break;
		}
	}
	file_put_contents("private/passwd", serialize($data));
}

function delete_account()
{
	if  (!file_exists ("private"))
		mkdir("private");
	$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	foreach ($data as $key => $value)
	{
		if ($key == ($_GET['delete_user'] - 1))
		{
			unset($data[$key]);
			$data = array_values($data);
			break;
		}
	}
	file_put_contents("private/passwd", serialize($data));
}

function get_user()
{
		$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	if  (!file_exists ("private"))
		mkdir("private");
	if (!$data)
		return (0);
	echo "<table><th>Name</th><th>Perm</th><th></th>";
	foreach ($data as $key => $value)
	{
		echo "<tr>";
		echo "<td>" . ($data[$key]['login']) . "</td>";
		echo "<td>" . (integer)($data[$key]['perm']) . "</td>";
		echo "<td><input type=\"submit\" value=\"Delete\" name=\"buy\" onClick='location.href=\"?delete_user=" . ($key + 1) . "\"'></td>";
		echo "<td><input type=\"submit\" value=\"Switch\" name=\"buy\" onClick='location.href=\"?switch=" . ($key + 1) ."\"'></td>";
		echo "</tr>";
	}
	echo "</table>";
	file_put_contents("private/passwd", serialize($data));
}
function is_admin()
{
		$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	if  (!file_exists ("private"))
		mkdir("private");
	if (!$data)
		return (0);
	foreach ($data as $key => $value)
	{
		if ($_SESSION['loggued_on_user'] == $data[$key]['login'] && $data[$key]['perm'] == 1)
			return (1);
	}
return (0);
}
session_start();
//if (!is_admin())
//{
//	//header("location:index.php");
//}
if($_GET['modif'] == "modif")
{
	modif_product();
	header("location:index.php?pos_change=admin");
	//header("location:login.php");
}
if($_GET['add'] == "add")
{
	add_product();
	header("location:index.php?pos_change=admin");
}
if($_GET['delete'])
{
	delete_product();
	header("location:index.php?pos_change=admin");
	//header("location:index.php");
}
if ($_GET['delete_user'])
{
	delete_account();
	header("location:index.php?pos_change=admin");
}
if ($_GET['switch'])
{
	switch_account();
	header("location:index.php?pos_change=admin");
	//header("location:admin.php");
}
get_invent();
get_user();
$str = file_get_contents("private/orderlog");
$str = str_replace(PHP_EOL, "<br />", $str);
echo "<p>" . $str . "</p>";
?>
<form action="admin.php" method="get">
	Nom du produit: <input type="text" name="prod_name"><br>
	Prix: <input type="text" name="prod_price"><br>
	Quantite: <input type="text" name="prod_quantity"><br>
	Category: <input type="text" name="prod_cat"><br>
	Image: <input type="text" name="prod_img"><br>
<input type="submit" value="add" name="add">
</form>
<A HREF="index.php">Accueil</A>
<A HREF="a.php">Add_item</A>
</body></html>