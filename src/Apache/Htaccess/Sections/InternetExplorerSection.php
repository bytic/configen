<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer\DocumentModesRule;
use ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer\InternetExplorerDocumentModesRule;
use ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer\InternetExplorerIframeCookiesRule;

/**
 * Class CrossOriginSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class InternetExplorerSection extends AbstractSection
{
    public static $name = 'InternetExplorer';
    public static $title = 'INTERNET EXPLORER';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            InternetExplorerDocumentModesRule::$name,
            InternetExplorerIframeCookiesRule::$name,
        ];
    }
}
