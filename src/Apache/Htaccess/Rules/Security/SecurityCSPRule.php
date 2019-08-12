<?php

namespace ByTIC\Configen\Apache\Htaccess\Rules\Security;

/**
 * Class SecurityCSPRule
 * @package ByTIC\Configen\Apache\Htaccess\Rules\Security
 */
class SecurityCSPRule extends AbstractRule
{
    public static $name = 'SecurityCSP';
    public static $title = 'Content Security Policy (CSP)';
    public static $description = 'Mitigate the risk of cross-site scripting and other content-injection
attacks.

This can be done by setting a `Content Security Policy` which
whitelists trusted sources of content for your website.

The example header below allows ONLY scripts that are loaded from
the current website\'s origin (no inline scripts, no CDN, etc).
That almost certainly won\'t work as-is for your website!

To make things easier, you can use an online CSP header generator
such as: http://cspisawesome.com/.

https://content-security-policy.com/
https://www.html5rocks.com/en/tutorials/security/content-security-policy/
https://w3c.github.io/webappsec-csp/';
}
