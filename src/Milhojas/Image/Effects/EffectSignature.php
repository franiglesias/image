<?php

use Milhojas\Image\Abstracts\AbstractEffect;
use Milhojas\Image\Services\CanvasService;
use Milhojas\Image\Values\Text;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Adds a signature text, creating a full width translucent box ($opacity 0 - 100) to write the text.
 *
 * Text must be passed as a ImageText object so it can contain all needed information
 *
 * @author Fran Iglesias
 */
class EffectSignature extends AbstractEffect
{
    protected $Text;
    protected $Color;
    protected $Canvas;

    public function __construct(ImageInterface $Image, Text $Text, Color $Color, $opacity = 50)
    {
        $this->Image = $Image;
        $this->intensity = $opacity;
        $this->Text = $Text;
        $CanvasService = new CanvasService();
        $this->Canvas = $CanvasService->get($this->size(), $Color);
    }

    public function apply()
    {
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
            0, $this->size()->height() - $height, 0, 0,
            $this->size()->width(),
            $height,
            $this->intensity
        );
    }

    private function applyText()
    {
        $this->Text->applyTo($this->Image->get());
    }
}
