<?php return [
    // This contains the Laravel Packages that you want this plugin to utilize listed under their package identifiers
    'packages' => [
		'laravel/fortify' => [
            // Service providers to be registered by your plugin
            'providers' => [
				'\Laravel\Fortify\FortifyServiceProvider',
            ],

            // Aliases to be registered by your plugin in the form of $alias => $pathToFacade
            'aliases' => [],

            // The namespace to set the configuration under.
            'config_namespace' => 'fortify',

            // The configuration file for the package itself. Start this out by copying the default one that comes with the package and then modifying what you need.
            'config' => [
                'encoding'      => 'UTF-8',
                'finalize'      => true,
                'cachePath'     => storage_path('app/fortify'),
                'cacheFileMode' => 0755,
                'settings'      => [
                    'default' => [
                        'HTML' => [
                            'Doctype'             => 'XHTML 1.0 Strict',
                            'Allowed'             => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
                        ],
                        'CSS'  => [
                            'AllowedProperties'   => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
                        ],
                        'AutoFormat' => [
                            'AutoParagraph' => true,
                            'RemoveEmpty'   => true,
                        ],
                    ],
                    'test'    => [
                        'Attr' => ['EnableID' => true]
                    ],
                    "youtube" => [
                        "HTML" => ["SafeIframe" => 'true'],
                        "URI"  => ["SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"],
                    ],
                ],
            ],
        ],
		'laravel/sanctum' => [
            // Service providers to be registered by your plugin
            'providers' => [
				'\Laravel\Sanctum\SanctumServiceProvider',
            ],

            // Aliases to be registered by your plugin in the form of $alias => $pathToFacade
            'aliases' => [],

            // The namespace to set the configuration under
            'config_namespace' => 'sanctum',

            // The configuration file for the package itself. Start this out by copying the default one that comes with the package and then modifying what you need.
            'config' => [
                'encoding'      => 'UTF-8',
                'finalize'      => true,
                'cachePath'     => storage_path('app/sanctum'),
                'cacheFileMode' => 0755,
                'settings'      => [
                    'default' => [
                        'HTML' => [
                            'Doctype'             => 'XHTML 1.0 Strict',
                            'Allowed'             => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
                        ],
                        'CSS'  => [
                            'AllowedProperties'   => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
                        ],
                        'AutoFormat' => [
                            'AutoParagraph' => true,
                            'RemoveEmpty'   => true,
                        ],
                    ],
                    'test'    => [
                        'Attr' => ['EnableID' => true]
                    ],
                    "youtube" => [
                        "HTML" => ["SafeIframe" => 'true'],
                        "URI"  => ["SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"],
                    ],
                ],
            ],
        ],
    ],
];