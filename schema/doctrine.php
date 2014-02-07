<?php

/*
 * We're pulling in the migration db configuration params to a local variable
 */
$connectionDetails = include_once 'migrations-db.php';

/*
 * Set the include path to something a bit more specific
 */
set_include_path(
    get_include_path() . PATH_SEPARATOR .
    realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classes')
);

/*
 * We're using local libraries still, and as such they need to know how
 * to be included
 */
$classLoader = new \Doctrine\Common\ClassLoader('Symfony');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities');
$classLoader->register();

/*
 * The Driver is a required parameter of \Doctrine\DBAL\Connection
 */
$driver = new \Doctrine\DBAL\Driver\PDOMySql\Driver($connectionDetails);

/*
 * We're using the $connectionDetails of the migration-db, and above driver
 */
$conn = new \Doctrine\DBAL\Connection($connectionDetails, $driver);

/*
 * Create an empty Doctrine\ORM\Configuration for use as a required parameter
 */
$configuration = new \Doctrine\ORM\Configuration();

/*
 * We can fetch the connection to the database to be used later when
 * constructing an instance of Doctrine\ORM\EntityManager
 */
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionDetails, $configuration);

/*
 * Set the yml metadata path. It's the folder in this directory ./yml
 */
$config = Doctrine\ORM\Tools\Setup::createYAMLMetadataConfiguration(
    array(realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'yml')),
    true
);

/*
 * Finally the EntityManager
 */
$em = \Doctrine\ORM\EntityManager::create($conn, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db'     => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($conn),
    'dialog' => new \Symfony\Component\Console\Helper\DialogHelper(),
    'em'     => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em),
));

/*
 * The next two lines fix a problem with Doctrine Type not supporting enum
 * It's the whole reason we did some of the above to get to an EntityManager
 *
 * Once we have it, we can dynamically set mapping type and tell Doctrine that
 * enum is really a fancy string. It doesn't need to know anything else.
 */
$platform = $em->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

/*
 * Startup the command line interface, and set some defaults
 */
$cli = new \Symfony\Component\Console\Application(
    'Doctrine Command Line Interface',
    \Doctrine\ORM\Version::VERSION
);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);

/*
 * Finally specify which commands we're going to use when calling ./doctrine
 */
$cli->addCommands(array(

    /*
     * Command:
     * ./doctrine migrations:diff
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),

    /*
     *  Command:
     * ./doctrine migrations:execute
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),

    /*
     *  Command:
     * ./doctrine migrations:generate
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),

    /*
     *  Command:
     * ./doctrine migrations:migrate
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),

    /*
     *  Command:
     * ./doctrine migrations:status
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),

    /*
     *  Command:
     * ./doctrine migrations:version
     */
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()
));

/*
 * Run it. Woot!
 */
$cli->run();
