#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$res1 = $tab;
	$res2 = $res1;
	sort($res1);
	$result = array_diff_assoc($res1, $res2);
	if ($result)
		return (FALSE);
	else
		return (TRUE);
}
?>