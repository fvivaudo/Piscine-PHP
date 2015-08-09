<?php
session_start();
if (!$_GET['value'] || !$_GET['quantity'])
{
	echo "Article invalide\n";
	exit;
}
if (!$_SESSION['panier'])
	$_SESSION['panier'] = array();
if (!$_SESSION['panier'][$_GET['name']])
{
	$_SESSION['panier'][$_GET['name']] = array();
	$_SESSION['panier'][$_GET['name']][0] = $_GET['name'];
	$_SESSION['panier'][$_GET['name']][1] = $_GET['value'];
	$_SESSION['panier'][$_GET['name']][2] = $_GET['quantity'];
	$_SESSION['panier'][$_GET['name']][3] = $_GET['category'];
	$_SESSION['panier'][$_GET['name']][4] = $_GET['pic'];
}
else
{
	echo ("ELSE");
	$_SESSION['panier'][$_GET['name']][2] += $_GET['quantity'];
}
header("Location: index.php?pos_change=" . $_GET['pos_change']);
?>