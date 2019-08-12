<?php

namespace ByTIC\Configen\Apache\Htaccess;

use ByTIC\Configen\AbstractConfig\Parts\Comment;
use ByTIC\Configen\AbstractConfig\Printer\GenericPrinter;
use ByTIC\Configen\Apache\Htaccess\Parts\CommentHeadingOne;
use ByTIC\Configen\Apache\Htaccess\Parts\CommentHeadingTwo;

/**
 * Class HtaccessPrinter
 * @package ByTIC\Configen\Apache\Htaccess
 */
class HtaccessPrinter extends GenericPrinter
{

    /**
     * @param CommentHeadingOne $comment
     * @return string
     */
    public static function printCommentHeadingOne(CommentHeadingOne $comment)
    {
        $lines = explode("\n", $comment->getContent());
        $lineWidth = 70;
        $return[] = '# ' . str_repeat('#', $lineWidth);
        foreach ($lines as $line) {
            $return[] = '# # ' . str_pad($line, $lineWidth - 3) . '#';
        }
        $return[] = '# ' . str_repeat('#', $lineWidth);
        return implode("\n", $return);
    }

    /**
     * @param CommentHeadingTwo $comment
     * @return string
     */
    public static function printCommentHeadingTwo(CommentHeadingTwo $comment)
    {
        $lines = explode("\n", $comment->getContent());
        $lineWidth = 70;
        $return[] = '# ' . str_repeat('-', $lineWidth);
        foreach ($lines as $line) {
            $return[] = '# | ' . str_pad($line, $lineWidth - 3) . '|';
        }
        $return[] = '# ' . str_repeat('-', $lineWidth);
        return implode("\n", $return);
    }

    /**
     * @param Comment $comment
     * @return string
     */
    public static function printComment(Comment $comment)
    {
        $lines = explode("\n", $comment->getContent());
        $return = [];
        foreach ($lines as $line) {
            $return[] = trim('# ' . $line);
        }
        return implode("\n", $return);
    }

    /**
     * @return array
     */
    protected function getPartNamespaces()
    {
        return parent::getPartNamespaces();
    }
}
