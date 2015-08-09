<?php
session_start();
include('auth.php');
if ($_POST['submit'] == "connexion" && auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo "OK\n";
}

else if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "inscription")
{
	if (!file_exists("./private"))
		mkdir("./private");
	$tab['login'] = $_POST['login'];
	$tab['passwd'] = hash('whirlpool',$_POST['passwd']);
	$tab['perm'] = 0;
		$tab_2 = unserialize(file_get_contents('./private/passwd'));
		foreach($tab_2 as $elem)
		{
			if ($elem['login'] == $tab['login'])
			{
				echo "ERROR\n";
				$i = 1;
			}
		}
		if (!$i)
		{
			$tab_2[] = $tab;
			file_put_contents('./private/passwd',serialize($tab_2));
			echo "OK\n";
		}
}

else
{
	$_SESSION['loggued_on_user'] = NULL;
	echo "ERROR\n";
}
echo "<html><body></br><a href='index.php'>Retour</a></body></html>";
?>
