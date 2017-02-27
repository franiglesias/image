<?php

use Milhojas\Image\services\ImageCanvasService;
use Milhojas\Image\values\FiCoordinates;
/**
* 
*/
class ImageCropService
{
	private $Coordinates;
	private $Size;
	private $Canvas;
	
	function __construct(FiCoordinates $Coord, ImageSize $Size)
	{
		$this->Coordinates = $Coord;
		$this->Size = $Size;
		$CanvasService = new ImageCanvasService();
		$this->Canvas = $CanvasService->get($this->Size);
	}
	
	public function crop($image)
	{
		imagecopyresampled(
			$this->Canvas->get(), 
			$image, 
			0, 0, $this->Coordinates->x(), $this->Coordinates->y(), 
			$this->Canvas->width(), 
			$this->Canvas->height(), 
			$this->Canvas->width(), 
			$this->Canvas->height() 
		);
		return $this->Canvas;
	}
}


?>