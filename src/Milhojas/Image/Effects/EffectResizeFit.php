<?php

use Milhojas\Image\effects\ImageResizeScale;
use Milhojas\Image\services\ImageResizeService;
use Milhojas\Image\services\ImageCanvasServices;

class ImageResizeFit extends AbstractEffect
{
	function __construct(ImageInterface $Image, ImageSize $NewSize)
	{
		$this->Image = $Image;
		$this->TargetSize = $NewSize;
		// $Resizer = new ImageResizeService($this->size(), $this->TargetSize);
		$CanvasService = new ImageCanvasService();
		$this->Canvas = $CanvasService->get($this->size()->fit($NewSize));
	}
	
	public function apply()
	{
		imagecopyresampled(
			$this->Canvas->get(), 
			$this->Image->get(), 
			0, 0, 0, 0, 
			$this->Canvas->width(), 
			$this->Canvas->height(), 
			$this->Image->size()->width(), 
			$this->Image->size()->height()
		);
		$this->Image->set($this->Canvas->get());
	}
		
}



?>