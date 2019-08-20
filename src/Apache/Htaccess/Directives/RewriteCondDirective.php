<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class RewriteCondDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class RewriteCondDirective extends AbstractDirective
{
    /**
     * @var string
     */
    protected $testString = '';

    /**
     * @var string
     */
    protected $condition = '';

    /**
     * @var array
     */
    protected $flags = [];

    /**
     * @param $testString
     * @param $condition
     * @param $flags
     * @return static
     */
    public static function create($testString, $condition, array $flags = [])
    {
        $header = new static();
        $header->setTestString($testString);
        $header->setCondition($condition);
        $header->setFlags($flags);
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
        $return = 'RewriteCond';
        $return .= ' ' . $this->testString;
        $return .= ' ' . $this->condition;
        if (count($this->flags)) {
            $return .= ' [' . implode(',', $this->flags) . ']';
        }

        return $return;
    }

    /**
     * @param string $testString
     */
    public function setTestString(string $testString)
    {
        $this->testString = $testString;
    }

    /**
     * @param array $flags
     */
    public function setFlags(array $flags)
    {
        $this->flags = $flags;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }
}
