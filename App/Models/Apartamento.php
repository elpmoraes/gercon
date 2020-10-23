<?php

namespace App\Models;
use \MF\Model;


    class Apartamento extends Model{
        
        private $id;
        private $contrato;
        private $condominio;
        private $bloco;
        private $apt;

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor){
            $this->$attr = $valor;
        }
    }

?>