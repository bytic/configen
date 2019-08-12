<?php

namespace ByTIC\Configen\Apache\Htaccess\Traits;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule;
use ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin\CrossOriginRequestsRule;

/**
 * Trait HasRulesTrait
 * @package ByTIC\Configen\Apache\Htaccess\Traits
 */
trait HasRulesTrait
{
    protected $rules = [];

    /**
     * @param $name
     * @return AbstractRule
     */
    public function getRule($name)
    {
        if (!isset($this->rules[$name])) {
            $this->initRule($name);
        }
        return $this->rules[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasRule($name)
    {
        return isset($this->rules[$name]);
    }

    /**
     * @param AbstractRule $rule
     */
    public function addRule(AbstractRule $rule)
    {
        $this->rules[$rule::getName()] = $rule;
    }

    /**
     * @param string $name
     */
    protected function initRule($name)
    {
        $class = $this->generateRuleClass($name);
        if (!class_exists($class)) {
            throw new \Exception("Invalid rule name [$name] class not found [$class]");
        }
        $rule = new $class;
        $this->addRule($rule);
    }

    /**
     * @param $name
     * @return string
     */
    protected function generateRuleClass($name)
    {
        $base = 'ByTIC\Configen\Apache\Htaccess\Rules\\';
        $name = strtr(
            $name,
            [
                'CrossOrigin' => 'CrossOrigin\CrossOrigin',
                'Errors' => 'Errors\Errors',
                'InternetExplorer' => 'InternetExplorer\InternetExplorer',
                'Media' => 'Media\Media',
                'Security' => 'Security\Security'
            ]
        );
        return $base . $name . 'Rule';
    }
}
