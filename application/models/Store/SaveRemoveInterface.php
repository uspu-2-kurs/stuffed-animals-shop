<?php

interface Model_Store_SaveRemoveInterface
{
    /**
     * Сохраняет объект
     *
     * @param $entity
     */
    public function save($entity);
    
    /**
     * Подготовливает объект к сохранению
     *
     * @param $entity
     */
    public function prepareForSave($entity);
    
    
    /**
     * Сохраняет подготовленые объекты 
     * 
     */
    public functio savePrepared();
    
    /**
     * Удаляет объект
     *
     * @param $entity
     */
    public function remove($entity);
    
    /**
     * Подготовливает объект к удалению
     *
     * @param $entity
     */
    public function prepareForRemove($entity);
    
    
    /**
     * Удаляет подготовленые объекты 
     * 
     */
    public functio removePrepared();
}
