<?php

namespace Milhojas\Image\Models;

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
