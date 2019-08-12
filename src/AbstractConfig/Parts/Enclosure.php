<?php

namespace ByTIC\Configen\AbstractConfig\Parts;

/**
 * Class Wrapper
 * @package ByTIC\Configen\AbstractConfig\Parts
 */
class Enclosure
{
    protected $prefix = '';
    protected $sufix = '';
    /**
     * @var AbstractPart[]
     */
    protected $childreen;

    /**
     * Enclosure constructor.
     * @param AbstractPart[] $childreen
     * @param string $prefix
     * @param string $sufix
     */
    public function __construct(string $prefix, string $sufix, array $childreen)
    {
        $this->prefix = $prefix;
        $this->sufix = $sufix;
        $this->childreen = $childreen;
    }


    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getSufix(): string
    {
        return $this->sufix;
    }

    /**
     * @param string $sufix
     */
    public function setSufix(string $sufix)
    {
        $this->sufix = $sufix;
    }

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
