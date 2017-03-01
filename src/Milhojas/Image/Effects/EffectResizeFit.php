<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Resizes an image proportionally to fit in the target size.
 */
class EffectResizeFit extends Effect
{
    private $TargetSize;

    public function __construct(Size $NewSize)
    {
        $this->TargetSize = $NewSize;
    }

    public function apply(ImageInterface $image)
    {
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($image->size()->fit($this->TargetSize));

        imagecopyresampled(
            $this->Canvas->get(),
            $image->get(),
            0, 0, 0, 0,
            $this->Canvas->width(),
            $this->Canvas->height(),
            $image->size()->width(),
            $image->size()->height()
        );
        $image->set($this->Canvas->get());
    }
}
