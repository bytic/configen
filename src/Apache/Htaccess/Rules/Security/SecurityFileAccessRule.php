<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Security;

/**
 * Class SecurityCSPRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Security
 */
class SecurityFileAccessRule extends AbstractRule
{
    public static $name = 'SecurityFileAccess';
    public static $title = 'File access';
    public static $description = 'Block access to directories without a default document.

You should leave the following uncommented, as you shouldn\'t allow
anyone to surf through every directory on your server (which may
includes rather private places such as the CMS\'s directories).';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [];
    }
}
