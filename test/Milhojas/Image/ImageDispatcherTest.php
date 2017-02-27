<?php

namespace Test\Image;

use Milhojas\Image\ImageDispatcher;
use Milhojas\Image\Formats\JpgImage;
use Milhojas\Image\Formats\PngImage;
use Milhojas\Image\Values\Size;
use PHPUnit\Framework\TestCase;

class ImageDispatcherTest extends TestCase
{
    public function setUp()
    {
        $this->ImageDispatcher = new ImageDispatcher();
    }
    public function test_it_can_retrieve_an_image_from_file_path()
    {
        $image = $this->ImageDispatcher->get('resources/test640-480.jpg');
        $this->assertInstanceOf(JpgImage::class, $image, 'Should be a JPEG Image');
        $this->assertEquals(new Size(640, 480), $image->size());
    }

    public function test_it_can_retrieve_an_image_from_file_path_png_version()
    {
        $image = $this->ImageDispatcher->get('resources/test640-480.png');
        $this->assertInstanceOf(PngImage::class, $image, 'Should be a JPEG Image');
        $this->assertEquals(new Size(640, 480), $image->size());
    }
}
