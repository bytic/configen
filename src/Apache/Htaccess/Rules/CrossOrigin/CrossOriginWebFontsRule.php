<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

/**
 * Class CrossOriginWebFontsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginWebFontsRule extends AbstractRule
{
    public static $name = 'CrossOriginWebFonts';
    public static $title = 'Cross-origin web fonts';
    public static $description = 'Allow cross-origin access to web fonts.';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [];
    }
}
