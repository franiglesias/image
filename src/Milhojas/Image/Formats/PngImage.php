<?php

namespace Milhojas\Image\Formats;

use Milhojas\Image\Exception\ImageFileNotWritable;
use Milhojas\Image\Models\Image;

class PngImage extends Image
{
    protected $quality = 0;

    public function read()
    {
        $this->set(imagecreatefrompng($this->Path->get()));
    }

    public function write()
    {
        $this->quality = 0;
        $this->Path->setExtension('png');
        if (!imagepng($this->Image->get(), $this->Path->get(), $this->quality)) {
            throw ImageFileNotWritable::fromPath($this->Path->get());
        }
    }

    public function getType()
    {
        return 'image/png';
    }
}
