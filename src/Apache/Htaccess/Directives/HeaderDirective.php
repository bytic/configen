<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class IfModuleDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class HeaderDirective extends AbstractDirective
{
    protected $condition = '';

    /**
     * @var string add|append|echo|edit|edit*|merge|set|setifempty|unset|note
     */
    protected $action = '';

    protected $name = '';

    protected $value = null;

    protected $replacement = null;

    protected $additionalArgument = null;

    /**
     * @param $condition
     * @param $name
     * @param $value
     * @param $replacement
     * @param $additionalArgument
     * @return HeaderDirective
     */
    public static function set($condition, $name, $value, $additionalArgument = null)
    {
        $header = static::create($condition, 'set', $name, $value, null, $additionalArgument);
        return $header;
    }

    /**
     * @param $condition
     * @param $action
     * @param $name
     * @param $value
     * @param $replacement
     * @param $additionalArgument
     * @return HeaderDirective
     */
    public static function create($condition, $action, $name, $value, $replacement = null, $additionalArgument = null)
    {
        $header = new static();
        if ($condition) {
            $header->setCondition($condition);
        }
        $header->setAction($action);
        $header->setName($name);
        $header->setValue($value);
        $header->setReplacement($replacement);
        $header->setAdditionalArgument($additionalArgument);
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
        $return = 'Header';
        foreach (['condition', 'action', 'name', 'value', 'replacement', 'additionalArgument'] as $param) {
            if (!empty($this->{$param})) {
                $return .= ' ' . $this->{$param};
            }
        }
        return $return;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action)
    {
        $this->action = $action;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param null $replacement
     */
    public function setReplacement($replacement)
    {
        $this->replacement = $replacement;
    }

    /**
     * @param null $additionalArgument
     */
    public function setAdditionalArgument($additionalArgument)
    {
        $this->additionalArgument = $additionalArgument;
    }
}
