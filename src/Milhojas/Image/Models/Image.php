<?php

namespace Milhojas\Image\Models;

use Milhojas\Image\Formats\GifImage;
use Milhojas\Image\Formats\PngImage;
use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Interfaces\FilePathInterface;
use Milhojas\Image\Values\Canvas;
use Milhojas\Image\Values\FilePath;
use Milhojas\Image\Values\NullCanvas;
use Milhojas\Image\Values\NewFilePath;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Effects\Effect;
use Milhojas\Image\Formats\JpgImage;
use Milhojas\Image\Exception\UnsupportedImageType;

/**
 * Represents an Image.
 */
abstract class Image implements ImageInterface
{
    protected $image;
    protected $Size;
    protected $Path;

    public function __construct(Canvas $Canvas, FilePath $Path = null)
    {
        $this->image = $Canvas->get();
        $this->Size = $Canvas->size();
        $this->Path = $Path;
    }

    public function __destruct()
    {
        if (is_resource($this->image)) {
            imagedestroy($this->image);
        }
    }

    /**
     * Creates an image loading it from a file.
     *
     * @param string $file
     */
    public static function fromPath($file)
    {
        $Path = new FilePath($file);
        $info = getimagesize($Path->get());
        $image = static::imageByType($info['mime'], $Path);
        $image->read();

        return $image;
    }

    public function duplicateToPath($file)
    {
        $Copy = clone $this;
        $Copy->writeAs(new NewFilePath($file));

        return $Copy;
    }

    public function writeAs(FilePathInterface $Path)
    {
        if (!is_resource($this->get())) {
            $this->read();
        }
        $this->Path = $Path;
        $this->write();
    }

    private static function imageByType($type, $Path)
    {
        switch ($type) {
            case 'image/jpeg':
                return new JpgImage(new NullCanvas(), $Path);
            case 'image/png':
                return new PngImage(new NullCanvas(), $Path);
            case 'image/gif':
                return new GifImage(new NullCanvas(), $Path);
        }
        throw UnsupportedImageType::fromType($type, $Path->get());
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

    /**
     * @return resource Image data
     */
    public function get()
    {
        return $this->image;
    }

    /**
     * The size of the image.
     *
     * @return Size
     */
    public function size()
    {
        $this->Size = $this->readSize();

        return $this->Size;
    }

    /**
     * Apply an effect on the image without write the file.
     *
     * @param Effect $effect
     */
    public function apply(Effect $effect)
    {
        $effect->apply($this);
    }

    abstract public function read();

    abstract public function write();

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
