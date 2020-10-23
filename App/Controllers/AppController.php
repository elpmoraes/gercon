<?php

    namespace App\Controllers;

    use \MF\Controller\Action;
    use \MF\Model\Container;


    class AppController extends Action{

        public function painel(){

            if(AuthController::checkPermissao(10)){
                echo "To com permissao";
                $this->render('painel');
            }else{
            echo "Faça o login primeiro.";
                header("refresh: 3 /login");
        }
           

        }



        public function listarCondominios(){

            if(AuthController::checkPermissao(10)){
                echo "To com permissao";
                $condominio = Container::getModel('Condominio');

                $resultado = $condominio->listarCondominios();
                
                $this->view->dados = $resultado;
                $this->render('condominios');
            }else{
            echo "Faça o login primeiro.";
                header("refresh: 3 /login");
        }
           

        }







    }












?>