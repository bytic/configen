<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Htaccess;

/**
 * Class AbstractSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
abstract class AbstractSection
{
    public static $name = '';
    public static $title = '';
    public static $description = '';
    protected $rules;

    /**
     * @var Htaccess
     */
    protected $config;

    /**
     * @param $config
     */
    public function generate($config)
    {
        $this->setConfig($config);
        $this->generateTitle();
        $this->generateDescription();
        $this->getConfig()->addEmptyLine();
        $this->generateRules();
    }

    public function enableAllRules()
    {
        $rules = $this->childRules();
        foreach ($rules as $rule) {
            $this->getConfig()->getRule($rule);
        }
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return self::$name;
    }

    /**
     * @return Htaccess
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Htaccess $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    protected function generateTitle()
    {
        $this->getConfig()->addCommentHeadingOne(static::$title);
    }

    protected function generateDescription()
    {
        if (empty(static::$description)) {
            return;
        }
        $this->getConfig()->addComment(static::$description);
    }

    protected function generateRules()
    {
        $ruleNames = $this->childRules();
        foreach ($ruleNames as $ruleName) {
            $this->generateRule($ruleName);
        }
    }

    /**
     * @param $ruleName
     */
    protected function generateRule($ruleName)
    {
        if ($this->getConfig()->hasRule($ruleName)) {
            $this->getConfig()->getRule($ruleName)->generate($this->getConfig());
        }
    }

    /**
     * @return array
     */
    abstract protected function childRules();
}
