<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\SimpleText;

/**
 * Class ErrorDocumentDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
class ErrorDocumentDirective extends AbstractDirective
{
    protected $code = '';
    protected $document = '';


    /**
     * @param $code
     * @param $document
     * @return static
     */
    public static function create($code, $document)
    {
        $header = new static();
        $header->setCode($code);
        $header->setDocument($document);
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
        $return = 'ErrorDocument';
        $return .= ' ' . $this->code;
        $return .= ' ' . $this->document;
        return $return;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param string $document
     */
    public function setDocument(string $document)
    {
        $this->document = $document;
    }
}
