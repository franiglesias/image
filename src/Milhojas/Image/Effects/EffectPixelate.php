<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Creates a pixelated effect. Intensity from 0 to 100.
 *
 * @author Fran Iglesias
 */
class EffectPixelate extends AbstractEffect
{
    protected $Canvas;
    public function __construct($intensity = 50, $module = 4)
    {
        $this->maxIntensity = $module;
        $this->intensity = $intensity;
    }

    protected function normalize($intensity)
    {
        if (!$intensity) {
            $intensity = 1;
        }
        $Size = $this->Canvas->size();
        if ($Size->width() < $Size->height()) {
            return $Size->width() * $this->pixelationFactor($intensity);
        } else {
            return $Size->height() * $this->pixelationFactor($intensity);
        }
    }

    private function pixelationFactor($intensity)
    {
        return $intensity / (100 * $this->maxIntensity);
    }

    public function apply(ImageInterface $image)
    {
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($image->size());

        $this->intensity = $this->normalize($this->intensity);

        $xPixelation = round($image->size()->width() / $this->intensity);
        $yPixelation = round($image->size()->height() / $this->intensity);
        imagecopyresized(
            $this->Canvas->get(),
            $image->get(),
            0, 0, 0, 0,
            $xPixelation,
            $yPixelation,
            $image->size()->width(),
            $image->size()->height()
        );
        imagecopyresized(
            $image->get(),
            $this->Canvas->get(),
            0, 0, 0, 0,
            $image->size()->width(),
            $image->size()->height(),
            $xPixelation,
            $yPixelation
        );
    }
}
