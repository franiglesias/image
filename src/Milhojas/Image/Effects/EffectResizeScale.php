<?php

use Milhojas\Image\Effects\AbstractEffect;
use Milhojas\Image\services\ImageCanvasService;

class EffectResizeScale extends AbstractEffect
{
    protected $TargetSize;
    protected $Canvas;

    public function __construct(ImageInterface $Image, ImageSize $NewSize)
    {
        $this->Image = $Image;
        $this->TargetSize = $NewSize;
        $CanvasService = new ImageCanvasService();
        $this->Canvas = $CanvasService->get($NewSize);
    }

    public function apply()
    {
        $OldSize = $this->size();
        imagecopyresampled($this->Canvas->get(), $this->Image->get(), 0, 0, 0, 0, $this->Canvas->width(), $this->Canvas->height(), $OldSize->width(), $OldSize->height());
        $this->Image->set($this->Canvas->get());
    }
}
