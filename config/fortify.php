<?php
use Laravel\Fortify\Features;
return [
	'encoding'      => 'UTF-8',
	'finalize'      => true,
	'cachePath'     => storage_path('app/fortify'),
	'cacheFileMode' => 0755,
	/* 'features' => [
		Features::registration(),
		Features::resetPasswords(),
		Features::emailVerification(),
	], */
	/* 'views' => false, */
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
];