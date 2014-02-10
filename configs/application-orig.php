<?php

$config = array(
    'phpSettings' => array(
        'display_startup_errors' => 0,
        'display_errors' => 0,
        'date' => array(
            'timezone' => 'US/Eastern'
        )
    ),
    'bootstrap' => array(
        'path'  => APPLICATION_PATH . '/Bootstrap.php',
        'class' => 'Bootstrap'
    ),
    'resources' => array(
        'db' => array(
            'adapter' => 'pdo_mysql',
            'isDefaultTableAdapter' => true,
            'params' => array(
                'host' => '@prod-db-host@',
                'username' => '@prod-db-user@',
                'password' => '@prod-db-pass@',
                'dbname' => '@prod-db-name@',
                'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"),
            ),
        ),
        'frontController' => array(
            'controllerDirectory' => APPLICATION_PATH . '/controllers',
            'defaultControllerName' => 'index',
            'defaultAction' => 'default'

        ),
        'view' => '',
    ),
    'twig' => array(
        'templateDir' => APPLICATION_PATH . '/templates',
        'options' => array(
            'cache' => VAR_PATH . '/cache/twig',
        ),
    ),
);

if (defined('APPLICATION_ENV') && APPLICATION_ENV == 'development') {
    $config['phpSettings']['display_startup_errors'] = 1;
    $config['phpSettings']['display_errors'] = 1;

    $config['twig']['options']['debug'] = true;
    $config['twig']['options']['auto_reload'] = true;
}

if (defined('APPLICATION_ENV') && APPLICATION_ENV == 'testing') {
    $config['resource']['db']['params'] = array(
        'host' => '@test-db-host@',
        'username' => '@test-db-user@',
        'password' => '@test-db-pass@',
        'dbname' => '@test-db-name@',
        'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"),
    );

    $config['phpSettings']['display_startup_errors'] = 1;
    $config['phpSettings']['display_errors'] = 1;

    $config['twig']['options']['debug'] = true;
    $config['twig']['options']['auto_reload'] = true;
    $config['twig']['options']['cache'] = false;
}


return $config;