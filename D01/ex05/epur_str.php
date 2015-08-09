#!/usr/bin/php
<?PHP
	$argv[1] = trim($argv[1]); 
	$argv[1] = 	explode(" ", $argv[1]);
	$len = count($argv[1]);
	while ($len)
	{
		if(($key = array_search("", $argv[1])) !== false)
		{
			unset($argv[1][$key]);
		}
		$len--;
	}
	$argv[1] = array_reverse($argv[1]);
	$argv[1] = implode(" ", $argv[1]);
	echo $argv[1];
	echo "\n";
?>