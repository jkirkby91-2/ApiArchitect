<?php
	return [
		/*
		|--------------------------------------------------------------------------
		| Entity Mangers
		|--------------------------------------------------------------------------
		|
		| Configure your Entity Managers here. You can set a different connection
		| and driver per manager and configure events and filters. Change the
		| paths setting to the appropriate path and replace app namespace
		| by your own namespace.
		|
		| Available meta drivers: fluent|annotations|yaml|xml|config|static_php|php
		|
		| Available connections: mysql|oracle|pgsql|sqlite|sqlsrv
		| (Connections can be configured in the database config)
		|
		| --> Warning: Proxy auto generation should only be enabled in dev!
		|
		*/
		'managers'                  => [
			'default' => [
				'dev'        => env('APP_DEBUG'),
				'meta'       => env('DOCTRINE_METADATA', 'annotations'),
//			'connection' => env('APP_ENV') == 'testing' ? 'sqlite' : 'mysql',
				'connection'	=> env('DB_CONNECTION'),
				'namespaces' => [
					'app'
				],
				'paths'      => [
					'/srv/www/api/Entities',
					'/srv/www/vendor/apiarchitect/compass/src/Entities',
					'/srv/www/vendor/apiarchitect/auth/src/Entities',
					'/srv/www/vendor/apiarchitect/log/src/Entities',
					'/srv/www/vendor/jkirkby91/lumendoctrinecomponent/src/Entities'
				],
				'repository' => Doctrine\ORM\EntityRepository::class,
				'proxies'    => [
					'namespace'     => true,
					'path'          => storage_path('proxies'),
					'auto_generate' => env('DOCTRINE_PROXY_AUTOGENERATE', false)
				],
				/*
				|--------------------------------------------------------------------------
				| Doctrine events
				|--------------------------------------------------------------------------
				|
				| The listener array expects the key to be a Doctrine event
				| e.g. Doctrine\ORM\Events::onFlush
				|
				*/
				'events'     => [
					'listeners'   => [],
					'subscribers' => []
				],
				'filters'    => [],
				/*
				|--------------------------------------------------------------------------
				| Doctrine mapping types
				|--------------------------------------------------------------------------
				|
				| Link a Database Type to a Local Doctrine Type
				|
				| Using 'enum' => 'string' is the same of:
				| $doctrineManager->extendAll(function (\Doctrine\ORM\Configuration $configuration,
				|         \Doctrine\DBAL\Connection $connection,
				|         \Doctrine\Common\EventManager $eventManager) {
				|     $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
				| });
				|
				| References:
				| http://doctrine-orm.readthedocs.org/en/latest/cookbook/custom-mapping-types.html
				| http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html#custom-mapping-types
				| http://doctrine-orm.readthedocs.org/en/latest/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
				| http://doctrine-orm.readthedocs.org/en/latest/reference/basic-mapping.html#reference-mapping-types
				| http://symfony.com/doc/current/cookbook/doctrine/dbal.html#registering-custom-mapping-types-in-the-schematool
				|--------------------------------------------------------------------------
				*/
				'mapping_types'              => [
					'enum' => 'string'
				]
			]
		],

		/*
		|--------------------------------------------------------------------------
		| Doctrine Extensions
		|--------------------------------------------------------------------------
		|
		| Enable/disable Doctrine Extensions by adding or removing them from the list
		|
		| If you want to require custom extensions you will have to require
		| laravel-doctrine/extensions in your composer.json
		|
		*/
		'extensions'                => [
			LaravelDoctrine\Extensions\Timestamps\TimestampableExtension::class,
			LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension::class,
			LaravelDoctrine\Extensions\Loggable\LoggableExtension::class,
			LaravelDoctrine\Extensions\Blameable\BlameableExtension::class,
			LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension::class,
			LaravelDoctrine\ORM\Extensions\TablePrefix\TablePrefixExtension::class,
//        LaravelDoctrine\Extensions\Sluggable\SluggableExtension::class,
//        LaravelDoctrine\Extensions\Sortable\SortableExtension::class,
//        LaravelDoctrine\Extensions\Tree\TreeExtension::class,
//        LaravelDoctrine\Extensions\Translatable\TranslatableExtension::class
		],
		/*
		|--------------------------------------------------------------------------
		| Doctrine custom types
		|--------------------------------------------------------------------------
		|
		| Create a custom or override a Doctrine Type
		|--------------------------------------------------------------------------
		*/
		'custom_types'              => [
			'json' => LaravelDoctrine\ORM\Types\Json::class
		],
		/*
		|--------------------------------------------------------------------------
		| DQL custom datetime functions
		|--------------------------------------------------------------------------
		*/
		'custom_datetime_functions' => [],
		/*
		|--------------------------------------------------------------------------
		| DQL custom numeric functions
		|--------------------------------------------------------------------------
		*/
		'custom_numeric_functions'  => [],
		/*
		|--------------------------------------------------------------------------
		| DQL custom string functions
		|--------------------------------------------------------------------------
		*/
		'custom_string_functions'   => [],
		/*
		|--------------------------------------------------------------------------
		| Enable query logging with laravel file logging,
		| debugbar, clockwork or an own implementation.
		| Setting it to false, will disable logging
		|
		| Available:
		| - LaravelDoctrine\ORM\Loggers\LaravelDebugbarLogger
		| - LaravelDoctrine\ORM\Loggers\ClockworkLogger
		| - LaravelDoctrine\ORM\Loggers\FileLogger
		|--------------------------------------------------------------------------
		*/
		'logger'                    => env('DOCTRINE_LOGGER', 'LaravelDoctrine\ORM\Loggers\FileLogger'),
		/*
		|--------------------------------------------------------------------------
		| Cache
		|--------------------------------------------------------------------------
		|
		| Configure meta-data, query and result caching here.
		| Optionally you can enable second level caching.
		|
		| Available: apc|array|file|memcached|redis|void
		|
		*/
		'cache'                      => [
			'default'                => env('DOCTRINE_CACHE', 'memcached'),
			'namespace'              => null,
			'second_level'           => false,
		],
		/*
		|--------------------------------------------------------------------------
		| Gedmo extensions
		|--------------------------------------------------------------------------
		|
		| Settings for Gedmo extensions
		| If you want to use this you will have to require
		| laravel-doctrine/extensions in your composer.json
		|
		*/
		'gedmo' => [
			'all_mappings' => false
		],
		/*
		 |--------------------------------------------------------------------------
		 | Validation
		 |--------------------------------------------------------------------------
		 |
		 |  Enables the Doctrine Presence Verifier for Validation
		 |
		 */
		'doctrine_presence_verifier' => true,
	];
