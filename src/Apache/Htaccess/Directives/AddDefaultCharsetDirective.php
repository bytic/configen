<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class AddDefaultCharsetDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class AddDefaultCharsetDirective extends AbstractDirective
{
    /**
     * Available values On|Off|Charset
     * @var string
     */
    protected $charset = '';

    /**
     * @param string $charset
     * @return static
     */
    public static function create($charset)
    {
        $header = new static();
        $header->setCharset($charset);
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
        $return = 'AddDefaultCharset';
        $return .= ' ' . $this->charset;

        return $return;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset)
    {
        $this->charset = $charset;
    }
}
