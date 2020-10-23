<?php

namespace App\Models;

use \MF\Model\Model;

    class Usuario extends Model{
 
            private $id;
            private $nome;
            private $cpf;
            private $email;
            private $senha;
            private $telefone;
            private $data_nascimento;
            private $acesso;
            private $locador;

            public function __get($attr){
                return $this->$attr;
            }
    
            public function __set($attr, $valor){
                $this->$attr = $valor;
            }



            public function salvar(){

               $query = "INSERT INTO usuarios(nome, email, senha, telefone,cpf, data_nascimento, acesso)
               VALUES ();"; 
               $stmt = $this->db->prepare($query);
               $stmt->bindValue(':nome', $this->__get('nome'));
               $stmt->bindValue(':cpf', $this->__get('cpf'));
               $stmt->bindValue(':email', $this->__get('email'));
               $stmt->bindValue(':senha', $this->__get('senha'));
               $stmt->bindValue(':telefone', $this->__get('telefone'));
               $stmt->bindValue(':data_nascimento', $this->__get('data_nascimento'));
               $stmt->bindValue(':acesso', $this->__get('acesso'));

            }


            public function autenticar(){


                $query = "select id, nome,acesso from usuario where email = :email and senha = :senha";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':email', $this->__get('email'));
                $stmt->bindValue(':senha', $this->__get('senha'));
                $stmt->execute();
   

                $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

                print_r($usuario);
                if(isset($usuario['id']) && isset($usuario['nome']) && isset($usuario['acesso']))
                if($usuario['id'] != '' && $usuario['nome'] != ''&& $usuario['acesso'] != '') {
                    $this->__set('id', $usuario['id']);
                    $this->__set('nome', $usuario['nome']);
                    $this->__set('acesso', $usuario['acesso']);
                }

                return $this;

            }

            public function getUsuarioPorEmail(){
                $query = "SELECT nome, email FROM usuario WHERE email = :email;";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':email', $this->__get('email'));
                $stmt->execute();
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);

            }



            public function validarLogin(){

                $valido = true;
        
                    if(strlen($this->__get('email')) < 5){
                        echo strlen($this->__get('email'));
                    $valido = false;
                    }
                    if(strlen($this->__get('senha')) < 3){
                        echo strlen($this->__get('senha'));
                        $valido = false;
                    }
        
     
                return $valido;
            }



    }



?>