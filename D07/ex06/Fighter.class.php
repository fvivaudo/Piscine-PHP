<?php
class Fighter extends UnholyFactory
{
	function __construct($rhs)
	{
		if ($rhs == "crippled soldier")
			$this->fight();
		return ;
	}
}
?>