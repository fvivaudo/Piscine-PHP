<?php
require_once '../ex00/Color.class.php';
class Vertex
{
	public static $verbose = 0;
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	private $_color = 0;

	public function __get ($att)
	{
		return ($this->$att);
	}
	public function __set ($att, $value)
	{
		return ;
	}
	public static function doc()
	{
		echo (file_get_contents("Vertex.doc.txt"));
	}
	function __construct(Array $args)
	{
		$this->_x = (double)$args['x'];
		$this->_y = (double)$args['y'];
		$this->_z = (double)$args['z'];
		$this->_color = $args['color'];
		if ($args['color'])
			$this->_color = $args['color'];
		else
			$this->_color = new Color( array( 'red' => 255   , 'green' => 255   , 'blue' => 255 ));
		if (Vertex::$verbose == True)
		{
				printf("Vertex( x:%.2f, y:%.2f, z:%.2f, w: %.2f, (Color( red:%4d, green:%4d, blue:%4d ) ) ", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			print('constructed'.PHP_EOL);
		}
		return $this;
	}
	function __destruct()
	{
		if (Vertex::$verbose == True)
		{
				printf("Vertex( x:%.2f, y:%.2f, z:%.2f, w: %.2f, (Color( red:%4d, green:%4d, blue:%4d ) ) ", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			print('destructed'.PHP_EOL);
		}
		return;
	}
    function __toString()
    {
    		if (Vertex::$verbose == True)
				return sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f, w: %.2f, (Color( red:%4d, green:%4d, blue:%4d ) ) ", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			else
				return sprintf("Vertex( x:%.2f, y:%.2f, z:%.2f, w: %.2f ) ", $this->_x, $this->_y, $this->_z, $this->_w);
    }
}
?>