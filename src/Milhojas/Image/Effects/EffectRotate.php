<?php

use Milhojas\Image\Effects\AbstractEffect;

class EffectRotate extends AbstractEffect
{
    protected $degrees;

    public function __construct(ImageInterface $Image, $degrees)
    {
        $this->Image = $Image;
        $this->degrees = $degrees;
    }

    public function apply()
    {
        $Transparent = new ImageColor('000', 0);
        $tmp = imagerotate($this->Image->get(), $this->degrees, $Transparent->get(), 0);
        imagedestroy($this->Image->get());
        $this->Image->set($tmp);
        imagealphablending($this->Image->get(), false);
        imagesavealpha($this->Image->get(), true);
    }
}
