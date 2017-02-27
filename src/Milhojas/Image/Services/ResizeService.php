<?php

class ImageResizeService
{
	private $Original;
	private $Target;
	
	function __construct(ImageSize $Original, ImageSize $Target)
	{
		$this->Original = $Original;
		$this->Target = $Target;
	}
	
	public function fit()
	{
		$deltaX = $this->Target->width() / $this->Original->width();
		$deltaY = $this->Target->height() / $this->Original->height();
		if ($deltaX > $deltaY) {
			$deltaX = $deltaY;
		} else {
			$deltaY = $deltaX;
		}
		return new ImageSize($deltaX*$this->Original->width(), $deltaY*$this->Original->height());
	}
	
	public function fill()
	{
		$deltaX = $this->Target->width() / $this->Original->width();
		$deltaY = $this->Target->height() / $this->Original->height();
		
		if ($deltaX < $deltaY) {
			$deltaX = $deltaY;
		} else {
			$deltaY = $deltaX;
		}
		
		return new ImageSize($deltaX*$this->Original->width(), $deltaY*$this->Original->height());
	}
}


?>