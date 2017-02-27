<?php

namespace Milhojas\Image\Values;

class Coordinates
{
	private $x;
	private $y;
	function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function x()
	{
		return $this->x;
	}

	public function y()
	{
		return $this->y;
	}
}


?>
