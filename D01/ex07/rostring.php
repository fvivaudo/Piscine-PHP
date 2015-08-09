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
	return ($res);
}
$i = 2;
$res = "";
$res = ft_split($argv[1]);
$len = count($res);
$tmp = $res[0];
unset($res[0]);
$res[$len] = $tmp;
$i = 1;
	while ($i <= $len)
	{
		echo($res[$i]);
		if($i < $len)
			echo(" ");
		else
			echo("\n");
		$i++;
	}
?>