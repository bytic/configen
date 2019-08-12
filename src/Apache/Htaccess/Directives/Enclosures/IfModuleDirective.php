<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives\Enclosures;

use ByTIC\Configen\Apache\Htaccess\Directives\AbstractDirective;

/**
 * Class IfModuleDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class IfModuleDirective extends AbstractEnclosure
{
    protected $moduleName = '';

    /**
     * @param string $module
     * @param AbstractDirective[] $directives
     * @return static
     */
    public static function create($module, $directives)
    {
        $directive = new static();
        $directive->setModuleName($module);
        $directive->setChildren($directives);
        return $directive;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->moduleName;
    }

    /**
     * @param string $moduleName
     */
    public function setModuleName(string $moduleName)
    {
        $this->moduleName = $moduleName;
    }

    /**
     * @inheritDoc
     */
    protected function generatePrefixContent()
    {
        return '<IfModule ' . $this->moduleName . '.c>';
    }

    /**
     * @inheritDoc
     */
    protected function generateSuffixContent()
    {
        return '</IfModule>';
    }
}
