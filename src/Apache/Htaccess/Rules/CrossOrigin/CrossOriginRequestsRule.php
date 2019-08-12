<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class CrossOriginRequestsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginRequestsRule extends AbstractRule
{
    public static $name = 'CrossOriginRequests';
    public static $title = 'Cross-origin requests';
    public static $description = 'Allow cross-origin requests.

https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
https://enable-cors.org/
https://www.w3.org/TR/cors/';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_headers',
                [HeaderDirective::set(null, 'Access-Control-Allow-Origin', '"*"')]
            )
        ];
    }
}
