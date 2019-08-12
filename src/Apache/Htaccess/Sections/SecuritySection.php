<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaCharacterEncodings;
use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaTypesRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityClickjacking;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityClickjackingRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityCSP;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityCSPRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityFileAccessRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Security\SecurityHTTSRule;

/**
 * Class SecuritySection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class SecuritySection extends AbstractSection
{
    public static $name = 'Security';
    public static $title = 'SECURITY';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            SecurityClickjackingRule::$name,
            SecurityCSPRule::$name,
            SecurityFileAccessRule::$name,
            SecurityHTTSRule::$name,
        ];
    }
}
