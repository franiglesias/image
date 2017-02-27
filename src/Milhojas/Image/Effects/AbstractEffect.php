<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

abstract class AbstractEffect
{
    protected $intensity;
    protected $maxIntensity = 255;
    protected $next;

    protected function normalize($intensity)
    {
        return floor($intensity * $this->maxIntensity / 100);
    }

    public function write(ImageInterface $image)
    {
        $this->apply($image);
        if ($this->next) {
            $this->next->write($image);
        }
        $image->write($image);
    }
}
