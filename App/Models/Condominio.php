<?php

namespace App\Models;

use \MF\Model\Model;


    class Condominio extends Model{
        
        private $id;
        private $nome;
        private $endereco;

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $valor){
            $this->$attr = $valor;
        }


        public function listarCondominios(){

            $query = "Select id, nome, endereco from condominio;";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            return $resultado;


        }


    }


?>