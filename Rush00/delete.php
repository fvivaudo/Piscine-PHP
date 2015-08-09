<?php
session_start();
if ($_SESSION['loggued_on_user'] != NULL)
{
	$tab_2 = unserialize(file_get_contents('./private/passwd'));
		foreach($tab_2 as $key => &$elem)
		{
			if ($elem['login'] == $_SESSION['loggued_on_user'])
			{
				unset($tab_2[$key]);
				echo "OK\n";
				$_SESSION['loggued_on_user'] = NULL;
				$i = 1;
			}
		}
		array_values($tab_2);
		file_put_contents('./private/passwd', serialize($tab_2));
		if (!$i)
			echo "ERROR\n";
}
echo "<html><body><a href='index.php'>Retour</a></body></html>";
?>