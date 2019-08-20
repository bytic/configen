<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Security;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class SecurityCSPRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Security
 */
class SecurityCSPRule extends AbstractRule
{
    public static $name = 'SecurityCSP';
    public static $title = 'Content Security Policy (CSP)';
    public static $description = 'Mitigate the risk of cross-site scripting and other content-injection
attacks.

This can be done by setting a `Content Security Policy` which
whitelists trusted sources of content for your website.

The example header below allows ONLY scripts that are loaded from
the current website\'s origin (no inline scripts, no CDN, etc).
That almost certainly won\'t work as-is for your website!

To make things easier, you can use an online CSP header generator
such as: http://cspisawesome.com/.

https://content-security-policy.com/
https://www.html5rocks.com/en/tutorials/security/content-security-policy/
https://w3c.github.io/webappsec-csp/';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_headers',
                [
                    HeaderDirective::set('', 'Content-Security-Policy', '"script-src \'self\'; object-src \'self\'"'),
                    $this->createDirectiveCSP(),
                ]
            )
        ];
    }

    /**
     * @return FilesMatchDirective
     */
    protected function createDirectiveCSP()
    {
        $directive = FilesMatchDirective::create(
            '\.(appcache|atom|bbaw|bmp|br|crx|css|cur|eot|f4[abpv]|flv|geojson|gif|gz|htc|ic[os]|jpe?g|m?js|json(ld)?|m4[av]|manifest|map|markdown|md|mp4|oex|og[agv]|opus|otf|pdf|png|rdf|rss|safariextz|svgz?|swf|topojson|tt[cf]|txt|vcard|vcf|vtt|wasm|webapp|web[mp]|webmanifest|woff2?|xloc|xml|xpi)$',
            [
                HeaderDirective::unset(null, 'Content-Security-Policy')
            ]
        );
        $directive->setComments('`mod_headers` cannot match based on the content-type, however,
the `Content-Security-Policy` response header should be send
only for HTML documents and not for the other resources.');
        return $directive;
    }
}
