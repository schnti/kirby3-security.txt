<?php

Kirby::plugin('schnti/security', [
	'options' => [
		'contact'   => '',
		'languages' => ['de', 'en']
	],
	'routes'  => [
		[
			'pattern' => '.well-known/security.txt',
			'method'  => 'ALL',
			'action'  => function () {
				$security = '# If you would like to report a security issue' . PHP_EOL;
				$security .= '# Please report your findings to the following address' . PHP_EOL;
				$security .= 'Contact: ' . option('schnti.security.contact') . PHP_EOL;
				$security .= 'Preferred-Languages: ' . implode(',', option('schnti.security.languages')) . PHP_EOL;
				$security .= 'Canonical: ' . url('.well-known/security.txt');

				return kirby()
					->response()
					->type('text')
					->body($security);
			}
		]
	]
]);