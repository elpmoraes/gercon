<?php

namespace App;

use MF\Init\Bootstrap;

/*
                Route > Controller
                        Controller > (require) > view
*/
    class Route extends Bootstrap{

   

        // Vai chamar os métodos 'action' nos 'controller', na pasta app/Controllers
        protected function initRoutes(){
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );

            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'AuthController',
                'action' => 'login'
            );

            $routes['logout'] = array(
                'route' => '/logout',
                'controller' => 'AuthController',
                'action' => 'logout'
            );

            
            $routes['painel'] = array(
                'route' => '/painel',
                'controller' => 'AppController',
                'action' => 'painel'
            );

            $routes['listarCondominios'] = array(
                'route' => '/painel/condominios',
                'controller' => 'AppController',
                'action' => 'listarCondominios'
            );





            $this->setRoutes($routes);

        }
                            


    }


?>