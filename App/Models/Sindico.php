<?php

namespace App\Models;
use \MF\Model;

        class Usuario extends Model{

            private $id;
            private $propietario = false;
            private $prazo_contrato;
            private $valor_aluguel;
            private $ultimo_reajuste;
            private $condomino;
            private $apartamento;
            private $locador;
            
            public function __get($attr){
                return $this->$attr;
            }
    
            public function __set($attr, $valor){
                $this->$attr = $valor;
            }


    }


?>