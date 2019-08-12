<?php

namespace ByTIC\Configen\AbstractConfig\Parts;

/**
 * Class Comment
 * @package ByTIC\Configen\AbstractConfig\Parts
 */
class SimpleText extends AbstractPart
{
    protected $content = '';

    /**
     * Comment constructor.
     * @param array $lines
     */
    public function __construct(...$lines)
    {
        $content = implode("\n", $lines);
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
