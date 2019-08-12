<?php

namespace ByTIC\Configen\Apache\Htaccess\Directives;

use ByTIC\Configen\AbstractConfig\Parts\Comment;
use ByTIC\Configen\AbstractConfig\Parts\EmptyLine;

/**
 * Class AbstractDirective
 * @package ByTIC\Configen\Apache\Htaccess\Directives
 */
abstract class AbstractDirective
{
    protected $comments = null;

    /**
     * return AbstractPart[]
     */
    public function generateConfigParts()
    {
        if ($this->hasComments()) {
            return [$this->generateConfigPartsComment(), new EmptyLine()];
        }
        return [];
    }

    /**
     * @return Comment
     */
    protected function generateConfigPartsComment()
    {
        return new Comment($this->getComments());
    }

    public function hasComments()
    {
        return !empty($this->comments);
    }

    /**
     * @return null
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param null $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}
