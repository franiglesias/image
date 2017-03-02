<?php

namespace Test\Image\Models;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Models\Image;
use Milhojas\Image\Formats\JpgImage;
use Milhojas\Image\Formats\PngImage;
use Milhojas\Image\Values\Size;

class ImageTest extends TestCase
{
    public function test_it_creates_an_image_from_a_file_path()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $this->assertInstanceOf(Image::class, $image, 'It should be an Image');
        $this->assertInstanceOf(JpgImage::class, $image, 'It should be a JPG Image');
    }

    public function test_it_creates_an_image_from_a_png_file_path()
    {
        $image = Image::fromPath('resources/test640-480.png');
        $this->assertInstanceOf(Image::class, $image, 'It should be an Image');
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

    public function test_it_duplicates_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/copy.jpg');
        $this->assertTrue(file_exists('resources/copy.jpg'));
        unlink('resources/copy.jpg');
    }
    /**
     * @expectedException Milhojas\Image\Exception\UnsupportedImageType
     */
    public function test_it_does_not_manage_unsupported_image_types()
    {
        $image = Image::fromPath('resources/test640-480.tiff');
    }
}
