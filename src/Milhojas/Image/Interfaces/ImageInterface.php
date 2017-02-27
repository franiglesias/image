<?php

namespace Milhojas\Image\Interfaces;

interface ImageInterface
{
    public function get();
    public function apply();
    public function size();
    public function set($newResource);
    public function read();
    public function write();
    public function path();
}
