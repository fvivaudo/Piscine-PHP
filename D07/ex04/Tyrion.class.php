<?php
class Tyrion extends Lannister
{
	public function sleepWith($rhs)
	{
		if (get_class($rhs) == "Sansa")
			echo ("Let's do this." . PHP_EOL);
		else
			echo ("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>