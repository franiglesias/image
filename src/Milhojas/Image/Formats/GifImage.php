<?php

namespace Milhojas\Image\Formats;

use Milhojas\Image\Abstracts\AbstractImageFileDecorator;

class GifImage extends AbstractImageFileDecorator
{
    public function read()
    {
        $this->Image->get(imagecreatefromgif($this->Path->get()));
    }

    public function write()
    {
        $this->Path->setExtension('gif');
        if (!imagegif($this->Image->get(), $this->Path->get())) {
            throw new \RuntimeException(sprintf('Can not write image file %s', $this->Path->get()), 1);
        }
    }

    public function getType()
    {
        return 'image/gif';
    }
}
