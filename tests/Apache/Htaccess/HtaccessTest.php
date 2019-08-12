<?php

namespace ByTIC\Configen\Tests\Apache\Htaccess;

use ByTIC\Configen\Apache\Htaccess\Htaccess;
use ByTIC\Configen\Tests\AbstractTest;

/**
 * Class HtaccessTest
 * @package ByTIC\Configen\Tests\Apache\Htaccess
 */
class HtaccessTest extends AbstractTest
{
    public function testGenerate()
    {
        $htaccess = new Htaccess();
        $htaccess->addComment(
            'INSPIRATIONS',
            'See https://github.com/sergeychernyshev/.htaccess',
            'https://github.com/h5bp/html5-boilerplate/blob/master/dist/.htaccess?ts=2'
        );
        $htaccess->addEmptyLine();

        $htaccess->getSection('CrossOrigin')->enableAllRules();
        $htaccess->getSection('Errors')->enableAllRules();
        $htaccess->getSection('Media')->enableAllRules();
        $htaccess->getSection('Security')->enableAllRules();

//        $htaccess->addCommentHeadingOne('SPECIFIC APPLICATION CONFIG');

        static::assertSame(
            $htaccess->generate(),
            file_get_contents(TEST_FIXTURES . '/Apache/Htaccess/boilarplate.htaccess')
        );
    }
}
