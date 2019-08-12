<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin\CrossOriginImagesRule;
use ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin\CrossOriginRequestsRule;
use ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin\CrossOriginResourceTimingRule;
use ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin\CrossOriginWebFontsRule;

/**
 * Class CrossOriginSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class CrossOriginSection extends AbstractSection
{
    public static $name = 'CrossOrigin';
    public static $title = 'CROSS-ORIGIN';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            CrossOriginRequestsRule::$name,
            CrossOriginImagesRule::$name,
            CrossOriginWebFontsRule::$name,
            CrossOriginResourceTimingRule::$name
        ];
    }
}
