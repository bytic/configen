<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class InternetExplorerIframeCookiesRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer
 */
class InternetExplorerIframeCookiesRule extends AbstractRule
{
    public static $name = 'InternetExplorerIframeCookies';
    public static $title = 'Iframes cookies';
    public static $description = 'Allow cookies to be set from iframes in Internet Explorer.

https://msdn.microsoft.com/en-us/library/ms537343.aspx
https://www.w3.org/TR/2000/CR-P3P-20001215/';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_headers',
                [
                    HeaderDirective::set(
                        null,
                        'P3P',
                        '"policyref=\"/w3c/p3p.xml\", CP=\"IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT\""'
                    )
                ]
            )
        ];
    }
}
