<?php
require_once 'Ship.class.php';
require_once 'Weapon.class.php';
function action($action, $map)
{
	session_start();
	if ($action == 'left')
	{
		if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == N)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = W;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == W)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = S;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == S)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = E;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == E)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = N;
	}
	if ($action == 'right')
	{
		if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == N)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = E;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == E)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = S;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == S)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = W;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == W)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->orientation = N;
	}
	if ($action == 'advance')
	{
		if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == W)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->position[1]--;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == E)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->position[1]++;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == S)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]++;
		else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == N)
			$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]--;
	}
	if ($action == 'shoot')
	{
		if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == E)
		{
			for ($i = 0; $map[$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]][$i] != '0'; $i++);
			{
				if ($i > 150)
					break;
			}
			echo "i1   " . $i; 
			for ($i = 0; $map[$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]][$i] == '0'; $i++)
			{
				echo $map[$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]][$i] . "|";
				if ($i > 150)
					break;
			}
			echo "i   " . $i . "pos ". $_SESSION['fleet'][$_SESSION['select'] - 1]->position[0];
			if ($map[$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]][$i] != '0')
			{
				echo "Boom";
				$_SESSION['fleet'][$target = select_ship($_SESSION['fleet'][$_SESSION['select'] - 1]->position[0], $i, $_SESSION['fleet'])]->hull--;
				echo "target = " . $target . "  ";
				if ($_SESSION['fleet'][$target]->hull == 0)
					unset($_SESSION['fleet'][$target]);

				echo "hull = " . $_SESSION['fleet'][select_ship($i, $_SESSION['fleet'][$_SESSION['select'] - 1]->position[0], $fleet)]->hull;
			//	print $_SESSION['fleet'][select_ship($i, $_SESSION['fleet'][$_SESSION['select'] - 1]->position[1], $fleet)];
			}
		}
	
	//	else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == E)
	//	{
	//		$_SESSION['fleet'][$_SESSION['select'] - 1]->position[1]++;
	//	}
	//	else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == S)
	//	{
	//		$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]++;
	//	}
	//	else if ($_SESSION['fleet'][$_SESSION['select'] - 1]->orientation == N)
	//	{
	//		$_SESSION['fleet'][$_SESSION['select'] - 1]->position[0]--;
	//	}
	}
	return;
}
?>