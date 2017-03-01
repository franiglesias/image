<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Colorizes an image, based on grey levels.
 *
 * Color is an Hex web color
 * Intensity from -100 to 100
 *
 * Negative intensities may produce strange results, but they're funny
 *
 * @author Fran Iglesias
 */
class EffectColorize extends Effect
{
    protected $Color;
    protected $Canvas;

    public function __construct(Color $Color, $intensity = 60)
    {
        $this->intensity = $intensity;
        $this->Color = $Color;
    }

    public function apply(ImageInterface $image)
    {
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($image->size(), $this->Color);

        imagecopymergegray(
            $image->get(),
            $this->Canvas->get(),
            0, 0, 0, 0,
            $image->size()->width(),
            $image->size()->height(),
            $this->intensity
        );
    }
}
