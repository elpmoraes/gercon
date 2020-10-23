<?php

    namespace MF\Model;

    abstract class Model{

        protected $db;

        public function __construct(\PDO $db){
            $this->db = $db;
        }

       public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor){
            $this->$attr = $valor;
        }

    }







?>