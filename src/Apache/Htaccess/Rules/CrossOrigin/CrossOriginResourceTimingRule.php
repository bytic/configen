<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\FilesMatchDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\HeaderDirective;

/**
 * Class CrossOriginRequestsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginResourceTimingRule extends AbstractRule
{
    public static $name = 'CrossOriginResourceTiming';
    public static $title = 'Cross-origin resource timing';
    public static $description = 'Allow cross-origin access to the timing information for all resources.

If a resource isn\'t served with a `Timing-Allow-Origin` header that
would allow its timing information to be shared with the document,
some of the attributes of the `PerformanceResourceTiming` object will
be set to zero.

https://www.w3.org/TR/resource-timing/
http://www.stevesouders.com/blog/2014/08/21/resource-timing-practical-tips/';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_headers',
                [
                    HeaderDirective::set(null, 'Timing-Allow-Origin:', '"*"')
                ]
            )
        ];
    }
}
