<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class OptionsDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class OptionsDirective extends AbstractDirective
{
    protected $options = '';


    /**
     * @param $options
     * @return static
     */
    public static function create($options)
    {
        $header = new static();
        $header->setOptions($options);
        return $header;
    }

    /**
     * @inheritDoc
     */
    public function generateConfigParts()
    {
        $parts = parent::generateConfigParts();
        $parts[] = new SimpleText($this->generate());
        return $parts;
    }

    /**
     * @return string
     */
    public function generate()
    {
        $return = 'Options';
        $return .= ' ' . $this->options;
        return $return;
    }

    /**
     * @param string $code
     */
    public function setOptions(string $code)
    {
        $this->options = $code;
    }
}
