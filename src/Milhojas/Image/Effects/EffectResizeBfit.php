<?php

use Milhojas\Image\Effects\EffectResizeScale;
use Milhojas\Image\Services\ResizeService;
use Milhojas\Image\Services\CanvasServices;
use Milhojas\Image\Values\Coordinates;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Interfaces\ImageInterface;

class ImageResizeBfit extends AbstractEffect
{
	protected $Position;

	function __construct(ImageInterface $Image, Size $NewSize)
	{
		$this->Image = $Image;
		$this->TargetSize = $NewSize;
		$CanvasService = new CanvasService();
		$this->Canvas = $CanvasService->get($this->TargetSize);
		$this->Position = new Coordinates(
			($this->TargetSize->width() - $this->size()->fit($this->TargetSize)->width())/2,
			($this->TargetSize->height() - $this->size()->fit($this->TargetSize)->height())/2
		);
	}

	public function apply()
	{
		imagecopyresampled(
			$this->Canvas->get(),
			$this->Image->get(),
			$this->Position->x(),
			$this->Position->y(),
			0, 0,
			$this->size()->fit($this->TargetSize)->width(),
			$this->size()->fit($this->TargetSize)->height(),
			$this->size()->width(),
			$this->size()->height()
		);
		$this->Image->set($this->Canvas->get());
	}

}



?>
