<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Services\CropService;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Values\Coordinates;

/**
 * Resize an image to a given target size scaling proportionally and filling it completely.
 */
class EffectResizeFill extends AbstractEffect
{
    protected $Cropper;
    protected $TargetSize;

    public function __construct(Size $NewSize)
    {
        $this->TargetSize = $NewSize;
    }

    public function apply(ImageInterface $image)
    {
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($image->size()->fill($this->TargetSize));
        $From = new Coordinates(
            ($this->Canvas->width() - $this->TargetSize->width()) / 2,
            ($this->Canvas->height() - $this->TargetSize->height()) / 2
        );
        $this->Cropper = new CropService($From, $this->TargetSize);
        imagecopyresampled(
            $this->Canvas->get(),
            $image->get(),
            0, 0, 0, 0,
            $this->Canvas->width(),
            $this->Canvas->height(),
            $image->size()->width(),
            $image->size()->height()
        );
        $result = $this->Cropper->crop($this->Canvas->get());
        $image->set($result->get());
    }
}
