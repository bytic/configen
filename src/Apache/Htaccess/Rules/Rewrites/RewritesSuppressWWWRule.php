<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Rewrites;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteEngineDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteRuleDirective;

/**
 * Class RewritesSuppressWWWRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Rewrites
 */
class RewritesSuppressWWWRule extends AbstractRule
{
    public static $name = 'RewritesSuppressWWW';
    public static $title = 'Suppressing the `www.` at the beginning of URLs';
    public static $description = 'Rewrite www.example.com → example.com

The same content should never be available under two different
URLs, especially not with and without `www.` at the beginning.
This can cause SEO problems (duplicate content), and therefore,
you should choose one of the alternatives and redirect the other
one.

https://github.com/h5bp/server-configs-apache/issues/52';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_rewrite',
                [
                    RewriteEngineDirective::create('On'),
                    $this->createDirectiveRedirect(),
                ]
            )
        ];
    }

    /**
     * @return RewriteRuleDirective
     */
    protected function createDirectiveRedirect()
    {
        $directive = RewriteRuleDirective::create('^', '%{ENV:PROTO}://%1%{REQUEST_URI}', ['R=301', 'L']);
        $directive->withCondition('%{HTTP_HOST}', '^www\.(.+)$', ['NC']);

        return $directive;
    }
}
