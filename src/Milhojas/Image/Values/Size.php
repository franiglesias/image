<?php

namespace Milhojas\Image\Values;

class Size
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function width()
    {
        return $this->width;
    }

    public function height()
    {
        return $this->height;
    }

    public function fill(ImageSize $Target)
    {
        $deltaX = $Target->width() / $this->width;
        $deltaY = $Target->height() / $this->height;

        if ($deltaX < $deltaY) {
            $deltaX = $deltaY;
        } else {
            $deltaY = $deltaX;
        }

        return new ImageSize($deltaX * $this->width, $deltaY * $this->height);
    }

    public function fit(ImageSize $Target)
    {
        $deltaX = $Target->width() / $this->width;
        $deltaY = $Target->height() / $this->height;
        if ($deltaX > $deltaY) {
            $deltaX = $deltaY;
        } else {
            $deltaY = $deltaX;
        }

        return new ImageSize($deltaX * $this->width, $deltaY * $this->height);
    }
}
