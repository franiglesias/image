<?php

namespace Milhojas\Image;

use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Values\NullCanvas;
use Milhojas\Image\Values\FilePath;
use Milhojas\Image\Values\NewFilePath;
use Milhojas\Image\Models\Image;
use Milhojas\Image\Formats\GifImage;
use Milhojas\Image\Formats\JpgImage;
use Milhojas\Image\Formats\PngImage;

class ImageDispatcher
{
    public function get($file)
    {
        try {
            $Path = new FilePath($file);
            $info = getimagesize($Path->get());
            $Image = new Image(new NullCanvas());

            return $this->imageByType($info['mime'], $Path, $Image);
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

    public function make($file, Size $Size, Color $Color, $type)
    {
        $Canvas = new Canvas($Size, $Color);

        return $this->imageByType($type, new NewFilePath($file), new Image($Canvas));
    }

    public function save(ImageInterface $Image)
    {
        $Image->write();
    }

    public function duplicate(ImageInterface $Image, $file)
    {
        $Copy = clone $Image;
        $Copy->writeAs(new NewFilePath($file));

        return $Copy;
    }

    public function move(ImageInterface $Image, NewFilePath $Path)
    {
        // code...
    }

    public function delete(ImageInterface $Image)
    {
        // code...
    }
}
