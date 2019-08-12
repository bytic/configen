<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

/**
 * Class AbstractDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
abstract class AbstractDirective
{
    /**
     * return AbstractPart[]
     */
    abstract public function generateConfigParts();
}
