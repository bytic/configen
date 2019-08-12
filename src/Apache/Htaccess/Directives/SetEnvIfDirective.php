<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class SetEnvIfDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class SetEnvIfDirective extends AbstractDirective
{
    protected $attribute = '';
    protected $condition = '';
    protected $value = '';


    /**
     * @param $attribute
     * @param $condition
     * @param $value
     * @return static
     */
    public static function create($attribute, $condition, $value = null)
    {
        $header = new static();
        $header->setAttribute($attribute);
        $header->setCondition($condition);
        $header->setValue($value);
        return $header;
    }

    /**
     * @inheritDoc
     */
    public function generateConfigParts()
    {
        $header = new SimpleText($this->generate());
        return [$header];
    }

    /**
     * @return string
     */
    public function generate()
    {
        $return = 'SetEnvIf';
        $return .= ' ' . $this->attribute;
        $return .= ' ' . $this->condition;
        $return .= ' ' . $this->value;
        return $return;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute(string $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}
