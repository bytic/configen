<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

/**
 * Class ErrorsCustomDocumentsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Media
 */
class MediaTypesRule extends AbstractRule
{
    public static $name = 'MediaTypes';
    public static $title = 'Media types';
    public static $description = 'Serve all resources labeled as `text/html` or `text/plain`
with the media type `charset` parameter set to `UTF-8`.

https://httpd.apache.org/docs/current/mod/core.html#adddefaultcharset';
}
