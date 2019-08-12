<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Traits;

use ByTIC\Configen\AbstractConfig\Parts\AbstractPart;
use ByTIC\Configen\AbstractConfig\Parts\EmptyLine;
use ByTIC\Configen\Apache\Htaccess\Directives\AbstractDirective;

/**
 * Trait HasDirectivesTraits
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Traits
 */
trait HasDirectivesTraits
{
    /**
     * @var AbstractDirective[]
     */
    protected $directives = null;

    /**
     * @return AbstractDirective[]
     */
    public function getDirectives(): array
    {
        if ($this->directives === null) {
            $this->initDirectives();
        }
        return $this->directives;
    }

    /**
     * @return AbstractPart[]
     */
    public function generatePartsFromDirectives()
    {
        $directives = $this->getDirectives();
        $parts = [];
        foreach ($directives as $directive) {
            $directiveParts = $directive->generateConfigParts();
            if (!empty($directiveParts)) {
                $parts[] = new EmptyLine();
                $parts = array_merge($parts, $directiveParts);
            }
        }
        return $parts;
    }

    protected function initDirectives()
    {
        $this->directives = $this->createDirectives();
    }

    /**
     * @return AbstractDirective[]|[]
     */
    abstract protected function createDirectives();
}
