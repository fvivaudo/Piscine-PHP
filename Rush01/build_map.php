<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
function update_map()
{
	//Ship::$verbose = True;
	$map = array_fill(0, 100, array_fill(0, 150, null));
	foreach ($_SESSION['fleet'] as $ship) 
	{
		$i1 = $ship->position[0];
		$y1 = $ship->position[1];

		if ($ship->orientation == 'N')
		{
		//	echo "NORTH";
			for ($y = $ship->_width; $y > 0; $y--)
			{
				for ($i = $ship->_length; $i > 0; $i--)
				{
				//	foreach ($ship->_pattern as $key => $value)
				//	{
				//		imagerotate(, 90, 0);
				//	}
					if ($ship->_pattern)
						$map[$i1 - $i + $ship->_length / 2][$y1 - $y + $ship->_width / 2] =  "<img src='" . $ship->_pattern[$y - 1][$i - 1] . "' >";
					else 
						$map[$i + $i1 + $ship->_length / 2][$y + $y1 + $ship->_width / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == 'S')
		{
		//	echo "SOUTH";
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					if ($ship->_pattern)
						$map[$i + $i1 - $ship->_length / 2][$y + $y1 - $ship->_width / 2] = "<img src='" . $ship->_pattern[$y][$i] . "'class=\"rotate180\">";
					else
						$map[$i + $i1 - $ship->_length / 2][$y + $y1 - $ship->_width / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == 'W')
		{
		//	echo "EST";
			for ($i = $ship->_length; $i > 0; $i--)
			{
				for ($y = $ship->_width; $y > 0; $y--)
				{
					if ($ship->_pattern)
						$map[$i1 - $y + $ship->_width / 2][$y1 - $i + $ship->_length / 2] = "<img src='" . $ship->_pattern[$y - 1][$i - 1] . "' class=\"rotate270\">";
					else
						$map[$y + $i1 - $ship->_width / 2][$i + $y1 - $ship->_length / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
		if ($ship->orientation == 'E')
		{
		//	echo "WEST";
			for ($i = 0; $i < $ship->_length; $i++)
			{
				for ($y = 0; $y < $ship->_width; $y++)
				{
					if ($ship->_pattern)
						$map[$y + $i1 - $ship->_width / 2][$i + $y1 - $ship->_length / 2] = "<img src='" . $ship->_pattern[$y][$i] . "' class=\"rotate90\">";
					else
						$map[$y + $i1 - $ship->_width / 2][$i + $y1 - $ship->_length / 2] = "<img src='http://blogs.smithsonianmag.com/science/files/2009/08/blackfootedcat-orig-300x199.jpg' height=10px width=10px>";
				}
			}
		}
			//		if ($ship->_image)
			//	$map[$i + $i1 + $ship->_length / 2][$y + $y1 + $ship->_width / 2] = $ship->_image;
	}
	return ($map);
}
?>