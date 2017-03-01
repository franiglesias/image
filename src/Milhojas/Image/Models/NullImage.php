<?php

use Milhojas\Image\Models\Image;

class NullImage extends Image
{
    public function __construct()
    {
    }

    public function read()
    {
    }

    public function write()
    {
    }

    public function getType()
    {
        return null;
    }
}
