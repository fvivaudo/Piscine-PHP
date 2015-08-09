<?php
	session_start();
	if (file_exists("../private/passwd"))
	{
		$tab = unserialize(file_get_contents("../private/passwd"));
		$i = -1;
		while ($tab[++$i])
			if ($tab[$i][1] == $_SESSION['loggued_on_user'])
				unset($tab[$i]);
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		unset($_SESSION['loggued_on_user']);
		header("Location: ../index.php");
	}
?>