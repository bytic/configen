<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin;

/**
 * Class CrossOriginImagesRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\CrossOrigin
 */
class CrossOriginImagesRule extends AbstractRule
{
    public static $name = 'CrossOriginImages';
    public static $title = 'Cross-origin images';
    public static $description = 'Send the CORS header for images when browsers request it.

https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_enabled_image
https://blog.chromium.org/2011/07/using-cross-domain-images-in-webgl-and.html';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [];
    }
}
