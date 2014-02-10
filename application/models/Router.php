<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 10.02.14
 * Time: 13:23
 */

class Model_Router
{
    /**
     * Тип URL: статичный
     *
     * @var string
     */
    const TYPE_STATIC = 'STATIC';

    /**
     * Тип URL: руглярное выражение
     *
     * @var string
     */
    const TYPE_REGEXP = 'REGEXP';


    /**
     * Имена страниц
     */
    const PAGE_HOME = 'HOME';
    const PAGE_NOT_FOUND = 'PAGE_NOT_FOUND';
    const PAGE_CATALOG = 'CATALOG';
    const PAGE_SEARCH_RESULT = 'SEARCH_RESULT';
    const PAGE_ITEM = 'ITEM';


    /**
     * Возвращает массив с конфигураций для построения маршрутов
     *
     * @return array
     */
    public static function getConfiguration()
    {
        return array(
            'PAGE_NOT_FOUND' => array(
                'urlType' => Model_Router::TYPE_REGEXP,
                'url' => '.*',
                'urlReverse' => '/page-not-found.html',
                'controller' => 'index',
                'action' => 'default',
                'options' => array(
                    'pageClass' => 'PageNotFound',
                ),
            ),
            'HOME' => array(
                'urlType' => Model_Router::TYPE_STATIC,
                'url' => '',
                'controller' => 'index',
                'action' => 'default',
                'options' => array(
                    'pageClass' => 'Home',
                ),
            ),
            'ITEM' => array(
                'urlType' => Model_Router::TYPE_REGEXP,
                'url' => 'i/([a-z0-9\-]+)-(\d+).html',
                'urlReverse' => 'i/%s-%d.html',
                'controller' => 'index',
                'action' => 'default',
                'options' => array(
                    'pageClass' => 'Item',
                    'itemTitle' => '',
                    'itemId' => '',
                ),
                'valueMap' => array(
                    1 => 'itemTitle',
                    2 => 'itemId',
                ),
            ),

        );
    } // getConfiguration


    /**
     * Иниализирует обработку маршрутов по конфигурации
     *
     * @param $configuration array                           Конфигурация маршрутов
     * @param $router        Zend_Controller_Router_Interface  Объект Router для конфигурации
     *
     * @return void
     */
    public static function buildRouters($configuration, $router)
    {
        foreach ($configuration as $urlName => $item) {
            $defaults = array();
            $defaults['controller'] = $item['controller'];
            $defaults['action'] = $item['action'];

            if (!empty($item['options'])) {
                foreach ($item['options'] as $optionName => $defaultValue) {
                    $defaults[$optionName] = $defaultValue;
                }
            }

            switch ($item['urlType']) {
                case Model_Router::TYPE_REGEXP :
                    $map = array();

                    if (!empty($item['valueMap'])) {
                        foreach ($item['valueMap'] as $id => $valueName) {
                            $map[$id] = $valueName;
                        }
                    }

                    $route = new Zend_Controller_Router_Route_Regex(
                        $item['url'], $defaults, $map, $item['urlReverse']
                    );
                    break;

                case Model_Router::TYPE_STATIC:
                    $route = new Zend_Controller_Router_Route_Static(
                        $item['url'], $defaults
                    );
                    break;
            }

            $router->addRoute($urlName, $route);
        }
    }
}
