<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Errors;

use ByTIC\Configen\Apache\Htaccess\Directives\OptionsDirective;

/**
 * Class ErrorsErrorPreventionRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Errors
 */
class ErrorsErrorPreventionRule extends AbstractRule
{
    public static $name = 'ErrorsErrorPrevention';
    public static $title = 'Error prevention';
    public static $description = 'Disable the pattern matching based on filenames.

This setting prevents Apache from returning a 404 error as the result
of a rewrite when the directory with the same name does not exist.

https://httpd.apache.org/docs/current/content-negotiation.html#multiviews';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            OptionsDirective::create('-MultiViews')
        ];
    }
}
