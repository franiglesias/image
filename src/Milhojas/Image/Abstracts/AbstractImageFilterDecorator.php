<?php

namespace Milhojas\Image\Abstracts;

abstract class AbstractImageFilterDecorator extends AbstractImageDecorator
{
    protected $intensity;
    protected $maxIntensity = 255;

    protected function normalize($intensity)
    {
        return floor($intensity * $this->maxIntensity / 100);
    }

    public function write()
    {
        $this->apply();
        $this->Image->write();
    }
}
