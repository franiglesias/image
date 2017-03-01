<?php

namespace Milhojas\Image\Services;

use Milhojas\Image\Values\Coordinates;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Values\Canvas;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Crops an image to a given size, from given coordinates.
 */
class CropService
{
    private $Coordinates;
    private $Size;
    private $Canvas;

    public function __construct(Coordinates $Coord, Size $Size)
    {
        $this->Coordinates = $Coord;
        $this->Size = $Size;
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($this->Size);
    }

    /**
     * @param ImageInterface $image
     *
     * @return Canvas for cropped image
     */
    public function crop($image)
    {
        imagecopyresampled(
            $this->Canvas->get(),
            $image,
            0, 0, $this->Coordinates->x(), $this->Coordinates->y(),
            $this->Canvas->width(),
            $this->Canvas->height(),
            $this->Canvas->width(),
            $this->Canvas->height()
        );

        return $this->Canvas;
    }
}
