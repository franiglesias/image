<?php

namespace Milhojas\Image\Abstracts;

use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Interfaces\FilePathInterface;

abstract class AbstractImageFileDecorator extends AbstractImageDecorator
{
    protected $quality;
    protected $Path;

    public function __construct(ImageInterface $Image, FilePathInterface $Path, $quality = 100)
    {
        $this->Path = $Path;
        $this->Image = $Image;
        $this->quality = $quality;
        if (file_exists($this->Path->get())) {
            $this->read();
        }
    }

    public function path()
    {
        return $this->Path;
    }

    public function writeAs(FilePathInterface $Path)
    {
        if (!is_resource($this->Image->get())) {
            $this->read();
        }
        $this->Path = $Path;
        $this->write();
    }
}
