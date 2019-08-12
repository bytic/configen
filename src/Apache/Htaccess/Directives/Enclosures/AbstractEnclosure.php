<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives\Enclosures;

use ByTIC\Configen\AbstractConfig\Parts\AbstractPart;
use ByTIC\Configen\AbstractConfig\Parts\Enclosure;
use ByTIC\Configen\AbstractConfig\Parts\SimpleText;
use ByTIC\Configen\Apache\Htaccess\Directives\AbstractDirective;

/**
 * Class AbstractParentDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives\Enclosures
 */
abstract class AbstractEnclosure extends AbstractDirective
{
    /**
     * @var AbstractDirective[]
     */
    protected $children;

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @inheritDoc
     */
    public function generateConfigParts()
    {
        $parts = parent::generateConfigParts();
        $parts[] = new Enclosure(
            $this->generatePrefixContent(),
            $this->generateSuffixContent(),
            $this->generateChildrenParts()
        );
        return $parts;
    }

    /**
     * @return AbstractPart[]
     */
    protected function generateChildrenParts()
    {
        $parts = [];
        foreach ($this->children as $directive) {
            $parts = array_merge($parts, $directive->generateConfigParts());
        }
        return $parts;
    }

    /**
     * @return string
     */
    abstract protected function generatePrefixContent();

    /**
     * @return string
     */
    abstract protected function generateSuffixContent();
}
