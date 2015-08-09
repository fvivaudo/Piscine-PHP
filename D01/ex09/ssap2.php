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
$i = 0;
$len = count($res);
$res1 = array();
$res2 = array();
$res3 = array();
while ($i < $len)
{
	if ($res[$i][0] >= 'A' && $res[$i][0] <= 'Z' || $res[$i][0] >= 'a' && $res[$i][0] <= 'z' )
	{
		$res1 = array_merge($res1, ft_split($res[$i]));
	}
	else if (is_numeric($res[$i]) && $res[$i] != '+' && $res[$i] != '-')
	{
		$res2 = array_merge($res2, ft_split($res[$i]));
	}
	else
	{
		$res3 = array_merge($res3, ft_split($res[$i]));
	}
	$i++;
}
sort($res1, SORT_NATURAL | SORT_FLAG_CASE);
sort($res2, SORT_STRING | SORT_FLAG_CASE);
sort($res3, SORT_NATURAL | SORT_FLAG_CASE);
$res1 = array_merge($res1, $res2);
$res1 = array_merge($res1, $res3);
$i = 0;
	while ($i <= $len)
	{
		echo($res1[$i]);
		if($i < $len)
			echo("\n");
		$i++;
	}
?>