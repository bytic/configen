<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\SetEnvIfDirective;

/**
 * Class CrossOriginWebFontsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginWebFontsRule extends AbstractRule
{
    public static $name = 'CrossOriginWebFonts';
    public static $title = 'Cross-origin web fonts';
    public static $description = 'Allow cross-origin access to web fonts.';

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
                        '\.(eot|otf|tt[cf]|woff2?)$',
                        [
                            HeaderDirective::set(null, 'Access-Control-Allow-Origin', '"*"')
                        ]
                    )
                ]
            )
        ];
    }
}
