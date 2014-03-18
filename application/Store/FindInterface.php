<?php

interface FindInterface
{
    /**
     * Находит объект по идентификатору, если объект не найден - возвращает null
     * @param mixed $id
     * @return mixed
     */
    public function findById($id);
    
    /**
     * Находит объекты по указаному полю и его значению, если объекты не найден - возвращает пустой массив
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function findByField($field, $value);
    
    /**
     * Находит объекты по указаному списку полей и значений, если объекты не найден - возвращает пустой массив
     * Формат фильтра:
     * array (
     *     'ИМЯ_ПОЛЯ' => 'Занчение',
     * )
     * @param array $filter
     * @return array
     */
    public function findByFilter(array $filter);
}
