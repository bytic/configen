<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class AddCharsetDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class AddCharsetDirective extends AbstractDirective
{
    /**
     * Available values On|Off|Charset
     * @var string
     */
    protected $charset = '';

    protected $extensions = [];

    /**
     * @param string $charset
     * @param array $extensions
     * @return self
     */
    public static function create($charset, ...$extensions)
    {
        $header = new static();
        $header->setCharset($charset);
        $header->setExtensions($extensions);
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
        $return = 'AddCharset';
        $return .= ' ' . $this->charset . ' ';
        $len = strlen($return);
        foreach ($this->extensions as $extension) {
            $return .= '.'. $extension.' \\' ."\n";
            $return .= str_repeat(' ', $len);
        }
        $return = trim($return," \ \t\n\r\0\x0B");
        return $return;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset)
    {
        $this->charset = $charset;
    }

    /**
     * @param array $extensions
     */
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
    }
}
