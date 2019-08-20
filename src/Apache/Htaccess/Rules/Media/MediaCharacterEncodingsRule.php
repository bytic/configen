<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

use ByTIC\Configen\Apache\Htaccess\Directives\AddCharsetDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\AddDefaultCharsetDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;

/**
 * Class MediaCharacterEncodingsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Media
 */
class MediaCharacterEncodingsRule extends AbstractRule
{
    public static $name = 'MediaCharacterEncodings';
    public static $title = 'Character encodings';
    public static $description = 'Serve all resources labeled as `text/html` or `text/plain`
with the media type `charset` parameter set to `UTF-8`.

https://httpd.apache.org/docs/current/mod/core.html#adddefaultcharset';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        $charsetDirective = AddCharsetDirective::create(
            'utf-8',
            'atom',
            'bbaw',
            'css',
            'geojson',
            'js',
            'json',
            'jsonld',
            'manifest',
            'rdf',
            'rss',
            'topojson',
            'vtt',
            'webapp',
            'webmanifest',
            'xloc',
            'xml'
        );
        $charsetDirective = IfModuleDirective::create('mod_mime', [$charsetDirective]);
        $charsetDirective->setComments('Serve the following file types with the media type `charset`
parameter set to `UTF-8`.

https://httpd.apache.org/docs/current/mod/mod_mime.html#addcharset');

        return [
            AddDefaultCharsetDirective::create('utf-8'),
            $charsetDirective
        ];
    }
}
