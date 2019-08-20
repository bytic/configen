<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Media;

use ByTIC\Configen\Apache\Htaccess\Directives\AddTypeDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\MediaTypes\MediaTypeCollections;
use Exception;

/**
 * Class ErrorsCustomDocumentsRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Media
 */
class MediaTypesRule extends AbstractRule
{
    public static $name = 'MediaTypes';
    public static $title = 'Media types';
    public static $description = 'Serve resources with the proper media types (f.k.a. MIME types).

https://www.iana.org/assignments/media-types/media-types.xhtml
https://httpd.apache.org/docs/current/mod/mod_mime.html#addtype';

    protected $fileTypes = [];

    public function __construct()
    {
        parent::__construct();
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->initAllTypes();
    }

    /**
     * @throws Exception
     */
    public function initAllTypes()
    {
        $types = MediaTypeCollections::types();
        foreach ($types as $type => $extensions) {
            $this->addType($type, $extensions);
        }
    }

    /**
     * @param $type
     * @param null $extensions
     * @throws Exception
     */
    public function addType($type, $extensions = null)
    {
        $extensions = !is_array($extensions) ?: MediaTypeCollections::getExtensions($type);
        if (!is_array($extensions) || count($extensions) < 1) {
            throw new Exception("Type [{$type}] needs extensions array. None found");
        }
        $this->fileTypes[$type] = $extensions;
    }

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            IfModuleDirective::create(
                'mod_mime',
                $this->generateDirectivesFromTypes()
            )
        ];
    }

    /**
     * @return array
     */
    protected function generateDirectivesFromTypes()
    {
        $collections = MediaTypeCollections::collections();
        $fileTypes = $this->fileTypes;
        $directives = [];

        foreach ($collections as $collectionName => $collection) {
            $first = true;
            foreach ($collection['types'] as $typeName) {
                $extensions = isset($fileTypes[$typeName]) ? $fileTypes[$typeName] : [];
                if (count($extensions)) {
                    $comment = $first ? $collection['description'] : false;
                    $directives[] = $this->generateDirectiveForType($typeName, $extensions, $comment);
                    $first = false;
                    unset($fileTypes[$typeName]);
                }
            }
        }

        foreach ($fileTypes as $typeName => $extensions) {
            $directives[] = $this->generateDirectiveForType($typeName, $extensions);
        }
        return $directives;
    }

    /**
     * @param $type
     * @param $extensions
     * @param bool $comment
     * @return AddTypeDirective
     */
    protected function generateDirectiveForType($type, $extensions, $comment = false)
    {
        $directive = AddTypeDirective::create($type, ...$extensions);
        if ($comment) {
            $directive->setComments($comment);
        }
        return $directive;
    }
}
