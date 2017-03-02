<?php

namespace Milhojas\Image\Exception;

class UnsupportedImageType extends \OutOfBoundsException
{
    public static function fromType($type, $file)
    {
        return new static(sprintf('Type %s of file %s is unsupported.', $type, $file));
    }
}
