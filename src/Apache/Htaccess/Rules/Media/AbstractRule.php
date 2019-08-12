<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule as GenericRule;
use ByTIC\Configen\Apache\Htaccess\Sections\MediaSection;

/**
 * Class AbstractRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Errors
 */
class AbstractRule extends GenericRule
{

    /**
     * AbstractRule constructor.
     */
    public function __construct()
    {
        static::$section = MediaSection::$name;
    }
}
