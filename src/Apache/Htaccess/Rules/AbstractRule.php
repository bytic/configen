<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules;

use ByTIC\Configen\Apache\Htaccess\Htaccess;
use ByTIC\Configen\Apache\Htaccess\Rules\Traits\HasDirectivesTraits;

/**
 * Class AbstractSection
 * @package ByTIC\Configen\Apache\Htaccess\Rules
 */
abstract class AbstractRule
{
    use HasDirectivesTraits;

    public static $section = '';

    public static $name = '';
    public static $title = '';
    public static $description = '';

    /**
     * @var Htaccess
     */
    protected $config;

    /**
     * AbstractRule constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * @param $config
     */
    public function generate($config)
    {
        $this->setConfig($config);

        $this->generateTitle();
        $this->getConfig()->addEmptyLine();
        $this->generateDescription();

        $this->getConfig()->addParts($this->generatePartsFromDirectives());
        $this->getConfig()->addEmptyLine();
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
        $this->getConfig()->addCommentHeadingTwo(static::$title);
    }

    protected function generateDescription()
    {
        if (empty(static::$description)) {
            return;
        }
        $this->getConfig()->addComment(static::$description);
    }
}
