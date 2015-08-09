<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
include_once 'select_ship.php';
function select_ship($row, $col, $fleet)
{
	$i = 0;
	$bd = 1000;
	foreach ($fleet as $ship) 
	{

	    $xd = $ship->position[0] - $row;
	    $yd = $ship->position[1] - $col;
	    $d = sqrt($xd*$xd + $yd*$yd);
	    if ($d < $bd)
	    {
	    	$bd = $d;
	    	$select = $i;
	    }
		$i++;
	}
	return ($select);
}
?>