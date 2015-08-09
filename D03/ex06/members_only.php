<?php
$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = ($pass == "jaimelespetitsponeys" && $user == "zaz");

if (!$validated)
{
	echo ("<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n");
	header('WWW-Authenticate: Basic realm=\'\'Espace membres\'\'');
	header('HTTP/1.0 401 Unauthorized');
}
else
{
	echo "<html><body>\nBonjour Zaz<br />" . "\n";
	$file = file_get_contents('../img/42.png');
	$file = base64_encode($file);
	echo "<img src='data:image/png;base64," . ($file) . "'>\n</body></html>\n";
}
?>
