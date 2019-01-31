<?php

namespace vendor\core;

use vendor\lib\DB\Queries;

abstract class Model {

    private $_connect;
    public $attribute = array();
    public $model = null;///соответсвие класса в models


    public function __construct() {
       //$this->getModel();
    }

    public function all() {

    }

    public function find($id,$column = ['*']){
      $builder = $this->newBuilder();

      //var_dump($model);
      $builder->setModel($this->getBuilderModel());

            return  $builder->id($id,$column);
    }

    public function CheckModelFile() {

    }
    /*
     * Создание екземпляра класса Queries
     */
    protected function newQuery() {
        $conn = ConnectDB::getLink();//pdo
        return new Queries($conn);
    }
    /*
     * Создание екземпляра класса Builder
     */
    protected function newBuilder() {
        //var_dump($this->newQuery());
        return new Builder($this->newQuery());
    }
    /*
     * Возвращает имя необходимого класса
     */
    public  function getModel() {
        return $this->model = static::class;
    }

    public function getBuilderModel() {
        $model = substr($this->model, 0, -5);
        $model = explode('\\', $model);
        $model = strtolower($model[2]);
        return $model;
    }
    //перенести в builder

   /*public function getProperty(){

   }*/


}