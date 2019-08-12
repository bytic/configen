<?php

namespace ByTIC\Configen\Apache\Htaccess;

use ByTIC\Configen\AbstractConfig\ConfigFile;
use ByTIC\Configen\AbstractConfig\Parts\Comment;
use ByTIC\Configen\Apache\Htaccess\Parts\CommentHeadingOne;
use ByTIC\Configen\Apache\Htaccess\Parts\CommentHeadingTwo;
use ByTIC\Configen\Apache\Htaccess\Traits\HasRulesTrait;
use ByTIC\Configen\Apache\Htaccess\Traits\HasSectionsTrait;

/**
 * Class Htaccess
 * @package ByTIC\Configen\Apache\Htaccess
 */
class Htaccess extends ConfigFile
{
    use HasSectionsTrait;
    use HasRulesTrait;

    /**
     * @return string
     */
    public function generate()
    {
        $this->buildSections();
        return parent::generate();
    }

    /**
     * @param array $lines
     */
    public function addCommentHeadingOne(...$lines)
    {
        $content = implode("\n", $lines);
        $this->addPart(new CommentHeadingOne($content));
    }

    /**
     * @param array $lines
     */
    public function addCommentHeadingTwo(...$lines)
    {
        $content = implode("\n", $lines);
        $this->addPart(new CommentHeadingTwo($content));
    }

    /**
     * @return HtaccessPrinter
     */
    public function generatePrinter()
    {
        return new HtaccessPrinter();
    }

    /**
     * @return array
     */
    public function getPartNamespaces()
    {
        $return = parent::getPartNamespaces();
        $return[] = 'ByTIC\Configen\Apache\Htaccess\Parts\\';
        return $return;
    }
}
