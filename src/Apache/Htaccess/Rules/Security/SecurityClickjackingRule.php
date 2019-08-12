<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Security;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class SecurityClickjackingRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Security
 */
class SecurityClickjackingRule extends AbstractRule
{
    public static $name = 'SecurityClickjacking';
    public static $title = 'Clickjacking';
    public static $description = 'Protect website against clickjacking.

The example below sends the `X-Frame-Options` response header with
the value `DENY`, informing browsers not to display the content of
the web page in any frame.

This might not be the best setting for everyone. You should read
about the other two possible values the `X-Frame-Options` header
field can have: `SAMEORIGIN` and `ALLOW-FROM`.
https://tools.ietf.org/html/rfc7034#section-2.1.

Keep in mind that while you could send the `X-Frame-Options` header
for all of your website’s pages, this has the potential downside that
it forbids even non-malicious framing of your content (e.g.: when
users visit your website using a Google Image Search results page).

Nonetheless, you should ensure that you send the `X-Frame-Options`
header for all pages that allow a user to make a state changing
operation (e.g: pages that contain one-click purchase links, checkout
or bank-transfer confirmation pages, pages that make permanent
configuration changes, etc.).

Sending the `X-Frame-Options` header can also protect your website
against more than just clickjacking attacks:
https://cure53.de/xfo-clickjacking.pdf.

https://tools.ietf.org/html/rfc7034
https://blogs.msdn.microsoft.com/ieinternals/2010/03/30/combating-clickjacking-with-x-frame-options/
https://www.owasp.org/index.php/Clickjacking';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_headers',
                [
                    FilesMatchDirective::create(
                        '\.(appcache|atom|bbaw|bmp|br|crx|css|cur|eot|f4[abpv]|flv|geojson|gif|gz|htc|ic[os]|jpe?g|m?js|json(ld)?|m4[av]|manifest|map|markdown|md|mp4|oex|og[agv]|opus|otf|pdf|png|rdf|rss|safariextz|svgz?|swf|topojson|tt[cf]|txt|vcard|vcf|vtt|wasm|webapp|web[mp]|webmanifest|woff2?|xloc|xml|xpi)$',
                        [
                            HeaderDirective::unset(null, 'Access-Control-Allow-Origin', '"*"')
                        ]
                    )
                ]
            )
        ];
    }
}
