<?php

namespace Milhojas\Image\Formats;

use Milhojas\Image\Exception\ImageFileNotWritable;
use Milhojas\Image\Models\Image;

class GifImage extends Image
{
    public function read()
    {
        $this->get(imagecreatefromgif($this->Path->get()));
    }

    public function write()
    {
        $this->Path->setExtension('gif');
        if (!imagegif($this->Image->get(), $this->Path->get())) {
            throw ImageFileNotWritable::fromPath($this->Path->get());
        }
    }

    public function getType()
    {
        return 'image/gif';
    }
}
