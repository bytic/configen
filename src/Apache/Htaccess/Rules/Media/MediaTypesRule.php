<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

use ByTIC\Configen\Apache\Htaccess\Directives\AddTypeDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;

/**
 * Class ErrorsCustomDocumentsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Media
 */
class MediaTypesRule extends AbstractRule
{
    public static $name = 'MediaTypes';
    public static $title = 'Media types';
    public static $description = 'Serve resources with the proper media types (f.k.a. MIME types).

https://www.iana.org/assignments/media-types/media-types.xhtml
https://httpd.apache.org/docs/current/mod/mod_mime.html#addtype';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_mime',
                array_merge(
                    $this->generateDataInterchangeDirectives(),
                    $this->generateJavaScriptDirectives(),
                    $this->generateManifestFilesDirectives()
                )
            )
        ];
    }

    /**
     * @return array
     */
    protected function generateDataInterchangeDirectives()
    {
        $atomDirective = AddTypeDirective::create('application/atom+xml', 'atom');
        $atomDirective->setComments('Data interchange');
        return [
            $atomDirective,
            AddTypeDirective::create('application/json', 'json', 'map', 'topojson'),
            AddTypeDirective::create('application/ld+json', 'jsonld'),
            AddTypeDirective::create('application/rss+xml', 'rss'),
            AddTypeDirective::create('application/vnd.geo+json', 'geojson'),
            AddTypeDirective::create('application/xml', 'rdf', 'xml')
        ];
    }

    /**
     * @return array
     */
    protected function generateJavaScriptDirectives()
    {
        $directive = AddTypeDirective::create('application/javascript', 'js');
        $directive->setComments('JavaScript
Normalize to standard type.
https://tools.ietf.org/html/rfc4329#section-7.2');
        return [
            $directive
        ];
    }
    /**
     * @return array
     */
    protected function generateManifestFilesDirectives()
    {
        $directive = AddTypeDirective::create('application/manifest+json', 'webmanifest');
        $directive->setComments('Manifest files');
        return [
            $directive,
            AddTypeDirective::create('application/x-web-app-manifest+json', 'webapp'),
            AddTypeDirective::create('text/cache-manifest', 'appcache')
        ];
    }
}
