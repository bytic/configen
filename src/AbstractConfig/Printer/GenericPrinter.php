<?php

namespace ByTIC\Configen\AbstractConfig\Printer;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class GenericPrinter
 * @package ByTIC\Configen\AbstractConfig\Printer
 */
class GenericPrinter
{
    protected $config;

    /**
     * GenericPrinter constructor.
     * @param $config
     */
    public function __construct($config = null)
    {
        $this->config = $config;
    }

    /**
     * @param null $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return string
     */
    public function generateContent()
    {
        $parts = $this->getConfig()->getParts();
        $return = [];
        foreach ($parts as $part) {
            $return[] = $this->generateForPart($part);
        }
        return implode("\n", $return);
    }

    /**
     * @param $part
     * @return string
     */
    public function printEmptyLine($part)
    {
        return "";
    }

    /**
     * @param SimpleText $part
     * @return string
     */
    public function printSimpleText($part)
    {
        return $part->getContent();
    }

    /**
     * @param $part
     * @return string
     */
    protected function generateForPart($part)
    {
        $functionName = $this->generateFunctionNameForPart($part);

        if (!method_exists($this, $functionName)) {
            return;
        }
        return $this->$functionName($part);
    }

    protected function generateFunctionNameForPart($part)
    {
        $className = get_class($part);
        $name = str_replace(
            $this->getPartNamespaces(),
            '',
            $className
        );
        return 'print' . $name;
    }

    /**
     * @return array
     */
    protected function getPartNamespaces()
    {
        return $this->getConfig()->getPartNamespaces();
    }
}
