#!/usr/bin/php
<?PHP

$handle = fopen ("php://stdin","r");
while (1)
{
	echo "Entrez un nombre: ";
	$line = fgets($handle);
	$line = substr($line, 0, -1);
	$pos = feof($handle);
	if ($pos === true)
	{
		exit;
	}

	if ((is_numeric(($line)) && ($line % 2) == 0))
	{
		printf ("Le chiffre %d est Pair\n", $line);
	}
	else if ((is_numeric(($line)) && ($line % 2 == 1)))
	{
		printf ("Le chiffre %d est Impair\n", $line);
	}
	else
		printf("'%s' n'est pas un chiffre\n", $line);
}
?>