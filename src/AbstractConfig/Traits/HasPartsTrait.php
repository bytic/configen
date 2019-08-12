<?php

namespace ByTIC\Configen\AbstractConfig\Traits;

use ByTIC\Configen\AbstractConfig\Parts\Comment;
use ByTIC\Configen\AbstractConfig\Parts\EmptyLine;

/**
 * Trait HasPartsTrait
 * @package ByTIC\Configen\AbstractConfig\Traits
 */
trait HasPartsTrait
{
    protected $parts;

    /**
     * @param array $lines
     */
    public function addComment(...$lines)
    {
        $content = implode("\n", $lines);
        $this->addPart(new Comment($content));
    }

    /**
     * @param $content
     */
    public function addEmptyLine()
    {
        $this->addPart(new EmptyLine());
    }

    /**
     * @param $part
     */
    protected function addPart($part)
    {
        $this->parts[] = $part;
    }

    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @return array
     */
    public function getPartNamespaces()
    {
        return ['ByTIC\Configen\AbstractConfig\Parts\\'];
    }
}
