<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Errors;

use ByTIC\Configen\Apache\Htaccess\Directives\ErrorDocumentDirective;

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
        $directives = [];
        $codes = $this->getEnabledCodes();
        foreach ($codes as $code) {
            $directives[] = $this->generateDirective($code);
        }
        return $directives;
    }

    /**
     * @return array
     */
    protected function getEnabledCodes()
    {
        return ['403', '404', '500'];
    }

    /**
     * @param $code
     * @return ErrorDocumentDirective
     */
    protected function generateDirective($code)
    {
        return ErrorDocumentDirective::create($code, '/' . $code);
    }
}
