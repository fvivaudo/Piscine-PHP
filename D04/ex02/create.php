<?php
if  (!file_exists ("../private"))
{
	mkdir("../private");
}
$user = $user[["login", "passwd"]];
if ($_POST['passwd'])
	$user['passwd'] = hash("whirlpool", $_POST['passwd']);
$user['login'] = $_POST['login'];
$data = $data[[["login", "passwd"]]];
if (file_exists ("../private/passwd"))
	$data = unserialize(file_get_contents("../private/passwd"));
$i = 0;
while (42)
{
	if (!$user['login'] || !$user['passwd'] || $data[$i]['login'] == $user['login'])
	{
		echo "ERROR\n";
		break;
	}
	if (!$data[$i])
	{
		$data[$i] = $user;
		file_put_contents("../private/passwd", serialize($data));
		echo "OK\n";
		break;
	}
	$i++;
}
?>