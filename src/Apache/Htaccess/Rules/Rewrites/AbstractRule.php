<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Rewrites;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule as GenericRule;
use ByTIC\Configen\Apache\Htaccess\Sections\RewritesSection;
use ByTIC\Configen\Apache\Htaccess\Sections\SecuritySection;

/**
 * Class AbstractRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Rewrites
 */
abstract class AbstractRule extends GenericRule
{

    /**
     * AbstractRule constructor.
     */
    public function __construct()
    {
        parent::__construct();
        static::$section = RewritesSection::$name;
    }
}
