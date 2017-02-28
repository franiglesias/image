<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Text;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Adds a signature text, creating a full width translucent box ($opacity 0 - 100) to write the text.
 *
 * Text must be passed as a Text object so it can contain all needed information
 *
 * @author Fran Iglesias
 */
class EffectSignature extends AbstractEffect
{
    protected $Text;
    protected $Color;
    protected $Canvas;

    public function __construct(Text $Text, Color $Color, $opacity = 50)
    {
        $this->intensity = $opacity;
        $this->Text = $Text;
        $this->Color = $Color;
    }

    public function apply(ImageInterface $image)
    {
        $this->Image = $image;
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($image->size(), $this->Color);
        $this->applyBox();
        $this->applyText();
    }

    // Steps

    private function applyBox()
    {
        $height = $this->Text->height();
        imagecopymerge(
            $this->Image->get(),
            $this->Canvas->get(),
            0, $this->Image->size()->height() - $height, 0, 0,
            $this->Image->size()->width(),
            $height,
            $this->intensity
        );
    }

    private function applyText()
    {
        $this->Text->applyTo($this->Image->get());
    }
}
