<?php

namespace App\Controllers;


use \MF\Controller\Action;
use \MF\Model\Container;


use \App\Models\Usuario;

class IndexController extends Action{



	/*
		Traz o que esta no phtml para essa class atraves do require(para esse contexto)
		Chama o método render, que vai fazer o require na view phtml
		Esses métodos serão chamados pelo Route.php
	*/
	public function index() {

		$pessoa = Container::getModel('Usuario');
		$pessoa->nome = "Pereira Joaquim";
		

		$this->view->dados = 'abacate';
		$this->render('index');
	}









}


?>