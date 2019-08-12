<?php

namespace ByTIC\Configen\AbstractConfig\Parts;

/**
 * Class Wrapper
 * @package ByTIC\Configen\AbstractConfig\Parts
 */
class Enclosure
{
    /**
     * @var AbstractPart[]
     */
    protected $childreen;

    /**
     * @return AbstractPart[]
     */
    public function getChildreen(): array
    {
        return $this->childreen;
    }

    /**
     * @param AbstractPart[] $childreen
     */
    public function setChildreen(array $childreen)
    {
        $this->childreen = $childreen;
    }
}
