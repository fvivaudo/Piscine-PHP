<?php
	if  (!file_exists ("private"))
		mkdir("private");
	if  (!file_exists ("inventory"))
	{
		file_put_contents("undefined", "inventory/inventory.txt");
		mkdir("inventory");
	}
	if  (!file_exists ("inventory/items"))
		mkdir("inventory/items");
	if  (!file_exists ("inventory/no_image.png"))
		file_put_contents("inventory/no_image.png", "http://www.surfplanet.it/ecomerce/images/no-image-large.png");
	$data = array(array("passwd", "login", "perm"));
	if (file_exists ("private/passwd"))
		$data = unserialize(file_get_contents("private/passwd"));
	$i = 0;
	while (42)
	{
		if (!$data[$i])
		{
			$data[$i]["passwd"] = hash("whirlpool", "admin");
			$data[$i]["login"] = "admin";
			$data[$i]["perm"] = 1;
			file_put_contents("private/passwd", serialize($data));
			header("location:index.php");
			return (0);
		}
		$i++;
	}
?>