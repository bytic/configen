<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule as GenericRule;
use ByTIC\Configen\Apache\Htaccess\Sections\CrossOriginSection;

/**
 * Class CrossOriginRequestsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
abstract class AbstractRule extends GenericRule
{

    /**
     * AbstractRule constructor.
     */
    public function __construct()
    {
        parent::__construct();
        static::$section = CrossOriginSection::$name;
    }
}
