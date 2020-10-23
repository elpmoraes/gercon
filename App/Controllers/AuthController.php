<?php

namespace App\Controllers;


use \MF\Controller\Action;
use \MF\Model\Container;



class AuthController extends Action{


	public function login() {

		$this->view->erroLogin = false;
		if(isset($_POST['email']) && isset($_POST['senha'])){
			$usuario = Container::getModel('Usuario');

			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', $_POST['senha']);
		

			if($usuario->validarLogin()){


				$usuario->autenticar();


					if($usuario->__get('id') != '' && $usuario->__get('nome') != ''){
					
						session_start();
						$_SESSION['id'] = $usuario->__get('id');
						$_SESSION['nome'] = $usuario->__get('nome');
						$_SESSION['acesso'] = $usuario->__get('acesso');
						$_SESSION['autenticado'] = true;
					
						header("Location: /painel");




						}	else{
						$this->view->erroLogin = true;
						echo "Usuario ou senha invalido.";
						$this->render('login');
					}


			}else{
				$this->view->erroLogin = true;
				echo "ERRO na digitacao dos campos";
				$this->render('login');
			}
		
		}else{
			

			$this->render('login');
		}


		
		
	}


	public function logout(){

		session_start();
		print_r($_SESSION . ' <br><br>');
        //remover indices do array
        //unset($_SESSION['autenticado']);
    
    
        //destruir a variavel de session_abort
        session_destroy(); //efeito somente após mudar pagina
    
        //sugestao: forçar redirecionamento
		header("refresh:5 /");
		echo "Deslogado com sucesso.";
        print_r($_SESSION);


	}


	// checa pela sessao
	public static function checkPermissao($acesso_minimo){

		$permissao = false;
		session_start();

		
		if(isset($_SESSION['autenticado']) && isset($_SESSION['acesso'])){
			if($_SESSION['autenticado'] == 'true' && $_SESSION['acesso'] >= 0){
					echo "Usuario esta autenticado <hr>";
					echo "Usuario possui acesso -> ".$_SESSION['acesso']." <hr>";

					if($_SESSION['acesso'] >= $acesso_minimo){
						$permissao = true;
					
					}

					
			}
		}

		return $permissao;
	}





}


?>