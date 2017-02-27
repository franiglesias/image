<?php

use Milhojas\Image\services\ImageCanvasService;
use Milhojas\Image\services\ImageCropService;

class EffectResizeFill extends AbstractEffect
{
    protected $Cropper;

    public function __construct(ImageInterface $Image, ImageSize $NewSize)
    {
        $this->Image = $Image;
        $this->TargetSize = $NewSize;
        $CanvasService = new ImageCanvasService();
        $this->Canvas = $CanvasService->get($this->size()->fill($NewSize));
        $From = new FiCoordinates(
            ($this->Canvas->width() - $this->TargetSize->width()) / 2,
            ($this->Canvas->height() - $this->TargetSize->height()) / 2
        );
        $this->Cropper = new ImageCropService($From, $this->TargetSize);
    }

    public function apply()
    {
        imagecopyresampled(
            $this->Canvas->get(),
            $this->Image->get(),
            0, 0, 0, 0,
            $this->Canvas->width(),
            $this->Canvas->height(),
            $this->size()->width(),
            $this->size()->height()
        );
        $result = $this->Cropper->crop($this->Canvas->get());
        $this->Image->set($result->get());
    }
}
