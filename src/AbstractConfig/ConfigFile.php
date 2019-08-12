<?php

namespace ByTIC\Configen\AbstractConfig;

use ByTIC\Configen\AbstractConfig\Traits\HasPartsTrait;
use ByTIC\Configen\AbstractConfig\Traits\HasPrinterTrait;

/**
 * Class ConfigFile
 * @package ByTIC\Configen\AbstractConfig
 */
abstract class ConfigFile
{
    use HasPrinterTrait;
    use HasPartsTrait;

    /**
     * @return string
     */
    public function generate()
    {
        $return = $this->getPrinter()->generateContent();
        return $return;
    }
}
