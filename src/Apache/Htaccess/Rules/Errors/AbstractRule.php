<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Errors;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule as GenericRule;
use ByTIC\Configen\Apache\Htaccess\Sections\ErrorsSection;

/**
 * Class AbstractRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Errors
 */
abstract class AbstractRule extends GenericRule
{

    /**
     * AbstractRule constructor.
     */
    public function __construct()
    {
        static::$section = ErrorsSection::$name;
    }
}
