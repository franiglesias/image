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

    /**
     * Computes proportional size to fill the $Target Size.
     *
     * @param Size $Target
     */
    public function fill(Size $Target)
    {
        $deltaX = $Target->width() / $this->width;
        $deltaY = $Target->height() / $this->height;

        if ($deltaX < $deltaY) {
            $deltaX = $deltaY;
        } else {
            $deltaY = $deltaX;
        }

        return new self($deltaX * $this->width, $deltaY * $this->height);
    }

    /**
     * Computes proportional size to fit in $Target size.
     *
     * @param Size $Target
     */
    public function fit(Size $Target)
    {
        $deltaX = $Target->width() / $this->width;
        $deltaY = $Target->height() / $this->height;
        if ($deltaX > $deltaY) {
            $deltaX = $deltaY;
        } else {
            $deltaY = $deltaX;
        }

        return new self($deltaX * $this->width, $deltaY * $this->height);
    }
}
