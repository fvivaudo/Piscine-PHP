<?php
function create()
{
	if  (!file_exists ("private"))
		mkdir("private");
	$user = array("passwd", "login", "perm");
	if ($_POST['passwd'])
		$user['passwd'] = hash("whirlpool", $_POST['passwd']);
	$user['login'] = $_POST['login'];
	$user['perm'] = 0;
	$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	$i = 0;
	if (!$user['login'] && !$user['passwd'])
		return (3);
	if (!$user['login'] || !$user['passwd'])
		return (2);
	while (42)
	{
		if ($data[$i]['login'] == $user['login'])
			return (1);
		if (!$data[$i])
		{
			$data[$i] = $user;
			file_put_contents("private/passwd", serialize($data));
			return (0);
		}
		$i++;
	}
}
$i = create();
if ($i == 1)
	echo "Cet identifiant est deja pris\n";
else if ($i == 2)
	echo "Vous devez remplir tous les champs.\n";
else if ($i != 3)
	header("Location:index.php");
?>
<html><body>
<form method="post" action="create.php">
	Identifiant: <input type="text" name="login"><br>
	Mot de passe: <input type="text" name="passwd"><br>
	<input type="submit" value="OK">
</form>
<A HREF="index.php">Accueil</A>
</body></html>