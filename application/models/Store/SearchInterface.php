<?php

interface Model_Store_SearchInterface
{
    /**
     * Возвращает массив объекта при поиске по параметрам и огрничениям
     *
     * @param array $params
     * @param int $limit
     * @param int $offset
     * @param array $sort
     * @return array
     */
    public function search($params = array(), $limit = 10, $offset = 0, $sort = array());
    
    /**
     * Возвращает количество записей подходящих под условие
     *
     * @param array $params
     * @return int
     */
    public function getCount($params = array());

}
