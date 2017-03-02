<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSignature;
use Milhojas\Image\Values\Text;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Models\Image;

class EffectSignatureTest extends EffectTestCase
{
    public function test_it_adds_signature_to_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/signature640-480.jpg');
        $effect = new EffectSignature(new Text('Example text', 14, 5, '#fd2', 'resources/arial.ttf'), new Color('#122'));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/signature640-480.jpg', 'resources/signature640-480.jpg');
        unlink('resources/signature640-480.jpg');
    }
}
