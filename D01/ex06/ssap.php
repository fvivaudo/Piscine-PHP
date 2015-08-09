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
$i = 2;
$res = "";
$res = ft_split($argv[1]);
while ($i < $argc)
{
	$res = array_merge($res, ft_split($argv[$i]));
	$i++;
}
sort($res);
$len = count($res);
$i = 0;
	while ($i <= $len)
	{
		echo($res[$i]);
		if($i < $len)
			echo("\n");
		$i++;
	}
?>