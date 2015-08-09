#!/usr/bin/php
<?PHP
if (!($argv[1]))
	exit;
date_default_timezone_set('Europe/Paris');
$patterns = array();
$patterns[0] = '/[Jj]anvier/';
$patterns[1] = '/[fF]evrier/';
$patterns[2] = '/[mM]ars/';
$patterns[3] = '/[aA]vril/';
$patterns[4] = '/[mM]ai/';
$patterns[5] = '/[jJ]uin/';
$patterns[6] = '/[jJ]uillet/';
$patterns[7] = '/[aA]out/';
$patterns[8] = '/[sS]eptembre/';
$patterns[9] = '/[oO]ctobre/';
$patterns[10] = '/[nN]ovembre/';
$patterns[11] = '/[dD]ecembre/';
$replacements = array();
$replacements[11] = '1';
$replacements[10] = '2';
$replacements[9] = '3';
$replacements[8] = '4';
$replacements[7] = '5';
$replacements[6] = '6';
$replacements[5] = '7';
$replacements[4] = '8';
$replacements[3] = '9';
$replacements[2] = '10';
$replacements[1] = '11';
$replacements[0] = '12';

$argv[1] = preg_replace($patterns, $replacements, $argv[1]);
$argv[1] = preg_replace('/(([lL]undi |[mM]ardi |[mM]ercredi |[jJ]eudi |[vV]endredi |[sS]amedi |[dD]imanche ))/', '', $argv[1]);
$argv[1] = preg_replace('/(\d{1,2}) (\d{1,2}) (\d{4})/', '$1-$2-$3', $argv[1]);
if (preg_match_all('/[a-zA-Z]/', $argv[1]))
{
	echo ("Wrong Format\n");
	exit;
}
if (strtotime($argv[1]))
	echo strtotime($argv[1]), "\n";
else
	echo ("Wrong Format\n");
?>