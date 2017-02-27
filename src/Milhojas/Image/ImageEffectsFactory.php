<?php

namespace Milhojas\Image;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Description.
 */
class ImageEffectsFactory
{
    public function __construct()
    {
    }

    public function make(ImageInterface $Image, $filters)
    {
        foreach ($filters as $filter => $parameters) {
            $provided = array_merge(array($Image), array_intersect_key($parameters, $this->needParameters($filter)));
            $Image = $this->getFilterInstance($filter, $provided);
        }

        return $Image;
    }

    protected function getFilterInstance($filter, $parameters)
    {
        $reflector = new \ReflectionClass($filter);

        return $reflector->newInstanceArgs($parameters);
    }

    protected function needParameters($filter)
    {
        $reflector = new \ReflectionClass($filter);
        $result = array();
        foreach ($reflector->getConstructor()->getParameters() as $param) {
            if (!$param->getClass()) {
                $result[$param->getName()] = 'value';
                continue;
            }
            $result[$param->getName()] = $param->getClass()->getName();
        }

        return $result;
    }
}
