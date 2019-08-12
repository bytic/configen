<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

/**
 * Class MediaCharacterEncodingsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Media
 */
class MediaCharacterEncodingsRule extends AbstractRule
{
    public static $name = 'MediaCharacterEncodings';
    public static $title = 'Character encodings';
    public static $description = 'Serve resources with the proper media types (f.k.a. MIME types).

https://www.iana.org/assignments/media-types/media-types.xhtml
https://httpd.apache.org/docs/current/mod/mod_mime.html#addtype';
}
