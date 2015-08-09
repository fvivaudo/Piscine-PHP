<?php
require_once 'Weapon.class.php';
class Ship
{
	public static $verbose = 0;
	const IMPERIAL_FRIGATE1 = 1;
	const IMPERIAL_FRIGATE2 = 2;
	const IMPERIAL_DESTROYER = 3;
	const IMPERIAL_CRUISER = 4;
	const ORK_FRIGATE1 = 5;
	const OEK_FRIGATE2 = 6;
	private $_pp;
	private $_name;
	private $_length;
	private $_width;
	public $hull;
	public $_shield;
	private $_movement;
	private $_speed;
	private $_weapon;
	private $_type;
	public $orientation;
	public $position;

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
		$this->orientation = $args['ORIENTATION'];
		$this->position = $args['POSITION'];
		$this->_type = $args['PRESET'];
		if ($args['PRESET'] == IMPERIAL_FRIGATE1)
		{
			$this->_name = "Honorable Duty";
			$this->_length = 4;
			$this->_width = 1;
			$this->hull = 5;
			$this->_pp = 10;
			$this->_speed = 15;
			$this->_mobility = 4;
			$this->_shield = 0;
			$this->_weapon = new Weapon(Array('PRESET' => LASER_BATTERY));
			if (self::$verbose == True)
			{
				echo "Imperial Frigate1 CONSTRUCTED." . PHP_EOL;
			}
		}
		if ($args['PRESET'] == IMPERIAL_FRIGATE2)
		{
			$this->_name = "Hand Of The Emperor";
			$this->_length = 4;
			$this->_width = 1;
			$this->hull = 5;
			$this->_pp = 10;
			$this->_speed = 15;
			$this->_mobility = 4;
			$this->_shield = 0;
			$this->_weapon = new Weapon(Array('PRESET' => SPEAR));
			if (self::$verbose == True)
			{
				echo "Imperial Frigate2 CONSTRUCTED." . PHP_EOL;
			}
		}
		if ($args['PRESET'] == IMPERIAL_DESTROYER)
		{
			$this->_name = "Sword Of Absolution";
			$this->_length = 3;
			$this->_width = 1;
			$this->hull = 4;
			$this->_pp = 10;
			$this->_speed = 18;
			$this->_mobility = 3;
			$this->_shield = 0;
			$this->_weapon = new Weapon(Array('PRESET' => LASER_BATTERY));
			if (self::$verbose == True)
			{
				echo "Imperial Destroyer CONSTRUCTED." . PHP_EOL;
			}
		}
		if ($args['PRESET'] == IMPERIAL_CRUISER)
		{
			$this->_name = "Imperator Deus";
			$this->_length = 7;
			$this->_width = 2;
			$this->hull = 8;
			$this->_pp = 12;
			$this->_speed = 10;
			$this->_mobility = 5;
			$this->_shield = 2;
			$this->_weapon = new Weapon(Array('PRESET' => HEAVY_SPEAR));
			if (self::$verbose == True)
			{
				echo "Imperial Cruiser CONSTRUCTED." . PHP_EOL;
			}
		}
		if ($args['PRESET'] == ORK_FRIGATE1)
		{
			$this->_name = "Orktobre Roug";
			$this->_length = 2;
			$this->_width = 1;
			$this->hull = 4;
			$this->_pp = 10;
			$this->_speed = 19;
			$this->_mobility = 3;
			$this->_shield = 0;
			$this->_weapon = new Weapon(Array('PRESET' => LASER_BATTERY));
			if (self::$verbose == True)
			{
				echo "Ork Frigate1 CONSTRUCTED." . PHP_EOL;
			}
		}
		if ($args['PRESET'] == ORK_FRIGATE2)
		{
			$this->_name = "Ork'N'Roll!";
			$this->_length = 5;
			$this->_width = 1;
			$this->hull = 6;
			$this->_pp = 10;
			$this->_speed = 12;
			$this->_mobility = 4;
			$this->_shield = 0;
			$this->_weapon = new Weapon(Array('PRESET' => HEAVY_MACHINEGUN));
			if (self::$verbose == True)
			{
				echo "Ork Frigate2 CONSTRUCTED." . PHP_EOL;
			}
		}
		if (self::$verbose == True)
		{
			printf("Name : %s\nSize : %d * %d\nHull : %d\nPower Points : %d\nSpeed :%d\nMobility : %d\nShield : %d\nOrientation : %s\nPosition : [%d][%d]\n\n", $this->_name, $this->_length,
			$this->_width, $this->hull, $this->_pp, $this->_speed, $this->_mobility, $this->_shield, $this->orientation, $this->position[0], $this->position[1]);
		}
		return $this;
	}
	function __toString()
	{
		return sprintf("Name : %s\nSize : %d * %d\nHull : %d\nPower Points : %d\nSpeed :%d\nMobility : %d\nShield : %d\nOrientation : %s\nPosition : [%d][%d]\n\n", $this->_name, $this->_length,
		$this->_width, $this->hull, $this->_pp, $this->_speed, $this->_mobility, $this->_shield, $this->orientation, $this->position[0], $this->position[1]);
	}
	function __destruct()
	{
			if (self::$verbose == True)
			{
				if ($this->_type == IMPERIAL_FRIGATE1)
					printf("Imperial Frigate1 ");
				if ($this->_type == IMPERIAL_FRIGATE2)
					printf("Imperial Frigate2 ");
				if ($this->_type == IMPERIAL_DESTROYER)
					printf("Imperial Destroyer ");
				if ($this->_type == IMPERIAL_CRUISER)
					printf("Imperial Cruiser ");
				if ($this->_type == ORK_FRIGATE1)
					printf("Ork Frigate1 ");
				if ($this->_type == ORK_FRIGATE2)
					printf("Ork Frigate2 ");
				printf("DESTRUCTED\nName : %s\nSize : %d * %d\nHull : %d\nPower Points : %d\nSpeed :%d\nMobility : %d\nShield : %d\nOrientation : %s\nPosition : [%d][%d]\n\n", $this->_name, $this->_length,
			$this->_width, $this->hull, $this->_pp, $this->_speed, $this->_mobility, $this->_shield, $this->orientation, $this->position[0], $this->position[1]);
			}
		return;
	}
}
?>