<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\SetEnvIfDirective;

/**
 * Class CrossOriginImagesRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginImagesRule extends AbstractRule
{
    public static $name = 'CrossOriginImages';
    public static $title = 'Cross-origin images';
    public static $description = 'Send the CORS header for images when browsers request it.

https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_enabled_image
https://blog.chromium.org/2011/07/using-cross-domain-images-in-webgl-and.html';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_setenvif',
                [
                    IfModuleDirective::create(
                        'mod_headers',
                        [
                            FilesMatchDirective::create(
                                '\.(bmp|cur|gif|ico|jpe?g|png|svgz?|webp)$',
                                [
                                    SetEnvIfDirective::create('Origin', '":"', 'IS_CORS'),
                                    HeaderDirective::set(null, 'Access-Control-Allow-Origin', '"*"', 'env=IS_CORS')
                                ]
                            )
                        ]
                    )
                ]
            )
        ];
    }
}
