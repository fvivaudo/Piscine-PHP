<?php
if  (!file_exists ("../private"))
{
	mkdir("../private");
}
$user = $user[["oldpw", "login", "newpw"]];
if ($_POST['oldpw'])
	$user['oldpw'] = hash("whirlpool", $_POST['oldpw']);
if ($_POST['newpw'])
	$user['newpw'] = hash("whirlpool", $_POST['newpw']);
$user['login'] = $_POST['login'];
$data = $data[[["passwd", "login"]]];
if (file_exists ("../private/passwd"))
	$data = unserialize(file_get_contents("../private/passwd"));
$i = 0;
$OK = 0;
if ($user['oldpw'] && $user['newpw'] && $user['login'])
{
	while ($data[$i])
	{
		if ($data[$i]['login'] == $user['login'] && $data[$i]['passwd'] == $user['oldpw'])
		{
			$data[$i]['passwd'] = $user['newpw'];
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
			$OK = 1;
			break;
		}
		$i++;
	}
}
if ($OK == 0)
	echo "ERROR\n";
?>