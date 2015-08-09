<?php
function auth($login, $passwd)
{
	$data = $data[[['passwd', 'login']]];
	if (file_exists ("../private/passwd"))
		$data = unserialize(file_get_contents("../private/passwd"));
	else
		return FALSE;
	$i = 0;
	$OK = 0;
	if ($login && $passwd)
	{
		while ($data[$i])
		{
			if ($data[$i]['login'] == $login && $data[$i]['passwd'] == $passwd)
				return TRUE;
			$i++;
		}
	}
	return FALSE;
}
?>