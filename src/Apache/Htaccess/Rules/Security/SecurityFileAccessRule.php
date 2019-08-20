<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Security;

use ByTIC\Configen\Apache\Htaccess\Directives\Enclosures\IfModuleDirective;
use ByTIC\Configen\Apache\Htaccess\Directives\OptionsDirective;

/**
 * Class SecurityCSPRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Security
 */
class SecurityFileAccessRule extends AbstractRule
{
    public static $name = 'SecurityFileAccess';
    public static $title = 'File access';
//    public static $description = '';

    /**
     * @inheritDoc
     */
    protected function createDirectives()
    {
        return [
            $this->createDirectiveNoIndex(),
            $this->createDirectiveBlockHiddenFiles(),
            $this->createDirectiveBlockSensitiveFiles()
        ];
    }

    /**
     * @return IfModuleDirective
     */
    protected function createDirectiveNoIndex()
    {
        $directive = IfModuleDirective::create('mod_autoindex', [
            OptionsDirective::create('-Indexes')
        ]);
        $directive->setComments('Block access to directories without a default document.

You should leave the following uncommented, as you shouldn\'t allow
anyone to surf through every directory on your server (which may
includes rather private places such as the CMS\'s directories).');
        return $directive;
    }

    /**
     * @return IfModuleDirective
     */
    protected function createDirectiveBlockHiddenFiles()
    {
        $directive = IfModuleDirective::create('mod_authz_core', [
            OptionsDirective::create('-Indexes')
        ]);
        $directive->setComments('Block access to all hidden files and directories with the exception of
the visible content from within the `/.well-known/` hidden directory.

These types of files usually contain user preferences or the preserved
state of an utility, and can include rather private places like, for
example, the `.git` or `.svn` directories.

The `/.well-known/` directory represents the standard (RFC 5785) path
prefix for "well-known locations" (e.g.: `/.well-known/manifest.json`,
`/.well-known/keybase.txt`), and therefore, access to its visible
content should not be blocked.

https://www.mnot.net/blog/2010/04/07/well-known
https://tools.ietf.org/html/rfc5785');
        return $directive;
    }

    /**
     * @return IfModuleDirective
     */
    protected function createDirectiveBlockSensitiveFiles()
    {
        $directive = IfModuleDirective::create('mod_authz_core', [
            OptionsDirective::create('-Indexes')
        ]);
        $directive->setComments('Block access to files that can expose sensitive information.

By default, block access to backup and source files that may be
left by some text editors and can pose a security risk when anyone
has access to them.

https://feross.org/cmsploit/
(!) Update the `<FilesMatch>` regular expression from below to
include any files that might end up on your production server and
can expose sensitive information about your website. These files may
include: configuration files, files that contain metadata about the
project (e.g.: project dependencies), build scripts, etc..');
        return $directive;
    }
}
