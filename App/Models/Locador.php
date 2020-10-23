<?php

namespace App\Models;
use \MF\Model;

    class Locador extends Model{

        private $id;
        private $contrato;
        private $usuario;

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor){
            $this->$attr = $valor;
        }

    }






?>