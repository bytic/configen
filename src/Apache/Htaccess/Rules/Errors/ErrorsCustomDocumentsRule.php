<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Errors;

/**
 * Class ErrorsCustomDocumentsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Errors
 */
class ErrorsCustomDocumentsRule extends AbstractRule
{
    public static $name = 'ErrorsCustomDocuments';
    public static $title = 'Custom error messages/pages';
    public static $description = 'Customize what Apache returns to the client in case of an error.
https://httpd.apache.org/docs/current/mod/core.html#errordocument';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [];
    }
}
