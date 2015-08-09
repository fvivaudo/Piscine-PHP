<?php
	date_default_timezone_set("Europe/Paris");
	session_start();
	if ($_SESSION['loggued_on_user'])
	{
		if (file_exists("../private/chat"))
		{
			$fd = fopen("../private/chat", "r");
			if (flock($fd, LOCK_EX))
			{
			 	$tab = unserialize(file_get_contents("../private/chat"));
			 	foreach ($tab as $tab2)
			 	{
			 		echo date("[H:i] ", $tab2['time']);
			 		echo "<b>".$tab2['login']."</b>: ";
			 		echo "".$tab2['msg']."<br />\n";
			 	}
		 		flock($fd, LOCK_UN);
		 		fclose($fd);
		 	}
		}
	}
	?>