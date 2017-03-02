<?php

namespace Milhojas\Image\Formats;

use Milhojas\Image\Exception\ImageFileNotWritable;
use Milhojas\Image\Models\Image;

class JpgImage extends Image
{
    protected $quality = 100;

    public function read()
    {
        $this->set(imagecreatefromjpeg($this->Path->get()));
    }

    public function write()
    {
        $this->Path->setExtension('jpg');
        imageinterlace($this->get(), 1);
        if (!imagejpeg($this->get(), $this->Path->get(), $this->quality)) {
            throw ImageFileNotWritable::fromPath($this->Path->get());
        }
    }

    public function getType()
    {
        return 'image/jpeg';
    }
}
