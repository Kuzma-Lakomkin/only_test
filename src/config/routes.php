<?php

// Роутеры

return [

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],

    'account/main' => [
		'controller' => 'account',
		'action' => 'main',
	],

	'user/home' => [
		'controller' => 'user',
		'action'=> 'home',
		],

	'user/logout' => [
		'controller' => 'user',
		'action' => 'logout',
	],
];
