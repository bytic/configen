<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Rewrites;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\OptionsDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteBaseDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteEngineDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\RewriteRuleDirective;

/**
 * Class RewritesRewriteEngineRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Rewrites
 */
class RewritesRewriteEngineRule extends AbstractRule
{
    public static $name = 'RewritesRewriteEngine';
    public static $title = 'Rewrite engine';
    public static $description = '';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_rewrite',
                array_merge(
                    [
                        $this->createDirectiveEnable(),
                        $this->createDirectiveFollowSymLinks(),
                        $this->createDirectiveRewriteBase(),
                    ],
                    $this->createDirectiveProtoVariable()
                )
            )
        ];
    }

    /**
     * @return RewriteEngineDirective
     */
    protected function createDirectiveEnable()
    {
        $directive = RewriteEngineDirective::create('on');
        $directive->setComments('Turn on the rewrite engine (this is necessary in order for
the `RewriteRule` directives to work).

https://httpd.apache.org/docs/current/mod/mod_rewrite.html#RewriteEngine');
        return $directive;
    }

    /**
     * @return OptionsDirective
     */
    protected function createDirectiveFollowSymLinks()
    {
        $directive = OptionsDirective::create('+FollowSymlinks');
        $directive->setComments('Enable the `FollowSymLinks` option if it isn\'t already.

https://httpd.apache.org/docs/current/mod/core.html#options
-----------------------------------------------------------
If your web host doesn\'t allow the `FollowSymlinks` option,
you need to comment it out or remove it, and then uncomment
the `Options +SymLinksIfOwnerMatch` line (4), but be aware
of the performance impact.

https://httpd.apache.org/docs/current/misc/perf-tuning.html#symlinks

Options +SymLinksIfOwnerMatch');
        return $directive;
    }


    /**
     * @return RewriteBaseDirective
     */
    protected function createDirectiveRewriteBase()
    {
        $directive = RewriteBaseDirective::create('/');
        $directive->setComments('Some cloud hosting services will require you set `RewriteBase`.

https://www.rackspace.com/knowledge_center/frequently-asked-question/why-is-modrewrite-not-working-on-my-site
https://httpd.apache.org/docs/current/mod/mod_rewrite.html#rewritebase');
        return $directive;
    }

    /**
     * @return RewriteRuleDirective[]
     */
    protected function createDirectiveProtoVariable()
    {
        $directive1 = RewriteRuleDirective::create('^', '-', ['env=proto:https']);
        $directive1->setComments('Set %{ENV:PROTO} variable, to allow rewrites to redirect with the
appropriate schema automatically (http or https).');
        $directive1->withCondition('%{HTTPS}', '=on');

        $directive2 = RewriteRuleDirective::create('^', '-', ['env=proto:http']);
        $directive2->withCondition('%{HTTPS}', '!=on');
        return [$directive1, $directive2];
    }
}
