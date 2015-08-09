<?PHP
	session_start();
	date_default_timezone_set("Europe/Paris");
	if ($_SESSION['loggued_on_user'])
	{
		if ($_POST['msg'])
		{
			$tab['login'] = $_SESSION['loggued_on_user'];
			$tab['time'] = time();
			$tab['msg'] = $_POST['msg'];
			$tab_2[] = $tab;
			mkdir("../private");
			if (file_exists("../private/chat") == FALSE)
			 	file_put_contents("../private/chat", serialize($tab_2));
			else
			{
				$fd = fopen("../private/chat", "r+");
				if (flock($fd, LOCK_EX))
				{
			 		$tab3 = unserialize(file_get_contents("../private/chat"));
		 			$tab3[] = ["login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']];
		 			$tab3 = serialize($tab3);
		 			file_put_contents("../private/chat", $tab3);
		 			flock($fd, LOCK_UN);
			 		fclose($fd);
			 	}
		 	}
		}
		?>
			<head>
				<script type="text/javascript">top.frames['chat'].location = 'chat.php';</script>
			</head>
			<style type="text/css">
			body
			{
				margin: 0;
			}
			form
			{
				margin: 0;
			}
			#bouton
			{
				width: 15%;
				border: 1px solid black;
				background-color: aliceblue;
				padding: 17px;
			}
			#textarea
			{
				border: 1px solid black;
				background-color: aliceblue;
				padding: 17px;
				width: 84%;
			}

			</style>
			<form action="speak.php" method="post">
			<input id="bouton" type="submit" value="Send">
			<input type="text" autocomplete="off" id="textarea" name="msg" autofocus placeholder="Votre message ...">
			</form> 
		<?php
	}
	else
		echo "ERROR\n";
?>