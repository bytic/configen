<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule as GenericRule;
use ByTIC\Configen\Apache\Htaccess\Sections\ErrorsSection;
use ByTIC\Configen\Apache\Htaccess\Sections\InternetExplorerSection;

/**
 * Class AbstractRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\InternetExplorer
 */
abstract class AbstractRule extends GenericRule
{

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        static::$section = InternetExplorerSection::$name;
    }
}
