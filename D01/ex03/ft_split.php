#!/usr/bin/php
<?PHP
function ft_split($tab)
{
	$res = 	explode(" ", $tab);
	$len = count($res);
	while ($len)
	{
		if(($key = array_search("", $res)) !== false)
		{
			unset($res[$key]);
		}
		$len--;
	}
	$res = array_reverse($res);
	return ($res);
}
?>