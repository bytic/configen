<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaCharacterEncodings;
use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaTypesRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Rewrites\RewritesForceHttpsRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Rewrites\RewritesRewriteEngine;
use ByTIC\Configen\Apache\Htaccess\Rules\Rewrites\RewritesRewriteEngineRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Rewrites\RewritesSuppressWWWRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityClickjacking;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityClickjackingRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityCSP;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityCSPRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityFileAccessRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityHTTSRule;

/**
 * Class RewritesSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class RewritesSection extends AbstractSection
{
    public static $name = 'Rewrites';
    public static $title = 'REWRITES';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            RewritesRewriteEngineRule::$name,
            RewritesForceHttpsRule::$name,
            RewritesSuppressWWWRule::$name,
        ];
    }
}
