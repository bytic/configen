<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class AddTypeDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class AddTypeDirective extends AbstractDirective
{
    protected $type = '';

    protected $extensions = [];

    /**
     * @param string $type
     * @param $extensions
     * @return static
     */
    public static function create($type, ...$extensions)
    {
        $header = new static();
        $header->setType($type);
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
        $return = 'AddType';
        $return .= ' ' . str_pad($this->type, 44);
        $return .= ' ' . implode(' ', $this->extensions);

        return $return;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param array $extensions
     */
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
    }
}
