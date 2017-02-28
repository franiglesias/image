<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Coordinates;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Resize image to fit in a target Size keeping aspect ratio and background if needed, so the new image has exactly the target size.
 */
class EffectResizeBfit extends AbstractEffect
{
    protected $Position;
    protected $TargetSize;
    protected $Canvas;

    public function __construct(Size $NewSize)
    {
        $this->TargetSize = $NewSize;
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($this->TargetSize);
    }

    public function apply(ImageInterface $image)
    {
        $this->Position = new Coordinates(
            ($this->TargetSize->width() - $image->size()->fit($this->TargetSize)->width()) / 2,
            ($this->TargetSize->height() - $image->size()->fit($this->TargetSize)->height()) / 2
        );

        imagecopyresampled(
            $this->Canvas->get(),
            $image->get(),
            $this->Position->x(),
            $this->Position->y(),
            0, 0,
            $image->size()->fit($this->TargetSize)->width(),
            $image->size()->fit($this->TargetSize)->height(),
            $image->size()->width(),
            $image->size()->height()
        );
        $image->set($this->Canvas->get());
    }
}
