<?php
/**
 * Initiate application on startup
 *
 * PHP Version 5.5
 *
 * @category Class
 * @package  Application
 * @author   SoftRose (Eugene Churmanov) <eugene@soft-rose.com>
 * @copyright SoftRose Ltd.
 * @link     http://soft-rose.net
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Initialise auto loader for application models
     *
     * @return void
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH
        ));
    } // _initAutoload

    /**
     * Initialize Twig
     */
    protected function _initTwig()
    {
        $config = $this->getOption('twig');
        Model_Page::configureTwig($config);
    } // _initTwig

}
