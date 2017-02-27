<?php

namespace Milhojas\Image\Values;

class NullCanvas extends Canvas
{
    public function __construct()
    {
    }

    public function get()
    {
        return null;
    }

    public function size()
    {
        return null;
    }
}
