<?php
require_once '../ex00/Color.class.php';
require_once '../ex01/Vertex.class.php';
class Vector
{
	public static $verbose = 0;
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 0;
	private $_orig;
	private $_dest;
	private $_div = 0;

	public function __get ($att)
	{
		return ($this->$att);
	}

	public static function doc()
	{
		echo (file_get_contents("Vector.doc.txt"));
	}
	function __construct(Array $args)
	{
		$this->_x = (double)$args['x'];
		$this->_y = (double)$args['y'];
		$this->_z = (double)$args['z'];
		$this->_w = (double)$args['w'];
		$this->_dest = $args['orig'];
		$this->_orig = $args['dest'];
		if ($args['orig'] || $args['dest'])
		{
			if (!$args['orig'])
				$args['orig'] = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
			if (!$args['dest'])
				$args['dest'] = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
			$this->_x = $this->_orig->_x - $this->_dest->_x;
			$this->_y = $this->_orig->_y - $this->_dest->_y;
			$this->_z = $this->_orig->_z - $this->_dest->_z;
		}
		if (Vector::$verbose == True)
		{			
				printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) ", $this->_x, $this->_y, $this->_z, $this->_w);
			print('constructed'.PHP_EOL);
		}
		return $this;
	}
	function __destruct()
	{
		if (Vector::$verbose == True)
		{
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) ", $this->_x, $this->_y, $this->_z, $this->_w);
			print('destructed'.PHP_EOL);
		}
		return;
	}
	function __toString()
	{
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) ", $this->_x, $this->_y, $this->_z, $this->_w);
	}
	function magnitude()
	{
		return (sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z));
	}
	function normalize()
	{
		$_div = $this->magnitude();
		if ($_div)
			return new Vector(array('x' => ($this->_x / $_div), 'y' => ($this->_y / $_div), 'z' => ($this->_z / $_div)));
		return new Vector(array('x' => 0, 'y' => 0, 'z' => 0));

	}
	function add($rhs)
	{
		return new Vector(array('x' => ($this->_x + $rhs->_x), 'y' => ($this->_y + $rhs->_y), 'z' => ($this->_z + $rhs->_z)));
	}
	function sub($rhs)
	{
		return new Vector(array('x' => ($this->_x - $rhs->_x), 'y' => ($this->_y - $rhs->_y), 'z' => ($this->_z - $rhs->_z)));
	}
	function opposite()
	{
		return new Vector(array('x' => ($this->_x * -1), 'y' => ($this->_y * -1), 'z' => ($this->_z * -1)));
	}
	function scalarProduct( $k )
	{
		return new Vector(array('x' => ($this->_x * $k), 'y' => ($this->_y * $k), 'z' => ($this->_z * $k)));
	}
	function dotProduct( $rhs )
	{
		return (($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
	}
	function cos( $rhs )
	{
		return ($this->dotProduct($rhs)/($this->magnitude() * $rhs->magnitude()));
	}
	function crossProduct( $rhs )
	{
		return new Vector(array('x' => ($this->_y * $rhs->_z - $this->_z * $rhs->_y), 'y' => ($this->_x * $rhs->_z - $this->_z * $rhs->_x), 'z' => ($this->_x * $rhs->_y - $this->_y * $rhs->_x)));
	}
}
?>