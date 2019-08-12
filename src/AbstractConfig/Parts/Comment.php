<?php

namespace ByTIC\Configen\AbstractConfig\Parts;

/**
 * Class Comment
 * @package ByTIC\Configen\AbstractConfig\Parts
 */
class Comment extends AbstractPart
{
    protected $content = '';

    /**
     * Comment constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
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
