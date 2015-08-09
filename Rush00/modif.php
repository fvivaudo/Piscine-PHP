<?php
function modif()
{
	if  (!file_exists ("private"))
	{
		mkdir("private");
	}
	$user = array("oldpw", "login", "newpw");
	if ($_POST['oldpw'])
		$user['oldpw'] = hash("whirlpool", $_POST['oldpw']);
	if ($_POST['newpw'])
		$user['newpw'] = hash("whirlpool", $_POST['newpw']);
	$user['login'] = $_POST['login'];
	$data = array(array("passwd", "login". "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	$i = 0;
	if ($user['oldpw'] && $user['newpw'] && $user['login'])
	{
		while ($data[$i])
		{
			if ($data[$i]['login'] == $user['login'] && $data[$i]['passwd'] == $user['oldpw'])
			{
				$data[$i]['passwd'] = $user['newpw'];
				file_put_contents("private/passwd", serialize($data));
				header('Location: index.php');
				echo "OK1\n";
				return (0);
			}
			$i++;
		}
	}
	else if (!$user['oldpw'] && !$user['newpw'] && !$user['login'])
		return (0);
	else if (!$user['oldpw'] || !$user['newpw'] || !$user['login'])
		echo "Vous devez remplir tous les champs\n";
	echo "Votre mot de passe/identifiant est incorrect\n";
	return (0);
}
modif();
?>
<html><body>
<form action="modif.php" method="post">
	Identifiant: <input type="text" name="login"><br>
	Ancien mot de passe: <input type="text" name="oldpw"><br>
	Nouveau mot de passe: <input type="text" name="newpw"><br>
	<input type="submit" value="OK">
</form>
<A HREF="index.php">Accueil</A>
</body></html>