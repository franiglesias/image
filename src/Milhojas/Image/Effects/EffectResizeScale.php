<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Scales image without keeping aspect ratio.
 */
class EffectResizeScale extends Effect
{
    protected $TargetSize;
    protected $Canvas;

    public function __construct(Size $NewSize)
    {
        $this->TargetSize = $NewSize;
    }

    public function apply(ImageInterface $image)
    {
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($this->TargetSize);
        $OldSize = $image->size();
        imagecopyresampled(
            $this->Canvas->get(),
            $image->get(),
            0, 0, 0, 0,
            $this->Canvas->width(),
            $this->Canvas->height(),
            $OldSize->width(),
            $OldSize->height()
        );
        $image->set($this->Canvas->get());
    }
}
