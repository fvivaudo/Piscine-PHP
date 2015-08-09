<?php
class Jaime extends Lannister
{
	public function sleepWith($rhs)
	{
		if (get_class($rhs) == "Cersei")
			echo ("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		else if (get_class($rhs) == "Tyrion")
			echo ("Not even if I'm drunk !" . PHP_EOL);
		else
			echo ("Let's do this." . PHP_EOL);
	}
}
?>