<?php

namespace Milhojas\Image\Exception;

class ImageFileNotWritable extends \RuntimeException
{
    public static function fromPath($path)
    {
        return new static(sprintf('Can not write image file %s.', $path));
    }
}
