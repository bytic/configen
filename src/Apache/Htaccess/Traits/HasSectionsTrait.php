<?php

namespace ByTIC\Configen\Apache\Htaccess\Traits;

use ByTIC\Configen\Apache\Htaccess\Rules\AbstractRule;
use ByTIC\Configen\Apache\Htaccess\Sections\AbstractSection;
use ByTIC\Configen\Apache\Htaccess\Sections\CrossOriginSection;

/**
 * Trait HasSectionsTrait
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
trait HasSectionsTrait
{
    /**
     * @var null|AbstractSection[]
     */
    protected $sections = [];

    /**
     * @return AbstractSection[]|null
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param $name
     * @return AbstractSection
     */
    public function getSection($name)
    {
        if (!isset($this->sections[$name])) {
            $this->initSection($name);
        }
        return $this->sections[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasSection($name)
    {
        return isset($this->sections[$name]);
    }

    /**
     * @param string $name
     */
    protected function initSection($name)
    {
        $class = '\ByTIC\Configen\Apache\Htaccess\Sections\\' . $name . 'Section';
        $rule = new $class;
        $rule->setConfig($this);
        $this->addSection($rule);
    }


    /**
     * @param AbstractSection $section
     */
    public function addSection(AbstractSection $section)
    {
        $this->sections[$section::$name] = $section;

        $order = $this->getSectionOrder();
        $sections = [];
        foreach ($order as $sectionName) {
            if (isset($this->sections[$sectionName])) {
                $sections[$sectionName] = $this->sections[$sectionName];
                unset($this->sections[$sectionName]);
            }
        }
        $this->sections = array_merge($sections, $this->sections);
    }

    protected function buildSections()
    {
        foreach ($this->sections as $section) {
            $section->generate($this);
        }
    }

    /**
     * @return array
     */
    public function getSectionOrder()
    {
        return [
            CrossOriginSection::$name
        ];
    }
}
