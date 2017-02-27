<?php

namespace Milhojas\Image\Models;

use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Values\Canvas;
use Milhojas\Image\Values\Size;

class Image implements ImageInterface
{
    protected $image;
    protected $Size;

    public function __construct(Canvas $Canvas)
    {
        $this->image = $Canvas->get();
        $this->Size = $Canvas->size();
    }

    public function __destruct()
    {
        if (is_resource($this->image)) {
            imagedestroy($this->image);
        }
    }

    protected function readSize()
    {
        return new Size(imagesx($this->image), imagesy($this->image));
    }

    // ImageInterface Implementation

    public function set($newImageResource)
    {
        $this->image = $newImageResource;
        $this->Size = $this->readSize();
    }

    public function get()
    {
        return $this->image;
    }

    public function size()
    {
        $this->Size = $this->readSize();

        return $this->Size;
    }

    public function apply()
    {
    }

    public function read()
    {
    }

    public function write()
    {
        imagepng($this->image);
    }

    public function path()
    {
        return $this->Path;
    }

    public function __clone()
    {
        $this->image = null;
        $this->read();
    }
}
