<?php
define('CONFIGS_PATH', realpath(dirname(__FILE__) . '/../configs'));
define('VAR_PATH', realpath(dirname(__FILE__) . '/../var'));
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
define('TEST_PATH', realpath(dirname(__FILE__) . '/../tests'));
defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'production');

/*
 * Use the composer autoload for Zend Framework instead of another local copy
 */
include_once __DIR__ . '/../vendor/autoload.php';

$config = include(CONFIGS_PATH . '/application.php');
$dbConfig = $config['resources']['db'];

$connOptions = array();
$connOptions['driver'] = $dbConfig['adapter'];
$connOptions['user'] = $dbConfig['params']['username'];
$connOptions['password'] = $dbConfig['params']['password'];
$connOptions['dbname'] = $dbConfig['params']['dbname'];
$connOptions['host'] = $dbConfig['params']['host'];

// Create application, bootstrap, and run
// We use application models in migrations
require_once 'Zend/Application.php';
$application = new Zend_Application(APPLICATION_ENV, $config);
$application->bootstrap(array('autoload', 'db'));

return $connOptions;
