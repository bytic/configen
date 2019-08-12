<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class InternetExplorerDocumentModesRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer
 */
class InternetExplorerDocumentModesRule extends AbstractRule
{
    public static $name = 'InternetExplorerDocumentModes';
    public static $title = 'Document modes';
    public static $description = 'Force Internet Explorer 8/9/10 to render pages in the highest mode
available in the various cases when it may not.

https://hsivonen.fi/doctype/#ie8

(!) Starting with Internet Explorer 11, document modes are deprecated.
If your business still relies on older web apps and services that were
designed for older versions of Internet Explorer, you might want to
consider enabling `Enterprise Mode` throughout your company.

https://msdn.microsoft.com/en-us/library/ie/bg182625.aspx#docmode
https://blogs.msdn.microsoft.com/ie/2014/04/02/stay-up-to-date-with-enterprise-mode-for-internet-explorer-11/';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        $fileMatch = FilesMatchDirective::create(
            '\.(appcache|atom|bbaw|bmp|br|crx|css|cur|eot|f4[abpv]|flv|geojson|gif|gz|htc|ic[os]|jpe?g|m?js|json(ld)?|m4[av]|manifest|map|markdown|md|mp4|oex|og[agv]|opus|otf|pdf|png|rdf|rss|safariextz|svgz?|swf|topojson|tt[cf]|txt|vcard|vcf|vtt|wasm|webapp|web[mp]|webmanifest|woff2?|xloc|xml|xpi)$',
            [
                HeaderDirective::unset(null, 'X-UA-Compatible')
            ]
        );
        $fileMatch->setComments('`mod_headers` cannot match based on the content-type, however,
the `X-UA-Compatible` response header should be send only for
HTML documents and not for the other resources.');

        return [
            IfModuleDirective::create(
                'mod_headers',
                [
                    HeaderDirective::set(null, 'X-UA-Compatible', '"IE=edge"'),
                    $fileMatch
                ]
            )
        ];
    }
}
