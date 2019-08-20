<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class RewriteEngineDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class RewriteEngineDirective extends AbstractDirective
{
    /**
     * Available values On|Off
     * @var string
     */
    protected $status = '';

    /**
     * @param string $status
     * @return static
     */
    public static function create($status)
    {
        $header = new static();
        $header->setStatus($status);
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
        $return = 'RewriteEngine';
        $return .= ' ' . $this->status;

        return $return;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
