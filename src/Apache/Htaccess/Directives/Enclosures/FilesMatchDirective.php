<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives\Enclosures;

use ByTIC\Configen\Apache\Htaccess\Directives\AbstractDirective;

/**
 * Class IfModuleDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class FilesMatchDirective extends AbstractEnclosure
{
    protected $condition = '';

    /**
     * @param string $module
     * @param AbstractDirective[] $directives
     * @return static
     */
    public static function create($module, $directives)
    {
        $directive = new static();
        $directive->setCondition($module);
        $directive->setChildren($directives);
        return $directive;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @inheritDoc
     */
    protected function generatePrefixContent()
    {
        return '<FilesMatch "' . $this->condition . '">';
    }

    /**
     * @inheritDoc
     */
    protected function generateSuffixContent()
    {
        return '</FilesMatch>';
    }
}
