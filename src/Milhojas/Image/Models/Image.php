<?php

namespace Milhojas\Image\Models;

use Milhojas\Image\Formats\GifImage;
use Milhojas\Image\Formats\PngImage;
use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Values\Canvas;
use Milhojas\Image\Values\FilePath;
use Milhojas\Image\Values\NullCanvas;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Effects\Effect;
use Milhojas\Image\Formats\JpgImage;

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

    /**
     * Creates an image loading it from a file.
     *
     * @param string $file
     */
    public static function fromPath($file)
    {
        try {
            $Path = new FilePath($file);
            $info = getimagesize($Path->get());
            $Image = new self(new NullCanvas());

            return $Image->imageByType($info['mime'], $Path, $Image);
        } catch (\Exception $e) {
            return new NullImage();
        }
    }

    private function imageByType($type, $Path, $Image)
    {
        switch ($type) {
            case 'image/jpeg':
                return new JpgImage($Image, $Path);
                break;
            case 'image/png':
                return new PngImage($Image, $Path);
                break;
            case 'image/gif':
                return new GifImage($Image, $Path);
                break;
            default:
                break;
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

    /**
     * @return resource Image data
     */
    public function get()
    {
        return $this->image;
    }

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

    /**
     * Implemented in decorators.
     */
    public function read()
    {
    }

    /**
     * Implemented in decorators.
     */
    public function write()
    {
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
