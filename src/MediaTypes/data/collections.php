<?php

return [
    'DataInterchange' => [
        'description' => 'Data interchange',
        'types' => [
            'application/atom+xml',
            'application/json',
            'application/ld+json',
            'application/rss+xml',
            'application/vnd.geo+json',
            'application/xml',
        ]
    ],
    'JavaScript' => [
        'description' => 'JavaScript
Normalize to standard type.
https://tools.ietf.org/html/rfc4329#section-7.2',
        'types' => [
            'application/javascript',
        ]
    ],
    'ManifestFiles' => [
        'description' => 'Manifest files',
        'types' => [
            'application/manifest+json',
            'application/x-web-app-manifest+json',
            'text/cache-manifest',
        ]
    ],
    'MediaFiles' => [
        'description' => 'Media files',
        'types' => [
            'audio/mp4',
            'audio/ogg',
            'image/bmp',
            'image/svg+xml',
            'image/webp',
            'video/mp4',
            'video/ogg',
            'video/webm',
            'video/x-flv'
        ]
    ],
    'Icons' => [
        'description' => 'Serving `.ico` image files with a different media type
prevents Internet Explorer from displaying then as images:
https://github.com/h5bp/html5-boilerplate/commit/37b5fec090d00f38de64b591bcddcb205aadf8ee',
        'types' => [
            'image/x-icon',
        ]
    ],
    'WebFonts' => [
        'description' => 'Web fonts
Browsers usually ignore the font media types and simply sniff
the bytes to figure out the font type.
https://mimesniff.spec.whatwg.org/#matching-a-font-type-pattern

However, Blink and WebKit based browsers will show a warning
in the console if the following font types are served with any
other media types.',
        'types' => [
            'application/font-woff',
            'application/font-woff2',
            'application/vnd.ms-fontobject',
            'application/x-font-ttf',
            'font/opentype',
        ]
    ],
    'Other' => [
        'description' => 'Other',
        'types' => [
            'application/octet-stream',
            'application/x-bb-appworld',
            'application/x-chrome-extension',
        ]
    ],
];