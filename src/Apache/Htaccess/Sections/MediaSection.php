<?php

namespace ByTIC\Configen\Apache\Htaccess\Sections;

use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaCharacterEncodingsRule;
use ByTIC\Configen\Apache\Htaccess\Rules\Media\MediaTypesRule;

/**
 * Class CrossOriginSection
 * @package ByTIC\Configen\Apache\Htaccess\Sections
 */
class MediaSection extends AbstractSection
{
    public static $name = 'Media';
    public static $title = 'MEDIA TYPES AND CHARACTER ENCODINGS';
    public static $description;

    /**
     * @inheritDoc
     */
    protected function childRules()
    {
        return [
            MediaTypesRule::$name,
            MediaCharacterEncodingsRule::$name
        ];
    }
}
