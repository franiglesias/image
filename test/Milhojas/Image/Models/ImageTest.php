<?php

namespace Test\Image\Models;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Models\Image;
use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Formats\JpgImage;
use Milhojas\Image\Formats\PngImage;
use Milhojas\Image\Values\Size;

class ImageTest extends TestCase
{
    public function test_it_creates_an_image_from_a_file_path()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $this->assertInstanceOf(ImageInterface::class, $image, 'It should be an Image');
        $this->assertInstanceOf(JpgImage::class, $image, 'It should be a JPG Image');
    }

    public function test_it_creates_an_image_from_a_png_file_path()
    {
        $image = Image::fromPath('resources/test640-480.png');
        $this->assertInstanceOf(ImageInterface::class, $image, 'It should be an Image');
        $this->assertInstanceOf(PngImage::class, $image, 'It should be a PNG Image');
    }

    public function test_it_can_return_size()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $this->assertEquals(new Size(640, 480), $image->size());
    }

    public function test_it_contains_a_resource()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $this->assertTrue(is_resource($image->get()), 'A resource should be allocated en memory');
    }
}
