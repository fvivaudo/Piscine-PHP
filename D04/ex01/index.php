<html><body>
<?php
session_start();

if ($_GET['passwd'])
{
	$passwd = $_GET['passwd'];
}
else
	$passwd = $_SESSION['passwd'];
if ($_GET['login'])
{
	$login = $_GET['login'];
}
else
	$login = $_SESSION['login'];
$_SESSION['login'] = $_GET['login'];
$_SESSION['passwd'] = $_GET['passwd'];
?>
<form action="index.php" method="get">
	Identifiant: <input type="text" name="login" value="<?php echo $login; ?>"><br>
	Mot de passe: <input type="text" name="passwd" value="<?php echo $passwd; ?>"><br>
	<input type="submit" value="OK">
</form>
</body></html>

