
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
foreach ($_GET as $i => $y)
	echo ($i . ': ' . $y), "\n";
?>
