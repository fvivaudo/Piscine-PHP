<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
function update_map()
{
	//Ship::$verbose = True;
	$map = array_fill(0, 100, array_fill(0, 150, 0));
	foreach ($_SESSION['fleet'] as $ship) 
	{
		$i1 = $ship->position[0];
		$y1 = $ship->position[1];

		if ($ship->orientation == N)
		{
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					$map[$i + $i1 - $ship->_length / 2][$y + $y1 - $ship->_width / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == S)
		{
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					$map[$i + $i1 - $ship->_length / 2][$y + $y1 - $ship->_width / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == E)
		{
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					$map[$y + $i1 - $ship->_length / 2][$i + $y1 - $ship->_width / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == W)
		{
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					$map[$y + $i1 - $ship->_width / 2][$i + $y1 - $ship->_length / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
	}
	return ($map);
}
?>