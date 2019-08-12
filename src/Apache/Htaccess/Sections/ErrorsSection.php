<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\Errors\ErrorsCustomDocumentsRule;

/**
 * Class CrossOriginSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class ErrorsSection extends AbstractSection
{
    public static $name = 'Errors';
    public static $title = 'ERRORS';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            ErrorsCustomDocumentsRule::$name,
        ];
    }
}
