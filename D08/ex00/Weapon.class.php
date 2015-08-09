<?php
class Weapon
{
	public static $verbose = 0;
	const LASER_BATTERY = 1;
	const SPEAR = 2;
	const HEAVY_SPEAR = 3;
	const HEAVY_MACHINEGUN= 4;
	const MACRO_CANON = 5;
	private $_name;
	private $_charge;
	private $_short_range;
	private $_mid_range;
	private $_long_range;
	private $_type;

	public function __get ($att)
	{
		return ($this->$att);
	}
	public static function doc()
	{
		echo (file_get_contents("Ship.doc.txt"));
	}
	function __construct(Array $args)
	{
		if ($args['PRESET'] = LASER_BATTERY)
		{
			$this->_name = "LASER_BATTERY";
			$this->_charge = 0;
			$this->_short_range[0] = 1;
			$this->_short_range[1] = 10;
			$this->_mid_range[0] = 11;
			$this->_mid_range[1] = 20;
			$this->_long_range[0] = 21;
			$this->_long_range[1] = 30;
			if (self::$verbose == True)
			{
				echo "LASER_BATTERY CONSTRUCTED" . PHP_EOL;
			}
		//	$this->_type = ;
		}
		if ($args['PRESET'] = SPEAR)
		{
			$this->_name = "SPEAR";
			$this->_charge = 0;
			$this->_short_range[0] = 1;
			$this->_short_range[1] = 30;
			$this->_mid_range[0] = 31;
			$this->_mid_range[1] = 60;
			$this->_long_range[0] = 61;
			$this->_long_range[1] = 90;
			if (self::$verbose == True)
			{
				echo "SPEAR CONSTRUCTED" . PHP_EOL;
			}
		//	$this->_type = ;
		}
		if ($args['PRESET'] = HEAVY_SPEAR)
		{
			$this->_name = "HEAVY_SPEAR";
			$this->_charge = 3;
			$this->_short_range[0] = 1;
			$this->_short_range[1] = 30;
			$this->_mid_range[0] = 31;
			$this->_mid_range[1] = 60;
			$this->_long_range[0] = 61;
			$this->_long_range[1] = 90;
			if (self::$verbose == True)
			{
				echo "HEAVY_SPEAR CONSTRUCTED" . PHP_EOL;
			}
		//	$this->_type = ;
		}
		if ($args['PRESET'] = HEAVY_MACHINEGUN)
		{
			$this->_name = "HEAVY_MACHINEGUN";
			$this->_charge = 5;
			$this->_short_range[0] = 1;
			$this->_short_range[1] = 3;
			$this->_mid_range[0] = 4;
			$this->_mid_range[1] = 7;
			$this->_long_range[0] = 8;
			$this->_long_range[1] = 10;
			if (self::$verbose == True)
			{
				echo "HEAVY_MACHINEGUN CONSTRUCTED" . PHP_EOL;
			}
		//	$this->_type = ;
		}
		if ($args['PRESET'] = MACRO_CANON)
		{
			$this->_name = "MACRO_CANON";
			$this->_charge = 0;
			$this->_short_range[0] = 1;
			$this->_short_range[1] = 10;
			$this->_mid_range[0] = 11;
			$this->_mid_range[1] = 20;
			$this->_long_range[0] = 21;
			$this->_long_range[1] = 30;
			if (self::$verbose == True)
			{
				echo "MACRO_CANON CONSTRUCTED" . PHP_EOL;
			}
		//	$this->_type = ;
		}
		if (self::$verbose == True)
		{

		}
		return $this;
	}
	function __destruct()
	{
			if (self::$verbose == True)
			{
				echo "WEAPON DESTRUCTED" . PHP_EOL;
			}
		return;
	}
}
?>