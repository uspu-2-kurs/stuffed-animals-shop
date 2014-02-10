<?php

// Allow profiling with special magic parameter
define('PROFILE_ENABLED', false); // isset($_REQUEST['profile']) && $_REQUEST['profile'] = 'profilertheman');

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'testing');
// Define path to configurations directory
defined('CONFIGS_PATH') || define('CONFIGS_PATH', realpath(dirname(__FILE__) . '/../configs'));
// var folder: logs, sessions, cache, temporary files
defined('VAR_PATH') || define('VAR_PATH', realpath(dirname(__FILE__) . '/../var'));
// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));




require_once realpath(__DIR__ . '/../vendor/autoload.php');

$config = include CONFIGS_PATH . '/application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    $config
);
$application->bootstrap();
