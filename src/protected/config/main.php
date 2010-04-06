<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ITQuotes',
	'language' => 'ru',
	// 'defaultController' => 'foo',

	// preloading 'log' component
	'preload'=>array(),//array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),*/
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => 'profile/login',
		),
		// uncomment the following to set up database
		'db'=>array(
			'class'=>'CDbConnection',
			'connectionString'=>'mysql:host=127.0.0.1;dbname=itquotes_server-27.12.2009',
			'username'=>'root',
			'password'=>'system',
			'enableParamLogging'=>'true',
			'charset'=>'utf8',
			//'enableProfiling' => true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				// Tag controller
				'tag' => 'tag/list',
				'tag/list' => 'tag/list',
				'tag/edit/<id:\d+>' => 'tag/edit',
				'tag/add' => 'tag/add',
				'tag/delete/<id:\d+>' => 'tag/delete',
				// Quote controller.
				'quote/edit/<id:\d+>' => 'quote/edit',
				'quote/delete/<id:\d+>' => 'quote/delete',
				// Author controller.
				'author/edit/<id:\d+>' => 'author/edit',
				'author/delete/<id:\d+>' => 'author/delete',
				// Site controller.
				'list' => 'site/list',
				'quote/<id:\d+>' => 'site/quote',
				'random' => 'site/random',
				'search' => 'site/search',
				'add' => 'site/add',
				'about' => 'site/about',
				'rss' => 'site/rss',
				'tag/<tag:.+>' => 'site/tag',
				'author/<authorId:\d+>' => 'site/author',
			),
		),
		'session' => array(
			'autoStart' => true,		
		),
		'email' => array(
			'class' => 'application.extensions.email.Email',
			'delivery' => 'php',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'voice@root.ua',
		'persistentLoginTime' => 30, // in days
	),
);