<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class RewriteBaseDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class RewriteBaseDirective extends AbstractDirective
{
    /**
     * @var string
     */
    protected $base = '';

    /**
     * @param string $status
     * @return static
     */
    public static function create($status)
    {
        $header = new static();
        $header->setBase($status);
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
        $return = 'RewriteBase';
        $return .= ' ' . $this->base;

        return $return;
    }

    /**
     * @param string $base
     */
    public function setBase(string $base)
    {
        $this->base = $base;
    }
}
