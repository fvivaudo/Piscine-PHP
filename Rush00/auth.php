<?php
function auth($login, $passwd)
{
	$tab['login'] = $login;
   $tab['passwd'] = hash('whirlpool',$passwd);
		$tab_2 = unserialize(file_get_contents('./private/passwd'));
		foreach($tab_2 as $elem)
		{
			if ($elem['login'] == $tab['login'] && $elem['passwd'] == $tab['passwd'])
				return TRUE;
		}
		return FALSE;
}
?>