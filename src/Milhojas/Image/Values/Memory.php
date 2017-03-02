<?php

namespace Milhojas\Image\Values\Memory;

class Memory
{
    public function available()
    {
        $limit = ini_get('memory_limit');
        $usage = memory_get_usage();

        return $limit - $usage;
    }

    public function enoughFree($quantity)
    {
        return $quantity > $this->available();
    }
}
