<?php
class NightsWatch
{
	public function fight()
	{
		//$this->fight();
	}
	public function recruit($rhs)
	{
		$tmp = class_implements(get_class($rhs));
		if ($tmp['IFighter'])
		{
			$rhs->fight();
		}
	}
}
?>