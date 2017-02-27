<?php

namespace Milhojas\Image\Formats;

use Milhojas\Image\Abstracts\AbstractImageFileDecorator;

class PngImage extends AbstractImageFileDecorator
{
    protected $quality = 0;

    public function read()
    {
        $this->Image->set(imagecreatefrompng($this->Path->get()));
    }

    public function write()
    {
        $this->quality = 0;
        $this->Path->setExtension('png');
        if (!imagepng($this->Image->get(), $this->Path->get(), $this->quality)) {
            throw new \RuntimeException(sprintf('Can not write image file %s', $this->Path->get()), 1);
        }
    }

    public function getType()
    {
        return 'image/png';
    }
}