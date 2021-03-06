<?php

namespace Milhojas\Image\Values;

/**
 * Represents the canvas that contains an image.
 */
class Canvas
{
    /**
     * @var resource
     */
    private $resource;
    /**
     * The width and height of the canvas.
     *
     * @var Size
     */
    private $Size;

    public function __construct(Size $Size, Color $Color)
    {
        $this->Size = $Size;
        $this->resource = $this->create($Color);
    }

    protected function create(Color $Color)
    {
        $canvas = imagecreatetruecolor($this->Size->width(), $this->Size->height());
        imagealphablending($canvas, false);
        imagesavealpha($canvas, true);
        imagefill($canvas, 0, 0, $Color->get());

        return $canvas;
    }

    public function get()
    {
        return $this->resource;
    }

    public function size()
    {
        return $this->Size;
    }

    public function width()
    {
        return $this->Size->width();
    }

    public function height()
    {
        return $this->Size->height();
    }
}
