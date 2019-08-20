<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class RewriteRuleDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class RewriteRuleDirective extends AbstractDirective
{
    /**
     * @var string
     */
    protected $pattern = '';

    /**
     * @var string
     */
    protected $substitution = '';

    /**
     * @var array
     */
    protected $flags = [];

    /**
     * @var RewriteCondDirective[]
     */
    protected $conditions = [];

    /**
     * @param $pattern
     * @param $substitution
     * @param $flags
     * @return static
     */
    public static function create($pattern, $substitution, array $flags = [])
    {
        $directive = new static();
        $directive->setPattern($pattern);
        $directive->setSubstitution($substitution);
        $directive->setFlags($flags);
        return $directive;
    }

    /**
     * @param $testString
     * @param $condition
     * @param array $flags
     */
    public function withCondition($testString, $condition, array $flags = [])
    {
        $this->addCondition(RewriteCondDirective::create($testString, $condition, $flags));
    }

    /**
     * @param RewriteCondDirective $condDirective
     */
    public function addCondition(RewriteCondDirective $condDirective)
    {
        $this->conditions[] = $condDirective;
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
        $return = $this->generateConditions();
        $return .= 'RewriteRule';
        $return .= ' ' . $this->pattern;
        $return .= ' ' . $this->substitution;
        if (count($this->flags)) {
            $return .= ' [' . implode(',', $this->flags) . ']';
        }
        return $return;
    }

    /**
     * @return string
     */
    protected function generateConditions()
    {
        $return = '';
        foreach ($this->conditions as $condition) {
            $return .= $condition->generate() . "\n";
        }
        return $return;
    }

    /**
     * @param string $pattern
     */
    public function setPattern(string $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @param array $flags
     */
    public function setFlags(array $flags)
    {
        $this->flags = $flags;
    }

    /**
     * @param string $substitution
     */
    public function setSubstitution(string $substitution)
    {
        $this->substitution = $substitution;
    }
}
