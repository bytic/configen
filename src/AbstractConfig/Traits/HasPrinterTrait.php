<?php

namespace ByTIC\Configen\AbstractConfig\Traits;

use ByTIC\Configen\AbstractConfig\Printer\GenericPrinter;

/**
 * Trait HasPrinterTrait
 * @package ByTIC\Configen\AbstractConfig\Traits
 */
trait HasPrinterTrait
{
    /**
     * @var GenericPrinter
     */
    protected $printer = null;

    /**
     * @return GenericPrinter
     */
    public function getPrinter(): GenericPrinter
    {
        if ($this->printer === null) {
            $this->initPrinter();
        }
        return $this->printer;
    }

    /**
     * @param GenericPrinter $printer
     */
    public function setPrinter(GenericPrinter $printer)
    {
        $this->printer = $printer;
    }

    protected function initPrinter()
    {
        $printer = method_exists($this, 'generatePrinter')
            ? $this->generatePrinter() : $this->generateGenericPrinter();
        $printer->setConfig($this);
        $this->setPrinter($printer);
    }

    /**
     * @return GenericPrinter
     */
    protected function generateGenericPrinter()
    {
        return new GenericPrinter();
    }
}
