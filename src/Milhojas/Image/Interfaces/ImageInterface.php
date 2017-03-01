<?php

namespace Milhojas\Image\Interfaces;

use Milhojas\Image\Effects\Effect;

interface ImageInterface
{
    public function get();
    public function apply(Effect $effect);
    public function size();
    public function set($newResource);
    public function read();
    public function write();
    public function path();
}
