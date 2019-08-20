<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Rewrites;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteEngineDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteRuleDirective;

/**
 * Class RewritesForceHttpsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Rewrites
 */
class RewritesForceHttpsRule extends AbstractRule
{
    public static $name = 'RewritesForceHttps';
    public static $title = 'Force HTTPS';
    public static $description = 'Redirect from the `http://` to the `https://` version of the URL.
https://wiki.apache.org/httpd/RewriteHTTPToHTTPS';

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
        $directive = RewriteRuleDirective::create('^', 'https://%{HTTP_HOST}%{REQUEST_URI}', ['R=301', 'L']);
        $directive->withCondition('%{HTTPS}', '!=on');

        return $directive;
    }
}
