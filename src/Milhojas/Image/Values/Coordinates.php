<?php

namespace Milhojas\Image\Values;

/**
 * Pair of coordinates to define a pixel in a image.
 */
class Coordinates
{
    private $x;
    private $y;
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x()
    {
        return $this->x;
    }

    public function y()
    {
        return $this->y;
    }
}
