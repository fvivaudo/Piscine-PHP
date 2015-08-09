#!/usr/bin/php
<?PHP
	$i = 1;
	while ($i <= $argc)
	{
		echo($argv[$i]);
		if($i < $argc)
			echo("\n");
		$i++;
	}
?>