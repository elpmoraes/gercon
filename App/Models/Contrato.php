<?php

namespace App\Models;
use \MF\Model;

    class Contrato extends Model{

        private $id;
        private $apartamento;
        private $usuario;
        private $sindico;

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor){
            $this->$attr = $valor;
        }

    }






?>