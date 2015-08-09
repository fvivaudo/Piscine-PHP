<?php
	function 	auth($login, $passwd)
	{
		$tab = unserialize(file_get_contents("../private/passwd"));
		$i = -1;
	 	while (isset($tab[++$i]))
	 		if ($tab[$i][1] == $login)
	 			if ($tab[$i][3] == hash("whirlpool", $passwd))
	 				return (TRUE);
		return (FALSE);
	}
?>