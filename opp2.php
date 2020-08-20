<?php

	/**
	 * 
	 */
	class Circle
	{
		const pi = 3.142; 
		public function Area($rad)
		{
			return 'The Area of the Circle is ' . self::pi * ($rad*$rad);	
		}
	}

	$circle = new Circle;
	echo $circle->Area(2);
	
	
	/**
	 * 
	 */
	class cons
	{
		public function __construct($some)
		{
			$this->say($some);
		}
		public function say($some)
		{
			echo $some;
		}
	}

	$name = new cons("<br> Evans my nigga");


	
?>