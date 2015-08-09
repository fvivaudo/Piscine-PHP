<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
function collide($map)
{
	$ship = $_SESSION['fleet'][$_SESSION['select']]; //penser a l'inertie pour ne pas passer au travers des objets
	if ($ship->orientation == 'W')
	{
		if (($ship->_length % 2) == 0)
		{
			if ($map[$ship->position[0]][$ship->position[1] - 1 - ($ship->_length / 2)] != '0')
			{
				echo ($ship);
			}
		}
		else
		{
			if ($map[$ship->position[0]][$ship->position[1] - 1 - ($ship->_length / 2)] != '0')
			{
				echo ($ship);
			}
		}
	}
	else if ($ship->orientation == 'E')
	{
		if (($ship->_length % 2) == 0)
		{
			if ($map[$ship->position[0]][$ship->position[1] + 1 + ($ship->_length / 2) - 1] != '0')
			{
				echo ($ship);
			}
		}
		else
		{
			if ($map[$ship->position[0]][$ship->position[1] + 1 + ($ship->_length / 2)] != '0')
			{
				echo ($ship);
			}
		}
	}
	else if ($ship->orientation == 'S')
	{
		if (($ship->_length % 2) == 0)
		{
			if ($map[$ship->position[0] + 1 + ($ship->_length / 2) + 1][$ship->position[1] - 1] != '0')
			{
				echo ($ship);
			}
		}
		else
		{
			if ($map[$ship->position[0] + 1 + ($ship->_length / 2)][$ship->position[1] - 1] != '0')
			{
				echo ($ship);
			}
		}
	}
	else if ($ship->orientation == 'N')
	{
		if (($ship->_length % 2) == 0)
		{
			if ($map[$ship->position[0] - 1 - ($ship->_length / 2)][$ship->position[1] - 1] != '0')
			{
				echo ($ship);
			}
		}
		else
		{
			if ($map[$ship->position[0] - 1 - ($ship->_length / 2)][$ship->position[1] - 1] != '0')
			{
				echo ($ship);
			}
		}

	}
}
function action($action, $map)
{
	session_start();
	$ship = $_SESSION['fleet'][$_SESSION['select']];
	if ($action == 'left')
	{
		if ($ship->orientation == 'N')
			$ship->orientation = 'W';
		else if ($ship->orientation == 'W')
			$ship->orientation = 'S';
		else if ($ship->orientation == 'S')
			$ship->orientation = 'E';
		else if ($ship->orientation == 'E')
			$ship->orientation = 'N';
	}
	if ($action == 'right')
	{
		if ($ship->orientation == 'N')
			$ship->orientation = 'E';
		else if ($ship->orientation == 'E')
			$ship->orientation = 'S';
		else if ($ship->orientation == 'S')
			$ship->orientation = 'W';
		else if ($ship->orientation == 'W')
			$ship->orientation = 'N';
	}
	if ($action == 'advance')
	{
		collide($map);

		if ($ship->orientation == 'W')
			$ship->position[1]--;
		else if ($ship->orientation == 'E')
			$ship->position[1]++;
		else if ($ship->orientation == 'S')
			$ship->position[0]++;
		else if ($ship->orientation == 'N')
			$ship->position[0]--;
	}
	if ($action == 'shoot')
	{
		if ($ship->orientation == 'E')
		{
			for ($i = 0; $map[$ship->position[0]][$i] != '0'; $i++);
			{
				if ($i > 150)
					break;
			}
			echo "i1   " . $i; 
			for ($i = $i; $map[$ship->position[0]][$i] == '0'; $i++)
			{
				echo $map[$ship->position[0]][$i] . "|";
				if ($i > 150)
					break;
			}
			echo "i   " . $i . "pos ". $ship->position[0];
			if ($map[$ship->position[0]][$i] != '0')
			{
				echo "Boom";
				$_SESSION['fleet'][$target = select_ship($ship->position[0], $i, $_SESSION['fleet'])]->hull--;
				echo "target = " . $target->_name . "  ";
				if ($_SESSION['fleet'][$target]->hull == 0)
					unset($_SESSION['fleet'][$target]);

				echo "hull = " . $_SESSION['fleet'][select_ship($i, $ship->position[0], $fleet)]->hull;
			}
		}
		if ($ship->orientation == 'W')
		{
			for ($i = $ship->position[1]; $map[$ship->position[0]][$i] != '0'; $i--);
			{
				if ($i < 0)
					break;
			}
			echo "i2   " . $i; 
			for ($i = $i; $map[$ship->position[0]][$i] == '0'; $i--)
			{
				echo $map[$ship->position[0]][$i] . "|";
				if ($i < 0)
					break;
			}
			echo "i3   " . $i . "what"; 
			echo "i   " . $i . "pos ". $ship->position[0];
			if ($map[$ship->position[0]][$i] != '0' && $i >= 0)
			{
				echo "Boom2";
				$_SESSION['fleet'][$target = select_ship($ship->position[0], $i, $_SESSION['fleet'])]->hull--;
				echo "target = " . $target->_name . "  ";
				if ($_SESSION['fleet'][$target]->hull == 0)
					unset($_SESSION['fleet'][$target]);

				echo "hull = " . $_SESSION['fleet'][select_ship($i, $ship->position[0], $fleet)]->hull;
			}
		}
		if ($ship->orientation == 'N')
		{
			for ($i = $ship->position[0]; $map[$i][$ship->position[1] - 1] != '0'; $i--);
			{
				if ($i < 0)
					break;
			}
			echo "i4   " . $i; 
			for ($i = $i; $map[$i][$ship->position[1] - 1] == '0'; $i--)
			{
				echo $map[$i][$ship->position[1] - 1] . "|";
				if ($i < 0)
					break;
			}
			echo "i3   " . $i . "what"; 
			echo "i   " . $i . "pos ". $ship->position[1];
			if ($map[$i][$ship->position[1] - 1] != '0' && $i >= 0)
			{
				echo "Boom2";
				$_SESSION['fleet'][$target = select_ship($i, $ship->position[1],  $_SESSION['fleet'])]->hull--;
				echo "target = " . $_SESSION['fleet'][$target] . "  ";
				if ($_SESSION['fleet'][$target]->hull == 0)
					unset($_SESSION['fleet'][$target]);

				echo "hull = " . $_SESSION['fleet'][select_ship($i, $ship->position[1], $fleet)]->hull;
			}
		}
		if ($ship->orientation == 'S')
		{
			for ($i = $ship->position[0]; $map[$i][$ship->position[1] - 1] != '0'; $i++);
			{
				if ($i > 100)
					break;
			}
			echo "i4   " . $i; 
			for ($i = $i; $map[$i][$ship->position[1] - 1] == '0'; $i++)
			{
				echo $map[$i][$ship->position[1] - 1] . "|";
				if ($i > 100)
					break;
			}
			echo "i3   " . $i . "what"; 
			echo "i   " . $i . "pos ". $ship->position[1];
			if ($map[$i][$ship->position[1] - 1] != '0' && $i < 100)
			{
				echo "Boom2";
				$_SESSION['fleet'][$target = select_ship($i, $ship->position[1],  $_SESSION['fleet'])]->hull--;
				echo "target = " . $_SESSION['fleet'][$target] . "  ";
				if ($_SESSION['fleet'][$target]->hull == 0)
					unset($_SESSION['fleet'][$target]);

				echo "hull = " . $_SESSION['fleet'][select_ship($i, $ship->position[1], $fleet)]->hull;
			}
		}
	}
	return;
}
?>