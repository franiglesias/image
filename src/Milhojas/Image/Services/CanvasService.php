<?php

namespace Milhojas\Image\Services;

use Milhojas\Image\Values\Canvas;
use Milhojas\Image\Values\NullCanvas;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Values\Size;

class CanvasService
{
    public function __construct()
    {
    }

    public function get(Size $Size, Color $Color = null)
    {
        if (!$Color) {
            $Color = new Color('fff');
        }

        return new Canvas($Size, $Color);
    }

    public function null()
    {
        return new NullCanvas();
    }
}
